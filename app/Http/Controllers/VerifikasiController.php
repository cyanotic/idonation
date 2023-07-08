<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function notice(){
        return \view('verifikasi.notif',[
            'email' => Auth::user()->email,
            'cek' => 'notice'
        ]);
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return \redirect('/dashboard');
    }

    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return \view('verifikasi.notif',[
            'email' => Auth::user()->email,
            'cek'=> 'send'
        ]);
    }
}
