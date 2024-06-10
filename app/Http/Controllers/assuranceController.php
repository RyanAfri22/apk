<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmailInsurance;
use App\Models\Account;
use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Models\InsurancePayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AssuranceController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('insuranceData');
        $data = Insurance::all();
        return view('dashboard.assurance', compact('data'));
    }

    public function store(Request $request)
    {
        $insurance = Insurance::where('insurance_id', $request->insurance_id)->first();

        $insuranceData = [
            'insurance_name' => $insurance->name,
            'insurance_cost' => $insurance->cost,
            'policy_number' => $request->policy_number,
        ];

        $request->session()->put('insuranceData', $insuranceData);

        return redirect('/assurance/paymentbill');
    }

    public function payment(Request $request)
    {

        return view('dashboard.paymentbill');
    }

    public function success(Request $request)
    {
        $insuranceData = $request->session()->get('insuranceData');
        $tax = 5000;

        $saldo = Auth::user()->accounts->first()->balance;
        $jmlAsuransi = $insuranceData['insurance_cost'];

        if ($saldo < $jmlAsuransi) {
            return redirect('/assurance/paymentbill')->with('error', 'Insufficient balance');
        } else {
            $cekSaldo = $saldo - $jmlAsuransi;
            if ($cekSaldo >= 50000) {
                $insurance = Insurance::where('name', $insuranceData['insurance_name'])->first();

                $transactionId = DB::table('insurance_payments')->insertGetId([
                    'account_id' => Auth::user()->accounts->first()->account_id,
                    'insurance_id' => $insurance->insurance_id,
                    'policy_number' => $insuranceData['policy_number'],
                    'amount' => $insuranceData['insurance_cost'] + $tax,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $account = Account::where('account_id', Auth::user()->accounts->first()->account_id)->first();
                $account->balance = $account->balance - ($insuranceData['insurance_cost'] + $tax);
                $account->save();

                $dataInsurance = InsurancePayment::where('payment_id', $transactionId)->get();

                $request->session()->forget('insuranceData');

                Mail::to(Auth::user()->email)->send(new NotificationEmailInsurance($dataInsurance));

                return view('dashboard.transactionsucces', compact('dataInsurance'));
            } else {
                return redirect('/assurance/paymentbill')->with('error', 'Minimum balance is Rp 50.000');
            }
        }
    }
}
