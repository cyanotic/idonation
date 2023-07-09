@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Donasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Article</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Ayoo Donasi</h2>
        <p class="section-lead">Mari saling membantu untuk saudara kita yang sedang membutuhkan.</p>
        <div class="row">
            <div class="col-12">
                <article class="article article-style-b">
                    <div class="article-header">
                        @if ($donasi->foto == 'default.jpg')
                            <div class="article-image"
                                data-background="{{ asset('assets/img/news/img13.jpg') }}
                       ">
                            @else
                                <div class="article-image"
                                    data-background="{{ asset('storage/' . $donasi->foto) }}
                       ">
                        @endif
                    </div>
                    <div class="article-badge">
                        <div class="article-badge-item bg-primary"> {{ $donasi->kategori->kategori }}</div>
                    </div>
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h3>{{ $donasi->judul }}</h3>
                </div>
                <p>{{ $donasi->deskripsi }} </p>
                <div class="article-cta">
                <button class="btn btn-success" id="tombol-donasi" type="button" data-donasi-id={{ $donasi->id }} data-toggle="modal" data-target="#exampleModal">Donasi Sekarang</button>
                </div>
            </div>
            </article>
        </div>
    </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Jumlah Donasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="" method="post" id="form-donasi">
            <input type="hidden" name="daftar_donasi" id="daftar_donasi" value="{{ $donasi->id }}">
            <input type="number" class="form-control" placeholder="Jumlah Donasi" name="jumlah_donasi" id="jumlah_donasi">
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-success">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection