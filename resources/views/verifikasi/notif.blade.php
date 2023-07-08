@extends('layouts.verifikasi')
@section('email')
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="empty-state">
                            <img class="img-fluid" src="{{ asset('assets/img/email.png') }}" width="300" alt="image">
                            @if ($cek == 'notice')
                            <h2 class="mt-0">Verifikasi Email Anda</h2>
                            @else
                            <h2 class="mt-0">Verifikasi Email Anda Lagi</h2>
                            @endif
                            <p class="lead">
                               Kami sudah mengirim email ke <span class="text-danger">{{ $email }}</span> mohon untuk cek email anda dan konfirmasi untuk proses selanjutnya.Apabila email tidak masuk,silahkan cek folder spam anda
                            </p>
                            <a href="/email/verify/resend-verifikasi" class="btn btn-primary mt-4">KIRIM ULANG EMAIL VERIFIKASI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

