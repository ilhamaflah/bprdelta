@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/news_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Kirim Dokumen</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Kirim Dokumen</li>
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
      <!-- Njajal -->
      <div class="col-lg-6 news_col">
        <div class="row">
            <!-- News Post -->
            <div class="col-lg-12 news_col">
                <div class="news_post">
                    <!-- <div class="news_image"><img src="images/news_post_7.jpg" alt=""></div>
                    <div class="news_date d-flex flex-column align-items-center justify-content-center">
                        <div class="news_month">feb</div>
                        <div class="news_day">03</div>
                    </div> -->
                    <div class="news_content">
                        <!-- <div class="section_subtitle">take a look at our</div> -->
                        <div class="form_title">
                          <div class="form_title">Kirim Dokumen</div>
                          <div class="info_subtitle"></div>
                        </div>
                        <div class="intro_text">
                          <p>
                            Halaman ini digunakan untuk menggunggah berkas dokumen yang akan ......
                          </p>
                        </div>
                        <div class="form_title">Syarat dan ketentuan :</div>
                        <ol>
                          <li class="info_text">Berkas yang dikirim dalam bentuk foto dari berkas tersebut.</li>
                          <li class="info_text">Foto yang diunggah harus dalam format (.JPG, .PNG, atau .JPEG).</li>
                          <li class="info_text">Informasi dalam foto yang diunggah harus terlihat jelas.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="col-lg-6 news_col">
        <div class="row">
            <!-- News Post -->
            <div class="col-lg-12 news_col">
                <div class="news_post">
                    <!-- <div class="news_image"><img src="images/news_post_7.jpg" alt=""></div>
                    <div class="news_date d-flex flex-column align-items-center justify-content-center">
                        <div class="news_month">feb</div>
                        <div class="news_day">03</div>
                    </div> -->
                    <div class="news_content">
                        <!-- <div class="section_subtitle">take a look at our</div> -->
                        <div class="form_title">Kirim berkas anda disini :</div>
                        <div class="info_subtitle"></div>
                    </div>
                    <div class="form_content">
                        <form method="POST" id="form-tambah-dokumen" class="call_form" action="{{ url('dokumen') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="section_subtitle">Masukkan foto KTP anda disini :</div>
                                <div class="col-md-12">
                                    <input type="file" name="filename[]" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 20px;">
                                </div>
                                <div class="section_subtitle">Masukkan foto Kartu Keluarga (KK) anda disini :</div>
                                <div class="col-md-12">
                                    <input type="file" name="filename[]" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 20px;">
                                </div>
                                <div class="section_subtitle">Masukkan foto Akta Kelahiran anda disini :</div>
                                <div class="col-md-12">
                                    <input type="file" name="filename[]" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 50px;">
                                </div>
                                <!-- <div class="section_subtitle">Isi Berita :</div>
                                <div class="col-md-12">
                                    <textarea name="deskripsi" id="deskripsi" placeholder="Isi deskripsi berita disini..." class="textarea_input_item" required="required"></textarea>
                                </div>
                                <div class="section_subtitle">Pilih Foto yang diupload :</div>
                                <div class="col-md-12">
                                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 50px;">
                                </div> -->
                            </div>
                            <div id="btn-submit-caption">
                                <button type="submit" class="form_button" value="Submit">Submit</button>
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


<!-- Lama -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
    	<ul>
      	@foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      	@endforeach
    	</ul>
  	</div>
@endif

@if (session('pesan'))
	<div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
		{{ session('pesan') }}
	</div>
@endif
<form method="POST" id="form-tambah-dokumen" class="add_post" action="{{ url('dokumen') }}" enctype="multipart/form-data">
	{{ csrf_field() }}

    <label>KTP: </label><div class="input-group control-group increment" >
      <input type="file" name="filename[]" class="form-control">
    </div>
    <label>Kartu Keluarga: </label><div class="input-group control-group increment" >
      <input type="file" name="filename[]" class="form-control">
    </div>
    <label>Akte Kelahiran: </label><div class="input-group control-group increment" >
      <input type="file" name="filename[]" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary" style="margin-top:10px" value="Submit">Submit</button>

</form> -->

@endsection