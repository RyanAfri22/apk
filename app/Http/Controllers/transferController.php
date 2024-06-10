<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmailTopUp;
use App\Mail\NotificationEmailTransfer;
use App\Mail\NotificationEmailWithdraw;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'recipientName' => 'required|string',
            'accountNumber' => 'required|string',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $saldo = Auth::user()->accounts->first()->balance;
        $jmlTransfer = $request->amount;

        if ($saldo < $jmlTransfer) {
            return redirect('/addtransfer')->with('error', 'Insufficient balance');
        } else {
            $cekSaldo = $saldo - $jmlTransfer;
            if ($cekSaldo >= 50000) {
                $transferData = [
                    'recipientName' => $request->recipientName,
                    'accountNumber' => $request->accountNumber,
                    'amount' => $request->amount,
                    'note' => $request->note,
                ];

                $request->session()->put('transferData', $transferData);

                return view('dashboard.transfer');
            } else {
                return redirect('/addtransfer')->with('error', 'Minimum balance is Rp 50.000');
            }
        }


    }
    public function success(Request $request)
    {
        $transferData = $request->session()->get('transferData');
        $tax = 5000;

        $transactionId = DB::table('transactions')->insertGetId([
            'sender_account_id' => Auth::user()->accounts->first()->account_id,
            'receiver_name' => $transferData['recipientName'],
            'receiver_account_number' => $transferData['accountNumber'],
            'amount' => $transferData['amount'] + $tax,
            'note' => $transferData['note'],
            // 'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $account = Account::where('account_id', Auth::user()->accounts->first()->account_id)->first();
        $account->balance = $account->balance - ($transferData['amount'] + $tax);
        $account->save();

        $dataTransactions = Transaction::where('transaction_id', $transactionId)->get();

        $request->session()->forget('transferData');

        Mail::to(Auth::user()->email)->send(new NotificationEmailTransfer($dataTransactions));

        return view('dashboard.transactionsucces', compact('dataTransactions'));
    }
    public function add(Request $request)
    {
        $request->session()->forget('transferData');
        return view('dashboard.addtransfer');
    }

    public function payment()
    {
        return view('dashboard.paymentbill');
    }

    public function topup(Request $request)
    {
        if ($request->topup == 0 || $request->topup == null) {
            return redirect('/dashboard')->with('error', 'Top Up must be greater than 0');
        }
        $account = Account::where('account_id', Auth::user()->accounts->first()->account_id)->first();
        $account->balance += $request->topup;
        $account->save();

        $dataTopup = [
            'amount' => $request->topup,
        ];

        Mail::to(Auth::user()->email)->send(new NotificationEmailTopUp($dataTopup));
        return redirect('/dashboard')->with('success', 'Top Up Success, check your email for the receipt');
    }

    public function withdraw(Request $request)
    {
        if ($request->withdraw == 0 || $request->withdraw == null) {
            return redirect('/dashboard')->with('error', 'Withdraw must be greater than 0');
        }

        if ($request->withdraw > Auth::user()->accounts->first()->balance) {
            return redirect('/dashboard')->with('error', 'Insufficient balance');
        } else {
            if ((Auth::user()->accounts->first()->balance - $request->withdraw) < 50000) {
                return redirect('/dashboard')->with('error', 'Minimum balance is Rp 50.000');
            }
            $account = Account::where('account_id', Auth::user()->accounts->first()->account_id)->first();
            $account->balance -= $request->withdraw;
            $account->save();

            $dataWithdraw = [
                'amount' => $request->withdraw,
            ];
            Mail::to(Auth::user()->email)->send(new NotificationEmailWithdraw($dataWithdraw));
            return redirect('/dashboard')->with('success', 'Withdraw Success, check your email for the receipt');
        }

    }
}
