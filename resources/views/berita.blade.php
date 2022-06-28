@extends('layouts.app')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/feature.css') }}">

@endsection

@section ('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/news_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Berita</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Berita</li>
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
@if (session('pesan'))
    <div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
        {{ session('pesan') }}
    </div>
@endif
    <!-- News -->

    <div class="news">
        <div class="container_news">
            <div class="row">
                <!-- News Post PEGAWAI -->
                @if(Auth::user())
                @if(Auth::user()->role == 1)
                <div class="col-lg-8 mb-5 news_col">
                    <div class="row">
                        @foreach ($post as $kc => $vc)
                        <div class="col-lg-12 news_col">
                            <div class="news_post">
                                @foreach ($gambar as $g => $ga)
                                @if($ga->post_id == $vc->id)
                                <!-- <div class="news_image"><img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div> -->
                                <div style="background:url(../public/images/post/{{$ga->post_id.'.'.$ga->extension}});" class="news_image"></div>
                                @endif
                                @endforeach
                                <div class="news_date d-flex flex-column align-items-center justify-content-center">
                                    <div class="news_day">{{date('d', strtotime($vc->tanggal))}}</div>
                                    <div class="news_month">{{date('M', strtotime($vc->tanggal))}} {{date('Y', strtotime($vc->tanggal))}}</div>
                                </div>
                                <div class="news_content">
                                    <div class="news_title">{{$vc->judul}}</div>
                                    {{$vc->user->name}}
                                    <div class="news_text">
                                        <p>@php
                                            $string = $vc->deskripsi;
                                            $max = 300;
                                            if(strlen($string) > $max) {
                                              $shorter = substr($string, 0, $max+1);
                                              $string = substr($string, 0, strrpos($shorter, ' ')).'...';
                                            }
                                            @endphp
                                            {{$string}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-lg-2 news_col">
                                        <div class="news_button"><a href="{{ url('berita/'.$vc->id.'/edit') }}">Edit</a></div>
                                    </div>
                                    <div class="col-lg-2 news_col">
                                        <div class="news_button"><a href="#" onclick="getElementById('delete_{{$vc->id}}').submit()">Delete</a></div>
                                    </div> -->
                                    <div class="col-sm-12 ml-3 mb-3">
                                        <div class="news_button mr-2"><a href="{{ url('berita/'.$vc->id.'/edit') }}">Edit</a></div>
                                        <div class="news_button"><a href="#" onclick="getElementById('delete_{{$vc->id}}').submit()">Delete</a></div>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ url('berita/'.$vc->id) }}" id="delete_{{$vc->id}}">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <?php echo $post->render(); ?>
                </div>
                
                <div class="col-lg-4 news_col">
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
                                    <div class="form_title">Tambahkan Berita Baru :</div>
                                </div>
                                <div class="form_content">
                                    <form method="POST" id="form-tambah-post" action="{{ url('berita') }}" enctype="multipart/form-data" class="call_form">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="section_subtitle">Judul Berita :</div>
                                            <div class="col-md-12">
                                                <input type="text" name="judul" id="judul" class="input_item" placeholder="Masukkan judul disini..." required="required">
                                            </div>
                                            <div class="section_subtitle">Isi Berita :</div>
                                            <div class="col-md-12">
                                                <textarea name="deskripsi" id="deskripsi" placeholder="Isi deskripsi berita disini..." class="textarea_input_item" required="required"></textarea>
                                            </div>
                                            <div class="section_subtitle">Pilih Foto yang diupload :</div>
                                            <div class="col-md-12">
                                                <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 50px;">
                                            </div>
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
                @endif
                @endif
<!--                 @if(Auth::user())
                @if(Auth::user()->role == 1)
                @foreach ($post as $kc => $vc)
                <div class="col-lg-8 news_col">
                    <div class="news_post">
                        @foreach ($gambar as $g => $ga)
                        @if($ga->post_id == $vc->id)
                        <div class="news_image"><img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div>
                        @endif
                        @endforeach
                        <div class="news_date d-flex flex-column align-items-center justify-content-center">
                            <div class="news_month">{{date('Y', strtotime($vc->tanggal))}} {{date('M', strtotime($vc->tanggal))}}</div>
                            <div class="news_day">{{date('d', strtotime($vc->tanggal))}}</div>
                        </div>
                        <div class="news_content">
                            <div class="news_title">{{$vc->judul}}</div>
                            {{$vc->user->name}}
                            <div class="news_text">
                                <p>{{$vc->deskripsi}}</p>
                            </div>
                        </div>
                        <div class="news_button"><a href="{{ url('berita/'.$vc->id.'/edit') }}">Edit</a></div><div class="news_button"><a href="#" onclick="getElementById('delete_{{$vc->id}}').submit()">Delete</a></div>
                    </div>
                    <form method="POST" action="{{ url('berita/'.$vc->id) }}" id="delete_{{$vc->id}}">
                            {{method_field("DELETE")}}
                            {{csrf_field()}}
                    </form>
                </div> -->
                <!-- @endforeach -->
                <!-- News Post -->
