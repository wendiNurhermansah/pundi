@extends('layouts.app')
@section('content')

<!-- Header -->
<div>
    @include('masterPages.headers.header')
</div>

<section class="blog_area section-padding" style="margin-top: -80px">
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar" >
                    <div class="container">
                        <p class="f-blk fs-30 f-b m-b-40">Hasil Pencarian Untuk: {{ $hasil_search }}</p>
                        @forelse ($artikel as $i)
                        <div class="row m-b-50">
                            <div class="col-sm-6">
                                <img class="bdr-5" src="{{ asset('post/'.$i->gambar) }}" width="350" alt="">
                            </div>
                            <div class="col-sm-6">
                                <span class="bdr-5 fs-11 f-b" style="background-color: #FC5300 !important; color: white !important; padding: 3px 10px 3px 10px; text-transform: uppercase">
                                    <a href="">{{ $i->kategori->n_kategori}}</a>
                                </span>
                                <p class="fs-19 f-b f-blk">{{ $i->judul }}</p>
                                <div style="color: gray; margin-top: -10px ">
                                    <i class="fa fa-user"></i>
                                    <span class="fs-13">{{ $i->user->name }}</span>
                                    <i class="fas fa-clock m-l-10"></i>
                                    <span class="fs-13">{{ substr($i->created_at,0,10) }}</span>
                                </div>
                                <div class="m-t-10 fs-16">
                                    {{  substr(strip_tags($i->isi),0,500) }} […]
                                </div>
                                <a href="{{ route('artikel') .'?post='.$i->id}}" class="f-blk fs-13 f-b m-t-5">
                                    <span>READ MORE</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div style="height: 100px; width: 100px; position: absolute; margin-left: -50px; left: 50%;">
                            {{ $artikel->links() }}
                        </div>
                        @empty
                        <p class="f-blk fs-30 f-b">Nothing Found !</p>
                        <span>Sepertinya tidak ada yang ditemukan di sini. Mungkin coba cari lagi ?</span>
                        <form class="form-row d-flex justify-content-center md-form form-sm mt-4" action="{{ route('hasil-pencarian') }}" method="GET">
                            <div class="input-group input-group-lg">
                                <input type="text" class="single-input-primary2" name="hasil_search" style="width: 80%"  placeholder="Search Keyword">
                                <div class="input-group-prepend" style="background: #FC5300;">
                                    <button type="submit" style="border: none; background: #FC5300; width: 50px">
                                        <i class="fa fa-search" style="color: white"></i> 
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Right Sidebar -->
            @include('masterPages.right-sidebar')
        </div>
    </div>
</section>
<!-- Footer -->
<div>
    @include('masterPages.footers.footer')
</div>
@endsection