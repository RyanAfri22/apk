<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }
    public function assurance()
    {
        return view('admin.assurance');
    }
    public function card()
    {
        return view('admin.card');
    }
    public function transaksi()
    {
        return view('admin.transaction  ');
    }
    public function user()
    {
        return view('admin.user  ');
    }
}
