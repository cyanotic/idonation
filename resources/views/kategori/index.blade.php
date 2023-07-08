@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"> <a href="/dashboard/kategori/create" class="btn btn-primary"> Tambah Data</a></h2>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($kategoris as $kategori)
                                          
                                     
                                    <tr>
                                      <td>
                                       {{$loop->iteration}}
                                      </td>
                                      <td>{{ $kategori->kategori }}</td>
                                      <td>
                                          <a href="/dashboard/kategori/{{ $kategori->id }}/edit" class="btn btn-warning btn-action mr-1"
                                              data-toggle="tooltip" title="Edit"><i
                                                  class="fas fa-pencil-alt"></i></a>
                                              <form class="d-inline" action="/dashboard/kategori/{{ $kategori->id }}" method="POST" id="del-{{ $kategori->id }}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger btn-action" data-toggle="tooltip"
                                                title="Hapus" type="submit" data-confirm="Hapus Data?|Apakah yakin untuk menghapus" data-confirm-yes="submitDel({{ $kategori->id }})"><i class="fas fa-trash "></i></button>
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
