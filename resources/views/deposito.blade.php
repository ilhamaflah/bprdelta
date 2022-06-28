@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/feature.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/{{$deposito->banner}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Deposito</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Deposito</li>
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
						<h1 class="intro_title">Deposito</h1>
						<div class="intro_subtitle"></div> 	
					</div>
					<div class="intro_text">
						{!!$deposito->keterangan!!}
					</div>
					<!-- <div class="link_button intro_button"><a href="#">read more</a></div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- System -->

<div class="system">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 nopadding">
				<div class="system_content">
					<div class="system_title_container">
						<div class="system_title">Manfaat Deposito</div>
						<div class="system_subtitle"></div>
						<div class="system_text">
							{!!$deposito->manfaat!!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 nopadding">
				<div class="system_image">
					<div class="system_background" style="background-image:url(images/{{$deposito->gambar}})"></div>
				</div>
			</div>
		</div>
	</div>		
</div>

@endsection

@section('customjs')
@endsection


