<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transferController extends Controller
{
    public function index()
    {
        return view('dashboard.transfer');
    }
    public function success()
    {
        return view('dashboard.transactionsucces');
    }
    public function add()
    {
        return view('dashboard.addtransfer');
    }
}
