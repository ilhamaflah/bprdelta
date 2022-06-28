@extends('layouts.app')
@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial_responsive.css') }}">
@endsection

@section ('slider')
<div class="home_slider_container">
    
    <!-- Home Slider -->

    <div class="owl-carousel owl-theme home_slider">
        
        <!-- Slider Item -->
        <div class="owl-item">
            <div class="slider_background" style="background-image:url(images/fotodepan.jpg)"></div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col fill_height">
                        <div class="home_slider_content">
                            <h1>Project WFP Gasal 19-20</h1>
                            <div class="home_slider_text">A millennials-developed project, designed with the utmost reason for solving millennials'financial issues.
                            </div>
                            <!-- <div class="link_button home_slider_button"><a href="#">Coming Soon</a></div> -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <!-- Slider Item -->
        <div class="owl-item">
            <div class="slider_background" style="background-image:url(images/fotodepan.jpg)"></div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col fill_height">
                        <div class="home_slider_content">
                            <h1>VISI BPR Delta Lamongan</h1>
                            <div class="home_slider_text">
                                Menjadi BPR yang profesional, Tangguh dan Terpercaya dengan selalu mengutamakan kepuasan nasabah dari segi pelayanan.
                            </div>
                            <!-- <div class="link_button home_slider_button"><a href="#">Coming Soon</a></div> -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <!-- Slider Item -->
        <div class="owl-item">
            <div class="slider_background" style="background-image:url(images/fotodepan.jpg)"></div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="col fill_height">
                        <div class="home_slider_content">
                            <h1>MISI BPR Delta Lamongan</h1>
                            <div class="home_slider_text">
                                Menjalankan aktivitas BPR yang unggul dengan mengutamakan pelayanan kepada Usaha Mikro, kecil, menengah untuk menunjang peningkatan ekonomi rakyat kecil.
                            </div>
                            <!-- <div class="link_button home_slider_button"><a href="#">Coming Soon</a></div> -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>

    </div>

    <div class="home_slider_nav home_slider_prev d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_l.png') }}" alt=""></div>
    <div class="home_slider_nav home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('images/arrow_r.png') }}" alt=""></div>

</div>
@endsection

@section('content')

@if (session('pesan'))
	<div style="background-color: green; color: white; padding: 5px;text-align: center;font-weight: bold;">
		{{ session('pesan') }}
	</div>
@endif
@if (Auth::user())
@if (Auth::user()->role == 1)
<div class="container-tambah-post">
    <form method="POST" id="form-tambah-post" class="add_post" action="{{ url('berita') }}" enctype="multipart/form-data">

    	{{ csrf_field() }}

    	<label>Judul Berita:</label>
        <input type="text" name="judul" id="judul">
        <div id="container-upload">
            <div class="container-photo-upload">
                <div id="photo-upload">
                    Select a photo to upload : <br/>
                    <!-- (Max 10 photo to upload) <br/> -->
                    <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg" required validate/>
                </div>
            </div>
        </div>
        
        <div id="caption-isi">
            <label>Isi Berita :</label>
        </div>
        <textarea name="deskripsi" id="deskripsi" placeholder="Isi Judul Berita..."></textarea>
        <div id="btn-submit-caption">
            <button type="submit" class="contact_button trans_200" value="Submit">Submit</button>
        </div>
    </form>
</div>

<h4>Data Berita</h4>
@foreach ($post as $kc => $vc)
ID: {{$vc->id}} <br> JUDUL: {{$vc->judul}} <br>
@foreach ($gambar as $g => $ga)
@if($ga->post_id == $vc->id)
GAMBAR_ID: {{$ga->id}} <br>
POST_ID: {{$ga->post_id}} <br>
EXTENSION: {{$ga->extension}} <br>
GAMBAR: <img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}">
@endif
@endforeach
<br> DESKRIPSI: {{$vc->deskripsi}} <br> TANGGAL: {{date('d-m-Y', strtotime($vc->tanggal))}} <br> NAMA PEGAWAI: {{$vc->pegawai->name}} <br>

<a href="{{ url('berita/'.$vc->id.'/edit') }}">Edit</a>
<a href="#" onclick="getElementById('delete_{{$vc->id}}').submit()">Delete</a>
<form method="POST" action="{{ url('berita/'.$vc->id) }}" id="delete_{{$vc->id}}">
    {{method_field("DELETE")}}
    {{csrf_field()}}
</form>
<hr><br>
@endforeach
@endif
@endif
<!-- FOR USER -->
@if(Auth::guest())
@foreach ($post as $kc => $vc)
JUDUL: {{$vc->judul}} <br>
@foreach ($gambar as $g => $ga)
@if($ga->post_id == $vc->id)
<img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}">
@endif
@endforeach
<br> {{date('d-m-Y', strtotime($vc->tanggal))}} &nbsp Penulis: {{$vc->pegawai->name}} <br> DESKRIPSI: {{$vc->deskripsi}}
<hr><br>
@endforeach
@endif
<!-- FOR NASABAH -->
@if(Auth::user())
@if(Auth::user()->role == 0)
@foreach ($post as $kc => $vc)
JUDUL: {{$vc->judul}} <br>
@foreach ($gambar as $g => $ga)
@if($ga->post_id == $vc->id)
<img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}">
@endif
@endforeach
<br> {{date('d-m-Y', strtotime($vc->tanggal))}} &nbsp Penulis: {{$vc->pegawai->name}} <br> DESKRIPSI: {{$vc->deskripsi}}
<hr><br>
@endforeach
@endif
@endif

@endsection

@section('customjs')
<script src="{{ asset('js/financial_custom.js') }}"></script>
@endsection