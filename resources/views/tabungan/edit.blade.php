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
                        <div class="home_title">Edit Halaman Tabungan</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Tabungan</li>
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
                          <div class="form_title">Edit Halaman Tabungan</div>
                          <div class="info_subtitle"></div>
                        </div>
                        <div class="form_title">
                            Perbarui beberapa keterangan yang ada di halaman tabungan
                        </div>
                        <div class="form-container">
                            <form method="POST" id="form-edit-tabungan" class="call_form" action="{{ url('tabungan/'.$tabungan->id) }}" enctype="multipart/form-data">
                                {{ method_field("PUT") }}
                                {{ csrf_field() }}
                                <label class="info_text" for="keterangan">Keterangan Tabungan:</label>
                                <textarea class="form-control" rows="3" name="keterangan" id="keterangan">{{$tabungan->keterangan}}</textarea>
                                <label class="info_text" for="manfaat">Manfaat:</label>
                                <textarea class="form-control" rows="3" name="manfaat" id="manfaat">{{$tabungan->manfaat}}</textarea>
                                <label class="info_text" for="syarat_orang">Syarat Peorangan:</label>
                                <textarea class="form-control" rows="3" name="syarat_orang" id="syarat_orang">{{$tabungan->syarat_orang}}</textarea>
                                <label class="info_text" for="syarat_perusahaan">Syarat Perusahaan:</label>
                                <textarea class="form-control" rows="3" name="syarat_perusahaan" id="syarat_perusahaan">{{$tabungan->syarat_perusahaan}}</textarea>
                                <br>
                                <div class="form_title">Pilih Foto banner untuk diperbarui:</div>
                                <div class="col-md-12">
                                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate style="margin-bottom: 50px;">
                                </div>
                                <div style="clear: both;"></div>
                                <button type="submit" class="form_button" style="bottom: -70px;"><i class=""></i>Perbarui</button>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info_text">
                                            Foto banner saat ini:
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
                                        <img src="../../../public/images/{{$tabungan->banner}}" alt="" class="w-100">    
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
    CKEDITOR.replace('keterangan');
    CKEDITOR.replace('manfaat');
    CKEDITOR.replace('syarat_orang');
    CKEDITOR.replace('syarat_perusahaan');
</script>
@endsection