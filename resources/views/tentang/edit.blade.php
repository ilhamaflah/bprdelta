@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../../public/images/{{$tentang->banner}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Edit Halaman Tentang Kami</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Tentang Kami</li>
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
                          <div class="form_title">Edit Halaman Tentang Kami</div>
                          <div class="info_subtitle"></div>
                        </div>
                        <div class="form_title">
                            Perbarui beberapa keterangan yang ada di halaman tentang kami
                        </div>

                        <div class="form-container">
                            <form method="POST" id="form-edit-tentang" class="call_form" action="{{ url('tentang/'.$tentang->id) }}" enctype="multipart/form-data">
                                {{ method_field("PUT") }}
                                {{ csrf_field() }}
                                <label class="info_text" for="keterangan">Sejarah Tentang Kami:</label>
                                <textarea class="form-control" rows="3" name="sejarah" id="sejarah">{{$tentang->sejarah}}</textarea>
                                <label for="manfaat">Visi:</label>
                                <textarea class="form-control" rows="3" name="visi" id="visi">{{$tentang->visi}}</textarea>
                                <label class="info_text" for="syarat_orang">Misi:</label>
                                <textarea class="form-control" rows="3" name="misi" id="misi">{{$tentang->misi}}</textarea>
                                <div class="form_title">Pilih Foto kecil 1 sejarah untuk diperbarui:</div>
                                <div class="col-md-12">
                                    <input type="file" id="thumb1" name="thumb1" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                                <div class="form_title">Pilih Foto kecil 2 sejarah untuk diperbarui:</div>
                                <div class="col-md-12">
                                    <input type="file" id="thumb2" name="thumb2" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                                <div class="form_title">Pilih Foto banner untuk diperbarui:</div>
                                <div class="col-md-12">
                                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                                <div style="clear: both;"></div>
                                <button type="submit" class="form_button" style="bottom: -70px;"><i class=""></i>Perbarui</button>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Foto Sejarah 1 saat ini:
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <img src="../../../public/images/{{$tentang->thumb1}}" alt="" class="w-100">    
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Foto Sejarah 2 saat ini:
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <img src="../../../public/images/{{$tentang->thumb2}}" alt="" class="w-100">    
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Foto banner saat ini:
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Terakhir diperbarui oleh : {{$tentang->user->name}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <img src="../../../public/images/{{$tentang->banner}}" alt="" class="w-100">    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('customjs')
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replaceClass = 'form-control';
</script>
@endsection


<!-- @if (session('pesan'))
    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
        {{ session('pesan') }}
    </div>
@endif
<div id="content">
    <div class="card">
        <div class="card-header">
            Perbarui beberapa keterangan yang ada di halaman tentang kami:
        </div>
        <div class="form-container">
            <form method="POST" id="form-edit-tentang" class="call_form" action="{{ url('tentang/'.$tentang->id) }}" enctype="multipart/form-data">
                {{ method_field("PUT") }}
                {{ csrf_field() }}
                <label for="keterangan">Sejarah Tentang Kami:</label>
                <textarea class="form-control" rows="3" name="sejarah" id="sejarah">{{$tentang->sejarah}}</textarea>
                <label for="manfaat">Visi:</label>
                <textarea class="form-control" rows="3" name="visi" id="visi">{{$tentang->visi}}</textarea>
                <label for="syarat_orang">Misi:</label>
                <textarea class="form-control" rows="3" name="misi" id="misi">{{$tentang->misi}}</textarea>
                <div class="section_subtitle">Pilih Foto kecil 1 sejarah untuk diperbarui:</div>
                <div class="col-md-12">
                    <input type="file" id="thumb1" name="thumb1" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                </div>
                <div class="section_subtitle">Pilih Foto kecil 2 sejarah untuk diperbarui:</div>
                <div class="col-md-12">
                    <input type="file" id="thumb2" name="thumb2" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                </div>
                <div class="section_subtitle">Pilih Foto banner untuk diperbarui:</div>
                <div class="col-md-12">
                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                </div>
                <button type="submit" class="form_button"><i class=""></i>Perbarui</button>
                <p class="float-right mt-3">Terakhir diperbarui oleh {{$tentang->user->name}}</p>
            </form>
        </div>
    </div>
</div>
<p>Foto banner saat ini:</p>
<img src="../../../public/images/{{$tentang->banner}}" alt="">
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replaceClass = 'form-control';
</script> -->