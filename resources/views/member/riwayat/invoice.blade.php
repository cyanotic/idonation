
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Riwayat Donasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($invoices as $invoice)
                                    <tr>
                                      <td>
                                       {{$loop->iteration}}
                                      </td>
                                      <td>{{ $invoice->daftar->judul }}</td>
                                      <td>{{ $invoice->daftar->kategori->kategori }}</td>
                                      <td>Rp{{ number_format($invoice->jumlah, 2, ',', '.');  }}</td>
                                      <td>{{strtoupper($invoice->metode_pembayaran)}}</td>
                                      <td>
                                        @if ($invoice->status == 'pending')
                                            <span class="btn btn-warning btn-sm" onclick="snap.pay('{{ $invoice->snap_token}}')">Bayar Sekarang</span>
                                        @elseif($invoice->status == 'settlement')
                                        <span class="btn btn-success btn-sm" >Terbayar</span>
                                        @endif
                                    </td>
                                      <td>
                                        <a href="/riwayat/invoice/{{ $invoice->kode_donasi }}" class="btn btn-primary btn-action mr-1"
                                            data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a
                                      </td>
                                  </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
