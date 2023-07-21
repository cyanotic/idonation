@extends('layouts.app')
@section('content')
@can('admin')
     <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Hasil Donasi -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                    id="orders-month">Pilih Bulan</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-item" data-bulan="1">Januari</li>
                                    <li class="dropdown-item" data-bulan="2">Febuari</li>
                                    <li class="dropdown-item" data-bulan="3">Maret</li>
                                    <li class="dropdown-item" data-bulan="4">April</li>
                                    <li class="dropdown-item" data-bulan="5">Mei</li>
                                    <li class="dropdown-item" data-bulan="6">Juni</li>
                                    <li class="dropdown-item" data-bulan="7">Juli</li>
                                    <li class="dropdown-item" data-bulan="8">Agustus</li>
                                    <li class="dropdown-item" data-bulan="9">September</li>
                                    <li class="dropdown-item" data-bulan="10">Oktober</li>
                                    <li class="dropdown-item" data-bulan="11">November</li>
                                    <li class="dropdown-item" data-bulan="12">Desember</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="paid">0</div>
                                <div class="card-stats-item-label">Terbayar</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="pending">0</div>
                                <div class="card-stats-item-label">Belum Bayar</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count" id="expire">0</div>
                                <div class="card-stats-item-label">Tidak Luarsa</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Donasi</h4>
                        </div>
                        <div class="card-body" id="total-donasi">
                            Rp0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                         {{$user}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kategori Donasi</h4>
                        </div>
                        <div class="card-body">
                          {{$kategori}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                  <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-clipboard-list"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Daftar Donasi</h4>
                      </div>
                      <div class="card-body">
                        {{$daftar}}
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar User Terbanyak Donasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-invoice p-2">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->email }}</td>
                                            <td>Rp{{ number_format($item->total_donasi, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Jumlah Donasi</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="donasiChart" height="158"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endcan
   @can('pengguna')
   <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Hasil Donasi {{ Auth::user()->name }}-
                        <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                id="orders-month">Pilih Bulan</a>
                            <ul class="dropdown-menu dropdown-menu-sm">
                                <li class="dropdown-item" data-bulan="1">Januari</li>
                                <li class="dropdown-item" data-bulan="2">Febuari</li>
                                <li class="dropdown-item" data-bulan="3">Maret</li>
                                <li class="dropdown-item" data-bulan="4">April</li>
                                <li class="dropdown-item" data-bulan="5">Mei</li>
                                <li class="dropdown-item" data-bulan="6">Juni</li>
                                <li class="dropdown-item" data-bulan="7">Juli</li>
                                <li class="dropdown-item" data-bulan="8">Agustus</li>
                                <li class="dropdown-item" data-bulan="9">September</li>
                                <li class="dropdown-item" data-bulan="10">Oktober</li>
                                <li class="dropdown-item" data-bulan="11">November</li>
                                <li class="dropdown-item" data-bulan="12">Desember</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count" id="paid">0</div>
                            <div class="card-stats-item-label">Terbayar</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count" id="pending">0</div>
                            <div class="card-stats-item-label">Belum Bayar</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count" id="expire">0</div>
                            <div class="card-stats-item-label">Tidak Luarsa</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Donasi</h4>
                    </div>
                    <div class="card-body" id="total-donasi">
                        Rp0
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar User Terbanyak Donasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-invoice p-2">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>Rp{{ number_format($item->total_donasi, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Jumlah Donasi</h4>
                </div>
                <div class="card-body">
                    <canvas id="donasiChart" height="158"></canvas>
                </div>
            </div>
        </div>
    </div>

</section>
   @endcan
@endsection
