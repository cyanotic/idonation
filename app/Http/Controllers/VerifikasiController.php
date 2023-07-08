<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function notice(){
        return 'akun sudah dibuat,silahkan verifikasi';
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return \redirect('/dashboard');
    }

    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return 'verifikasi ulang di kirim';
    }
}
