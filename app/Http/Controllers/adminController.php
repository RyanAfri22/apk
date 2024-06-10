<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.admin');
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