<!--                 <div class="col-lg-4 news_col">
                    <div class="news_post"> -->
                        <!-- <div class="news_image"><img src="images/news_post_7.jpg" alt=""></div>
                        <div class="news_date d-flex flex-column align-items-center justify-content-center">
                            <div class="news_month">feb</div>
                            <div class="news_day">03</div>
                        </div> -->
                        <!-- <div class="news_content"> -->
                            <!-- <div class="section_subtitle">take a look at our</div> -->
<!--                             <div class="form_title">Tambahkan Berita Baru :</div>
                        </div>
                        <div class="form_content">
                            <form method="POST" id="form-tambah-post" action="{{ url('berita') }}" enctype="multipart/form-data" class="call_form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="section_subtitle">Judul Berita :</div>
                                    <div class="col-md-12">
                                        <input type="text" name="judul" id="judul" class="input_item" placeholder="Masukkan judul disini..." required="required">
                                    </div>
                                    <div class="section_subtitle">Isi Berita :</div>
                                    <div class="col-md-12">
                                        <textarea name="deskripsi" id="deskripsi" placeholder="Isi deskripsi berita disini..." class="textarea_input_item" required="required"></textarea>
                                    </div>
                                    <div class="section_subtitle">Pilih Foto yang diupload :</div>
                                    <div class="col-md-12">
                                        <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" required validate style="margin-bottom: 50px;">
                                    </div>
                                </div>
                                <div id="btn-submit-caption">
                                    <button type="submit" class="form_button" value="Submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endif -->

                <!-- News Post USER -->
                @if(Auth::guest())
                @foreach ($post as $kc => $vc)
                <div class="col-lg-12 news_col">
                    <div class="news_post">
                        @foreach ($gambar as $g => $ga)
                        @if($ga->post_id == $vc->id)
                        <!-- <div class="news_image"><img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div> -->
                        <div style="background:url(../public/images/post/{{$ga->post_id.'.'.$ga->extension}});" class="news_image"></div>
                        @endif
                        @endforeach
                        <div class="news_date d-flex flex-column align-items-center justify-content-center">
                            <div class="news_month">{{date('Y', strtotime($vc->tanggal))}} {{date('M', strtotime($vc->tanggal))}}</div>
                            <div class="news_day">{{date('d', strtotime($vc->tanggal))}}</div>
                        </div>
                        <div class="news_content">
                            <div class="news_title">{{$vc->judul}}</div>
                            @php $linkjudul = str_replace(' ', '+', $vc->judul);  @endphp
                            {{$vc->user->name}}
                            <div class="news_text">
                                <p>@php
                                    $string = $vc->deskripsi;
                                    $max = 300;
                                    if(strlen($string) > $max) {
                                      $shorter = substr($string, 0, $max+1);
                                      $string = substr($string, 0, strrpos($shorter, ' ')).'...';
                                    }
                                    @endphp
                                    {{$string}}
                                </p>
                            </div>
                        </div>
                        <div class="news_button"><a href="{{ url('berita/'.$linkjudul) }}">read more</a></div>
                    </div>
                </div>
                @endforeach
                <?php echo $post->render(); ?>
                @endif

                <!-- News Post NASABAH -->
                @if(Auth::user())
                @if(Auth::user()->role == 0)
                @foreach ($post as $kc => $vc)
                <div class="col-lg-12 news_col">
                    <div class="news_post">
                        @foreach ($gambar as $g => $ga)
                        @if($ga->post_id == $vc->id)
                        <!-- <div class="news_image"><img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div> -->
                        <div style="background:url(../public/images/post/{{$ga->post_id.'.'.$ga->extension}});" class="news_image"></div>
                        @endif
                        @endforeach
                        <div class="news_date d-flex flex-column align-items-center justify-content-center">
                            <div class="news_month">{{date('Y', strtotime($vc->tanggal))}} {{date('M', strtotime($vc->tanggal))}}</div>
                            <div class="news_day">{{date('d', strtotime($vc->tanggal))}}</div>
                        </div>
                        <div class="news_content">
                            <div class="news_title">{{$vc->judul}}</div>
                            @php $linkjudul = str_replace(' ', '+', $vc->judul);  @endphp
                            {{$vc->user->name}}
                            <div class="news_text">
                                <p>@php
                                    $string = $vc->deskripsi;
                                    $max = 300;
                                    if(strlen($string) > $max) {
                                      $shorter = substr($string, 0, $max+1);
                                      $string = substr($string, 0, strrpos($shorter, ' ')).'...';
                                    }
                                    @endphp
                                    {{$string}}
                                </p>
                            </div>
                        </div>
                        <div class="news_button"><a href="{{ url('berita/'.$linkjudul) }}">read more</a></div>
                    </div>
                </div>
                @endforeach
                <?php echo $post->render(); ?>
                @endif
                @endif

                
            </div>
        </div>
    </div>



<!-- raw -->
@if (session('pesan'))
	<div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
		{{ session('pesan') }}
	</div>
@endif

@endsection

@section('customjs')
<script src="{{ asset('js/news_custom.js') }}"></script>
@endsection