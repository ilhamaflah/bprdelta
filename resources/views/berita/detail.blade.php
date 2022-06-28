@extends('layouts.app')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/news_responsive.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="../images/news_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Berita</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li><a href="{{ url('berita') }}">Berita</a></li>
                                <li>{{ $post->judul }}</li>
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
                <div class="col-lg-12 news_col">
                    <div class="news_post">
                        <div style="background:url(../../public/images/post/{{$gambar->post_id.'.'.$gambar->extension}});" class="news_image"></div>
                        <div class="news_date d-flex flex-column align-items-center justify-content-center">
                            <div class="news_day">{{date('d', strtotime($post->tanggal))}}</div>
                            <div class="news_month">{{date('M', strtotime($post->tanggal))}} {{date('Y', strtotime($post->tanggal))}}</div>
                        </div>
                        <div class="news_content">
                            <div class="news_title">{{$post->judul}}</div>
                            <!-- <div class="news_text">
                                <p>{{$post->deskripsi}}</p>
                            </div> -->
                        </div>
                        <div class="detail_content">
                            <div class="detail_text">
                                <p>{{$post->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hr_border"></div>

                    @php $data = 0; @endphp
                    @foreach ($post_2 as $kc => $vc)
                    @php
                    $data += 1;
                    @endphp
                    @endforeach
                    @if($data == 3)
                    @foreach ($post_2 as $kc => $vc)
                    <div class="col-lg-3 features_col">
                        <div class="features_item">
                            @foreach ($gambar_2 as $g => $ga)
                            @if($ga->post_id == $vc->id)
                            <div class="features_image"><img src="../../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div>
                            @endif
                            @endforeach
                            <div class="features_item_content">
                                <div class="features_item_title"><a href="{{ url('berita/'.$vc->judul) }}">{{$vc->judul}}</a></div>
                                <div class="features_item_text">
                                    <p>@php
                                        $string = $vc->deskripsi;
                                        $max = 150;
                                        if(strlen($string) > $max) {
                                          $shorter = substr($string, 0, $max+1);
                                          $string = substr($string, 0, strrpos($shorter, ' ')).'...';
                                        }
                                        @endphp
                                        {{$string}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-3 features_col">
                        <div class="features_item">
                            <div class="features_image"><img src="{{ asset('images/benefits_1.jpg') }}" alt=""></div>
                            <div class="features_item_content">
                                <div class="features_item_title"><a href="#" style="pointer-events: none; cursor: default;">Berita 1</a></div>
                                <div class="features_item_text">
                                    <p>Budgeting presents you the choices on what stuff to enjoy – based on your financial limitations. It does not stop you from enjoying stuff, it ensures that you enjoy stuff when you want it.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Raw -->
                    <!-- @php //dd($post); @endphp -->
                    <!-- <div class="news_post">

                            <label>Judul Berita:</label>
                            <input type="text" name="judul" id="judul" value="{{ $post->judul }}">
                            <div id="container-upload">
                                <div class="container-photo-upload">
                                    <div id="photo-upload">
                                        Select a photo to upload : <br/> -->
                                        <!-- (Max 10 photo to upload) <br/> -->
                                        <!-- <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" validate/>
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    

@endsection

@section('customjs')
<script src="{{ asset('js/news_custom.js') }}"></script>
@endsection


