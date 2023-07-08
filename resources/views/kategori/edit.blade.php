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
            <h2 class="section-title"> Form Edit Data</h2>
            <div class="row">
                <div class="col-12">
                  
                    <div class="card">
                        <div class="card-body">
                            <form action="/dashboard/kategori/{{ $kategori->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                        required name="kategori" value="{{ $kategori->kategori }}" >
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
