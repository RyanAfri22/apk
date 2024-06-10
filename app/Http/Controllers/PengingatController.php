<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmailInsurance;
use App\Mail\NotificationEmailPengingat;
use App\Models\User;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'user')->get();
        $insurance = Insurance::all();
        return view('admin.pengingat.pengingat', compact('data', 'insurance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPengingat = [
            'name' => User::where('user_id', $request->user_id)->first()->username,
            'insurance' => Insurance::where('insurance_id', $request->insurance)->first()->name,
        ];

        Mail::to(User::where('user_id', $request->user_id)->first()->email)->send(new NotificationEmailPengingat($dataPengingat));
        return redirect('/pengingat')->with('success', 'Pengingat Berhasil Dikirim Ke Email Pengguna');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
