@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../../public/images/{{$tabungan->banner}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Edit Tipe Tabungan</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Tipe Tabungan</li>
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
                          <div class="form_title">Edit Tipe Tabungan</div>
                          <div class="info_subtitle"></div>
                        </div>
                        <div class="form_title">
                            Perbarui beberapa jenis layanan yang ada di halaman tabungan
                        </div>

                        @foreach($typetabungan as $type => $t)
                            <div class="form-container">
                                <form method="POST" id="form-edit-typetabungan" class="call_form" action="{{ url('typetabungan/'.$t->id) }}" enctype="multipart/form-data">
                                    {{ method_field("PUT") }}
                                    {{ csrf_field() }}
                                    <label class="info_text" for="nama">Nama Jenis Tabungan:</label><br>
                                    <input type='text' class="form-control" rows="3" name="nama" id="nama" value='{{$t->nama}}'><br>
                                    <label class="info_text" for="keterangan">Keterangan Jenis Tabungan:</label>
                                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan">{{$t->keterangan}}</textarea><br>
                                    <div class="form_title">Pilih Foto {!!$t->nama!!} untuk diperbarui:</div>
                                    <div class="col-md-12">
                                        <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                    </div>
                                    <div style="clear: both;"></div>
                                    <button type="submit" class="form_button" style="bottom: -70px;position: static!important;"><i class=""></i>Perbarui</button>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info_text">
                                                Foto {!!$t->nama!!} saat ini:
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info_text">
                                                Terakhir diperbarui oleh : {{$tabungan->user->name}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <img src="../../../public/images/{{$t->gambar}}" alt="" class="w-100">    
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr style="border-width: 5px; border-color: #FB873E">
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

@section('customjs')
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replaceClass = 'form-control';
</script>
@endsection

<!-- LAMA -->
<!-- @if (session('pesan'))
    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
        {{ session('pesan') }}
    </div>
@endif
<div id="content">
    <div class="card">
        <div class="card-header">
            Perbarui beberapa jenis layanan yang ada di halaman tabungan:
        </div><br>
@foreach($typetabungan as $type => $t)
        <div class="form-container">
            <form method="POST" id="form-edit-typetabungan" class="call_form" action="{{ url('typetabungan/'.$t->id) }}" enctype="multipart/form-data">
                {{ method_field("PUT") }}
                {{ csrf_field() }}
                <label for="nama">Nama Jenis Tabungan:</label><br>
                <input type='text' class="form-control" rows="3" name="nama" id="nama" value='{{$t->nama}}'><br>
                <label for="keterangan">Keterangan Jenis Tabungan:</label>
                <textarea class="form-control" rows="3" name="keterangan" id="keterangan">{{$t->keterangan}}</textarea><br>
                <div class="section_subtitle">Pilih Foto {!!$t->nama!!} untuk diperbarui:</div>
                <div class="col-md-12">
                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                </div>
                <button type="submit" class="form_button"><i class=""></i>Perbarui</button>
                <p class="float-right mt-3">Terakhir diperbarui oleh {{$tabungan->user->name}}</p>
            </form>
        </div>
    </div>
</div>
<p>Foto {!!$t->nama!!} saat ini:</p>
<img src="../../../public/images/{{$t->gambar}}" alt=""><br><br>
@endforeach
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replaceClass = 'form-control';
</script> -->