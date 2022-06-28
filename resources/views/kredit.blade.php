@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/feature.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/{{$kredit->banner}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Kredit</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Kredit</li>
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
<div class="intro">
	<div class="container">
		<div class="row">
			<!-- <div class="col-lg-6">
				<div class="intro_image text-lg-right text-center"><img src="images/intro.png" alt=""></div>
			</div> -->
			<div class="col-lg-6">
				<div class="intro_content">
					<div class="intro_title_container">
						<h1 class="intro_title">Kredit</h1>
						<div class="intro_subtitle"></div>
					</div>
					<div class="intro_text">
						{!!$kredit->keterangan!!}
					</div>
					<!-- <div class="link_button intro_button"><a href="#">read more</a></div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cta">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="cta_content text-center d-flex flex-row align-items-center justify-content-center">
					<div class="cta_text"><a href="#" style="pointer-events: none; cursor: default;">
					Jenis Kredit</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

@foreach ($typekredit as $type => $t)
@if($t->id & 1)
<!-- System -->

<div class="system">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 nopadding">
				<div class="system_content">
					<div class="system_title_container">
						<div class="system_title">{!!$t->nama!!}</div>
						<div class="system_subtitle"></div>
						<div class="system_text">{!!$t->keterangan!!}</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 nopadding">
				<div class="system_image">
					<div class="system_background" style="background-image:url(images/{{$t->gambar}})"></div>
				</div>
			</div>
		</div>
	</div>		
</div>

@else
<!-- Info -->

<div class="info">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 nopadding order-lg-1 order-2">
				<div class="info_image">
					<div class="info_background" style="background-image:url(images/{{$t->gambar}})"></div>
				</div>
			</div>
			<div class="col-lg-6 nopadding order-lg-2 order-1">
				<div class="info_content">
					<div class="info_title_container">
						<div class="info_title">{!!$t->nama!!}</div>
						<div class="info_subtitle"></div>
						<div class="info_text">{!!$t->keterangan!!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endforeach
<!-- Info -->
<div class="cta">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="cta_content text-center d-flex flex-row align-items-center justify-content-center">
					<div class="cta_text"><a href="#" style="pointer-events: none; cursor: default;">
					Syarat & Ketentuan</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="info">
	<div class="container">
		<div class="row info_row">
			<!-- Info Item -->
			<div class="col-lg-10 info_col">
				<div class="info_content">
					<div class="info_title_container">
						<!-- <div class="info_subtitle">take a look at our</div> -->
						<div class="info_title">Persyaratan pengajuan kredit :</div>
						<div class="info_subtitle"></div>
						<div class="info_text">
							{!!$kredit->syarat_pengajuan!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('customjs')
@endsection