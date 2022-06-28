@extends('layouts.app')

@section ('slider')
<div class="home_slider_container">
	
	<!-- Home Slider -->

	<div class="owl-carousel owl-theme home_slider">
		
		<!-- Slider Item -->
		<div class="owl-item">
			@foreach($home as $homes => $h)
			@if($h->id == 1)
			<div class="slider_background" style="background-image:url(images/{{$h->banner}})"></div>
			@endif
			@endforeach
			<div class="container fill_height">
				<div class="row fill_height">
					<div class="col fill_height">
						<div class="home_slider_content">
							<h1>Alamat Kantor</h1>
							<div class="home_slider_text">
								<!-- <div class="map_contact_title">Kantor Pusat</div> -->
								<div class="logo_line_2">Jl. Raya Jombang nomor 59</div>
				                <div class="logo_line_2">Kabupaten Lamongan</div>
				                <div class="logo_line_2">Nomor Telepon : 0322-451322</div>
				                <div class="logo_line_2">Nomor Fax : 0322-455600</div>
				                <div class="logo_line_2">Email : bprdeltabbt@yahoo.co.id</div>
							</div>
							<!-- <div class="link_button home_slider_button"><a href="#">Coming Soon</a></div> -->
						</div>
					</div>
				</div>
			</div>	
		</div>

		<!-- Slider Item -->
		<div class="owl-item">
			@foreach($home as $homes => $h)
			@if($h->id == 2)
			<div class="slider_background" style="background-image:url(images/{{$h->banner}})"></div>
			@endif
			@endforeach
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
			@foreach($home as $homes => $h)
			@if($h->id == 3)
			<div class="slider_background" style="background-image:url(images/{{$h->banner}})"></div>
			@endif
			@endforeach
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
	
	<!-- Features -->
@section('content')
	<div class="features">
		<div class="container">
			<div class="row">

				<!-- Features Title -->
				<div class="col-lg-3 features_col">
					<div class="features_content">
						<div class="features_title_container">
							<!-- <div class="features_subtitle">Impontance of</div> -->
							<div class="features_title">BERITA TERKINI</div>
							<!-- <div class="features_text">Budgeting is the most basic and efficient tool for managing your money. <br><br> 
							Yet, most people naively evading it for its bothersomeness. <br><br>
							While in fact, Budgeting absolutely gives you more freedom than ever. It allows you to-</div> -->
							<div class="link_button features_button"><a href="{{ url('/berita') }}">Lihat Semua</a></div>
						</div>
					</div>
				</div>
				@php $data = 0; @endphp
				@foreach ($post as $kc => $vc)
				@php
				$data += 1;
				@endphp
				@endforeach
				<!-- Features Item -->
				@if($data == 3)
				@foreach ($post as $kc => $vc)
				<div class="col-lg-3 features_col">
					<div class="features_item">
						@foreach ($gambar as $g => $ga)
                        @if($ga->post_id == $vc->id)
						<div class="features_image"><img src="../public/images/post/{{$ga->post_id.'.'.$ga->extension}}" alt=""></div>
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
				<!-- Features Item -->
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

				<!-- Features Item -->
				<div class="col-lg-3 features_col">
					<div class="features_item">
						<div class="features_image"><img src="{{ asset('images/benefits_2.jpg') }}" alt=""></div>
						<div class="features_item_content">
							<div class="features_item_title"><a href="#" style="pointer-events: none; cursor: default;">Berita 2</a></div>
							<div class="features_item_text">
								<p>Budgeting makes you control your money; not your money controls you. It will save you the grief of overspending and being too much in debt.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 features_col">
					<div class="features_item">
						<div class="features_image"><img src="{{ asset('images/benefits_3.jpg') }}" alt=""></div>
						<div class="features_item_content">
							<div class="features_item_title"><a href="#" style="pointer-events: none; cursor: default;">Berita 3</a></div>
							<div class="features_item_text">
								<p>In budgeting, you get to identify and eliminate unnecessary spendings like late fees, penalties, and interests. These seemingly small savings can add up over time.</p>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

	<!-- CTA -->

	<div class="cta">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_content text-center d-flex flex-row align-items-center justify-content-center">
						<div class="cta_text"><a href="#" style="pointer-events: none; cursor: default;">
						Layanan Bank</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-row flex-wrap align-items-start justify-content-start">

					<!-- Service -->
					<div class="service">
						<!-- <div class="service_icon"><img src="{{ asset('images/service_2.svg') }}" class="svg" alt=""></div> -->
						<div class="service_title">Tabungan</div>
						<div class="service_text">
							{!!$tabungan->keterangan!!}
						</div>
						<!-- <div class="service_link"><a href="#">Read More</a></div> -->
					</div>

					<!-- Service -->
					<div class="service">
						<!-- <div class="service_icon"><img src="{{ asset('images/service_3.svg') }}" class="svg" alt=""></div> -->
						<div class="service_title">Deposito</div>
						<div class="service_text">
							{!!$deposito->keterangan!!}
						</div>
						<!-- <div class="service_link"><a href="#">Read More</a></div> -->
					</div>

					<!-- Service -->
					<div class="service">
						<!-- <div class="service_icon"><img src="{{ asset('images/service_1.svg') }}" class="svg" alt=""></div> -->
						<div class="service_title">Kredit</div>
						<div class="service_text">
							{!!$kredit->keterangan!!}
						</div>
						<!-- <div class="service_link"><a href="#">Read More</a></div> -->
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
