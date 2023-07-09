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
                <button class="btn btn-success">Donasi Sekarang</button>
                </div>
            </div>
            </article>
        </div>
    </div>
    </div>
</section>
@endsection