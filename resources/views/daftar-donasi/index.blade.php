@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Daftar Donasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"> <a href="/dashboard/daftar-donasi/create" class="btn btn-primary"> Tambah Data</a></h2>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Total Donasi</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($donasis as $donasi)
                                    <tr>
                                      <td>
                                       {{$loop->iteration}}
                                      </td>
                                      <td>{{ $donasi->kategori->kategori }}</td>
                                      <td>{{ $donasi->judul }}</td>
                                      <td>{{ $donasi->deskripsi }}</td>
                                      <td>Rp{{ number_format($donasi->total_donasi, 2, ',', '.');  }}</td>
                                      @if ($donasi->foto == 'default.jpg')
                                      <td>
                                        <img src="{{ asset('assets/img/daftar-donasi/'.$donasi->foto) }}" alt="" width="100">
                                    </td>  
                                    @else  
                                    <td>
                                        <img src="{{ asset('storage/'.$donasi->foto) }}" alt="" width="100">
                                    </td>  
                                       @endif
                                      <td>
                                          <a href="/dashboard/daftar-donasi/{{ $donasi->id }}/edit" class="btn btn-warning btn-action mr-1"
                                              data-toggle="tooltip" title="Edit"><i
                                                  class="fas fa-pencil-alt"></i>
                                                </a>
                                              <form class="d-inline" action="/dashboard/daftar-donasi/{{ $donasi->id }}" method="POST" id="del-{{ $donasi->id }}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger btn-action" data-toggle="tooltip"
                                                title="Hapus" type="submit" data-confirm="Hapus Data?|Apakah yakin untuk menghapus" data-confirm-yes="submitDel({{ $donasi->id }})"><i class="fas fa-trash "></i></button>
                                               </form>
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
