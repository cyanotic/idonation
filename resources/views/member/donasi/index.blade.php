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
            <form action="/user-donasi">
            <div class="row mb-3">
                    <div class="col-5">
                        <input type="text" name="cari" id="" class="form-control" placeholder="Cari" value="{{ request('cari') }}">
                    </div>
                    <div class="col-5">
                        <select name="kat" id="" class="form-control">
                            <option value="">Semua</option>
                            @foreach ($kategoris as $item)
                            @if (request('kat') == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
                </form>
            <div class="row">
                @foreach ($donasis as $donasi)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
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
                            <h2><a href="/user-donasi/{{ $donasi->id }}">{{ $donasi->judul }}</a></h2>
                        </div>
                        <p>{{ $donasi->excerpt }} </p>
                        <div class="article-cta">
                            <a href="/user-donasi/{{ $donasi->id }}">Baca <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    </article>
            </div>
            @endforeach
            <div class="ms-auto">
                {{ $donasis->links() }}</div>
        </div>
        </div>
    </section>
@endsection
