@extends('landing.master')

@section('content')
<section>
	<div class="home">

		{{-- Home Slider --}}
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				{{-- Slide --}}
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="slide_container text-center">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="">
										<div class="home_title">Cari Kos ?</div>
										<div class="home_price"><b>Mudah</b> Sekarang</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	{{-- Home Search --}}
	<div class="home_search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container">
						<div class="home_search_content">
							<form action="{{ route('search') }}" method="GET" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									<div>
										<input type="text" class="search_form_select" name="cari" value="" placeholder="Cari kos disini" autocomplete="off">
									</div>
									<div id="auto"></div>
								</div>
								<button class="search_form_button ml-auto">Cari</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	{{-- introduction --}}
	<div class="introduction m-5">
		<div class="rpl-intro text-center">
			<h2 class="rpl-judul-intro">Cari kostan & berwirausaha</h2>
			<p class="rpl-p-intro">
				Kos'E membantumu mencari kosan dengan mudah, terpercaya dan sesuai selera. Membantumu yang ingin berwirausaha di bidang kostan pun bisa di sini
			</p>
		</div>
	</div>

	{{-- features --}}
	<div class="features">
		<div class="rpl-fitur text-center">
			<h2 class="rpl-judul-fitur mb-3">Features</h2>
			<div class="rpl-card">
				<i class="fa fa-search rpl-icon-fitur mb-2" aria-hidden="true"></i>
				<div class="rpl-card-judul">Search</div>
				<p class="rpl-card-body">Cari kostan pilihanmu dengan cepat di seluruh Indonesia</p>
			</div>
			<div class="rpl-card">
				<i class="fa fa-book rpl-icon-fitur mb-2" aria-hidden="true"></i>
				<div class="rpl-card-judul">Information</div>
				<p class="rpl-card-body">Lihat detail dari informasi kostan & foto tempat</p>
			</div>
			<div class="rpl-card">
				<i class="fa fa-bullhorn rpl-icon-fitur mb-2" aria-hidden="true"></i>
				<div class="rpl-card-judul">Promotion</div>
				<p class="rpl-card-body">Promosikan usaha kostanmu dengan cepat</p>
			</div>
		</div>
	</div>
</section>
@endsection