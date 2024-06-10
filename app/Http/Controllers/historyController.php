<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('transferData');


        $transactions = Transaction::where('sender_account_id', Auth::user()->accounts->first()->account_id)->get();
        return view('dashboard.history', compact('transactions'));
    }
}
