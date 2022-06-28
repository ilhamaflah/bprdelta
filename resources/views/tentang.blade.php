@extends('layouts.app')

@section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/about.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/about_responsive.css') }}">
<link rel="stylesheet" href="{{ asset('openlayer/ol.css') }}" type="text/css">
<script src="{{ asset('openlayer/ol.js') }}" type="text/javascript"></script>
@endsection

@section ('slider')
	<!-- Home -->
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/{{$tentang->banner}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_content_inner">
							<div class="home_title">Tentang PT. BPR Delta Lamongan</div>
							<div class="home_breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Beranda</a></li>
									<li>Tentang</li>
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

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 features_col">
					<div class="features_content">
						<div class="section_title_container">
							<div class="section_title">Sejarah PT. BPR DELTA LAMONGAN</div>
							<div class="section_subtitle"></div>
							<div class="section_text">
								{!!$tentang->sejarah!!}
							</div>
							<!-- <div class="link_button features_button"><a href="#">read more</a></div> -->
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="features_images clearfix">
						<div class="features_image_1"><img src="images/{{$tentang->thumb1}}" alt=""></div>
						<div class="features_image_2"><img src="images/{{$tentang->thumb2}}" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="test_faq">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 test_faq_col">
					<!-- Tabs -->
					<div class="tabs">
						
						<div class="tabs_container">
							<div class="tabs d-flex flex-row align-items-center justify-content-around">
								<div class="tab active">Visi</div>
								<div class="tab">Misi</div>
								<!-- <div class="tab">Quis varius mauris</div> -->
							</div>
							<div class="tab_panels">
								<div class="tab_panel active">
									<div class="tab_panel_content">
										<div class="tab_title">Visi PT. BPR DELTA LAMONGAN</div>
										{!!$tentang->visi!!}
									</div>
								</div>
								<div class="tab_panel">
									<div class="tab_panel_content">
										<div class="tab_title">Misi PT. BPR DELTA LAMONGAN</div>
										<!-- <p class="tab_text">Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec.</p> -->
										{!!$tentang->misi!!}
									</div>
								</div>
								<!-- <div class="tab_panel">
									<div class="tab_panel_content">
										<div class="tab_title">Make a good investment</div>
										<p class="tab_text">Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec.</p>
									</div>
								</div> -->
							</div>
						</div>

					</div>
				</div>

				<!-- <div class="col-lg-6 test_faq_col"> -->
					
					<!-- FAQ -->

					<!-- <div class="faq">
						<div class="section_title_container">
							<div class="section_subtitle">take a look at our</div>
							<div class="section_title">Faq / Frequently asked questions</div>
						</div> -->
						
						<!-- Accordions -->
<!-- 						<div class="elements_accordions">

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"><div>Aenean nec ipsum aliquet, pharetra magna id, interdum</div></div>
								<div class="accordion_panel">
									<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. </p>
								</div>
							</div>

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"><div>Aenean nec ipsum aliquet, pharetra magna id, interdum</div></div>
								<div class="accordion_panel">
									<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. </p>
								</div>
							</div>

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center active"><div>Aenean nec ipsum aliquet, pharetra magna id, interdum</div></div>
								<div class="accordion_panel">
									<p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem. Morbi ut dapibus dui. Sed ut iaculis elit. Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. </p>
								</div>
							</div>

						</div>

					</div>
 -->					
				<!-- </div> -->
			</div>
		</div>
	</div>

	<div class="map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>

		<div class="map_contact">
			<div class="map_contact_inner d-flex flex-column align-items-start justify-content-center">
				<div class="logo_container contact_logo">
					<div class="logo">
						<div class="logo_img_bpr"><img src="{{ asset('images/logodannama.png') }}" alt=""></div>
					</div>
				</div>
				<div class="map_contact_title">Kantor Pusat</div>
				<div class="logo_line_2">Jl. Raya Jombang nomor 59</div>
                <div class="logo_line_2">Kabupaten Lamongan</div>
                <div class="logo_line_2">Nomor Telepon : 0322-451322</div>
                <div class="logo_line_2">Nomor Fax : 0322-455600</div>
                <div class="logo_line_2">Email : bprdeltabbt@yahoo.co.id</div>
			</div>
		</div>
	</div>

@endsection

@section('customjs')
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('js/about_custom.js') }}"></script>
<script src="{{ asset('js/elements_custom.js') }}"></script>
<script type="text/javascript">
	var awal_koor_x = '112.164356';
    var awal_koor_y = '-7.119908';

    var format =  new ol.format.WKT();
	var arr_feature = [];

	var wkt = 'POINT (112.164356 -7.119908)'; // Pemisahnya spasi
	var titik_testing = format.readFeature(wkt, {
		dataProjection: 'EPSG:4326',
		featureProjection: 'EPSG:3857'
	});
	arr_feature[0] = titik_testing;

    // Start Layer
    	var layer_osm = new ol.layer.Tile({
		    source: new ol.source.OSM()
		});
    //	End Layer

    // Start Style
    var style_icon = new ol.style.Style({
        image: new ol.style.Icon({
      		anchor: [0.5, 1],
      		anchorXUnits: 'fraction',
      		anchorYUnits: 'fraction',
      		src: '{{ asset("images/accountancy.png") }}' 
        })
    });

 	var vector = new ol.layer.Vector({
		source: new  ol.source.Vector({
			features: arr_feature
		}),
		style: style_icon
	});
    // End Style

    // Start Map
    	var map = new ol.Map({
			target: 'map',
			layers: [
			 	layer_osm,
			 	vector
			],
			controls: [
				//Define the default controls
				new ol.control.Zoom(),
				new ol.control.Rotate(),
				new ol.control.Attribution(),
				//Define some new controls
				new ol.control.ZoomSlider(),
				new ol.control.MousePosition(),
				new ol.control.ScaleLine(),
				new ol.control.OverviewMap()
			],
			view: new ol.View({
				center: ol.proj.fromLonLat([awal_koor_x,awal_koor_y]),
			  	zoom: 15
			})
		});
    // End Map

</script>
@endsection
