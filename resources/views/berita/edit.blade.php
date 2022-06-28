@extends('layouts.app')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../images/news_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Edit Berita</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li><a href="{{ url('/berita') }}">Berita</a></li>
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
        <div class="row">

            <div class="col-lg-6 news_col">
                @if (session('pesan'))
                    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
                        {{ session('pesan') }}
                    </div>
                @endif

                @if (Auth::user())
                @if (Auth::user()->role == 1)
                <div class="news_post">
                    <div class="news_content">
                        <!-- <div class="section_subtitle">take a look at our</div> -->
                        <div class="form_title">Edit Berita :</div>
                    </div>
                    <div class="form_content">
                        <form method="POST" id="form-tambah-post" class="call_form" action="{{ url('berita/'.$post->id) }}" enctype="multipart/form-data">
                            {{ method_field("PUT") }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="section_subtitle">Judul Berita :</div>
                                <div class="col-md-12">
                                    <input type="text" name="judul" id="judul" class="input_item" value="{{ $post->judul }}" required placeholder="Masukkan judul disini...">
                                </div>
                                <div class="section_subtitle">Isi Berita :</div>
                                <div class="col-md-12">
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Isi deskripsi berita disini..." class="textarea_input_item" required>{{ $post->deskripsi }}</textarea>
                                </div>
                                <div class="section_subtitle">Pilih Foto yang diupload :</div>
                                <div class="col-md-12">
                                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                            </div>
                            <div id="btn-submit-caption">
                                <button type="submit" class="form_button" value="Submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endif
            </div>
            <div class="col-lg-6 news_col">
                <div class="news_post">
                    <div style="background:url(../../../public/images/post/{{$gambar->post_id.'.'.$gambar->extension}});" class="news_image"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Raw -->
<!-- @if (session('pesan'))
    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
        {{ session('pesan') }}
    </div>
@endif
@if (Auth::user())
@if (Auth::user()->role == 1)
<div class="container-tambah-post">
    <form method="POST" id="form-tambah-post" class="add_post" action="{{ url('berita/'.$post->id) }}" enctype="multipart/form-data">
        {{ method_field("PUT") }}
        {{ csrf_field() }}

        <label>Judul Berita:</label>
        <input type="text" name="judul" id="judul" value="{{ $post->judul }}">
        <div id="container-upload">
            <div class="container-photo-upload">
                <div id="photo-upload">
                    Select a photo to upload : <br/> -->
                    <!-- (Max 10 photo to upload) <br/> -->
<!--                     <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate/>
                </div>
            </div>
        </div>
        
        <div id="caption-isi">
            <label>Isi Berita :</label>
        </div>
        <textarea name="deskripsi" id="deskripsi" placeholder="Isi Judul Berita...">{{ $post->deskripsi }}</textarea>
        <div id="btn-submit-caption">
            <button type="submit" class="contact_button trans_200" value="Submit">Submit</button>
        </div>
    </form>
</div>
@endif
@endif -->

@endsection

@section('customjs')
<script src="{{ asset('js/news_custom.js') }}"></script>
@endsection

