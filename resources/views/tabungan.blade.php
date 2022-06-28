@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/feature.css') }}">
@endsection

@section('slider')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/{{$tabungan->banner}}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_content_inner">
                        <div class="home_title">Tabungan</div>
                        <div class="home_breadcrumbs">
                            <ul>
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Tabungan</li>
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
			<div class="col-lg-6">
				<div class="intro_content">
					<div class="intro_title_container">
						<h1 class="intro_title">Tabungan</h1>
						<div class="intro_subtitle"></div>
					</div>
					<div class="intro_text">
						{!!$tabungan->keterangan!!}
					</div>
					<!-- <div class="link_button intro_button"><a href="#">read more</a></div> -->
				</div>
			</div>
			<div class="col-lg-6">
				<div class="intro_content">
					<div class="intro_title_container">
						<h1 class="intro_title">Manfaat menabung di BPR</h1>
						<div class="intro_subtitle"></div>
					</div>
					<div class="intro_text">
						<div class="info_text">
							{!!$tabungan->manfaat!!}
						</div>
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
					Jenis Tabungan</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

@foreach ($typetabungan as $type => $t)
@if($t->id & 1)
<div class="system">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 nopadding">
				<div class="system_content">
					<div class="system_title_container">
						<!-- <div class="system_subtitle">take a look at our</div> -->
						<div class="system_title">{!!$t->nama!!}</div>
						<div class="info_subtitle"></div>
						<div class="info_text">
							{!!$t->keterangan!!}
						</div>
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
						<!-- <div class="info_subtitle">take a look at our</div> -->
						<div class="info_title">{!!$t->nama!!}</div>
						<div class="info_subtitle"></div>
						<div class="info_text">
							{!!$t->keterangan!!}
						</div>
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
			<div class="col-lg-6 info_col">
				<div class="info_content">
					<div class="info_title_container">
						<!-- <div class="info_subtitle">take a look at our</div> -->
						<div class="info_title">Perorangan</div>
						<div class="info_subtitle"></div>
						<div class="info_text">
							{!!$tabungan->syarat_orang!!}
						</div>
					</div>
				</div>

				<!-- <div class="info_item text-center">
					<div class="info_image"><img src="images/info_1.png" alt=""></div>
					<div class="info_title">Perorangan</div>
					<div class="info_text">
						<p class="info_text">Membawa KTP /SIM Passport asli yang masih berlaku</p>
					</div>
				</div> -->
			</div>

			<!-- Info Item -->
			<div class="col-lg-6 info_col">
				<div class="info_content">
					<div class="info_title_container">
						<!-- <div class="info_subtitle">take a look at our</div> -->
						<div class="info_title">Perusahaan</div>
						<div class="info_subtitle"></div>
						<div class="info_text">
							{!!$tabungan->syarat_perusahaan!!}
						</div>
					</div>

					<!-- <div class="info_image"><img src="images/info_2.png" alt=""></div>
					<div class="info_title">Perusahaan</div>
					<div class="info_text">
						<p>
							<ul>
								<li class="info_text">KTP / SIM / Passport pejabat yang berwenang</li>
								<li class="info_text">SIUP, NPWP, Akta Pendirian Perusahaan dan perubahan terakhir</li>
							</ul>
						</p>
					</div> -->
				</div>
			</div>

			<!-- Info Item -->
			<!-- <div class="col-lg-4 info_col">
				<div class="info_item text-center">
					<div class="info_image"><img src="images/info_3.png" alt=""></div>
					<div class="info_title">Lainnya</div>
					<div class="info_text">
						<ul>
							<li class="info_text">Bunga dikenakan pajak sesuai ketentuan yang berlaku</li>
							<li class="info_text">Tingkat suku bunga dan biaya dapat berubah sewaktu-waktu</li>
						</ul>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</div>


<!-- Services -->

<!-- <div class="services">
	<div class="container">
		<div class="row">
			<div class="col d-flex flex-row flex-wrap align-items-start justify-content-start"> -->

				<!-- Service -->
	<!-- 			<div class="service col-lg-10">
					<div class="service_icon"><img src="{{ asset('images/service_2.svg') }}" class="svg" alt=""></div>
					<div class="service_title">Tabungan ABA</div>
					<div class="service_text">
						<p></p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div> -->
@endsection

@section('customjs')
@endsection


