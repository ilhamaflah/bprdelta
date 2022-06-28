@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../../public/images/transaction.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Edit Halaman Home</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Edit</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="news">
  <div class="container_news">
    @if (session('pesan'))
        <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="row">
      <div class="col-lg-12 news_col">
        <div class="row">
            <!-- News Post -->
            <div class="col-lg-12 news_col">
                <div class="news_post">
                    <div class="news_content">
                        <!-- <div class="section_subtitle">take a look at our</div> -->
                        <div class="form_title">
                          <div class="form_title">Edit Halaman Beranda</div>
                          <div class="info_subtitle"></div>
                        </div>
                        <div class="form_title">
                             Perbarui foto banner yang ada di halaman beranda
                        </div>
                        @php
                        $x = 0;
                        @endphp
                        @foreach($home as $homes => $h)
                        @php
                        $x++;
                        @endphp
                        <div class="form-container">
                            <form method="POST" id="form-edit-home" class="call_form" action="{{ url('home/'.$h->id) }}" enctype="multipart/form-data">
                                {{ method_field("PUT") }}
                                {{ csrf_field() }}
                                <div class="form_title">Pilih Foto banner {{$x}} untuk diperbarui:</div>
                                <div class="col-md-12">
                                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                                <button type="submit" class="form_button" style="bottom: -70px;position: static!important;"><i class=""></i>Perbarui</button>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Foto banner saat ini:
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Terakhir diperbarui oleh {{$h->user->name}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <img src="../../../public/images/{{$h->banner}}" alt="" class="w-100">    
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


<!-- @if (session('pesan'))
    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
        {{ session('pesan') }}
    </div>
@endif
<div id="content">
    <div class="card">
        <div class="card-header">
            Perbarui foto banner yang ada di halaman beranda:
        </div><br>
@php
$x = 0;
@endphp
@foreach($home as $homes => $h)
@php
$x++;
@endphp
        <div class="form-container">
            <form method="POST" id="form-edit-home" class="call_form" action="{{ url('home/'.$h->id) }}" enctype="multipart/form-data">
                {{ method_field("PUT") }}
                {{ csrf_field() }}
                <div class="section_subtitle">Pilih Foto banner {{$x}} untuk diperbarui:</div>
                <div class="col-md-12">
                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                </div>
                <button type="submit" class="form_button"><i class=""></i>Perbarui</button>
                <p class="float-right mt-3">Terakhir diperbarui oleh {{$h->user->name}}</p>
            </form>
        </div>
    </div>
</div>
<p>Foto banner saat ini:</p>
<img src="../../../public/images/{{$h->banner}}" alt=""><br><br>
@endforeach -->