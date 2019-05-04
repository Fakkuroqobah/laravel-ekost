@extends('landing.master')

@section('content')
<section>
	<div class="home">
		<div class="home_slider_container" style="height: 100%;">
			<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg); height: 50%;"></div>
		</div>
	</div>

	{{-- Home Search --}}
	<div class="home_search" style="margin-top: -310px;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container" style="top: -215px;">
						<div class="home_search_content">
							<form action="{{ route('search') }}" method="GET" class="search_form d-flex flex-row align-items-start justfy-content-start">
							<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
								<div>
									<input type="text" class="search_form_select" name="cari" value="" placeholder="Cari kos disini" autocomplete="off">
								</div>
								<div id="auto"></div>
							</div>
							<button class="search_form_button ml-auto">Cari</button>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group mt-4">
									<select name="jenis" id="" class="form-control">
										<option value="">Pilih jenis kos</option>
										@foreach ($jenis_kos as $jenis)
											<option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mt-4">
									<input type="number" name="min" class="form-control" id="" placeholder="Rentang harga minimum" value="{{ old('min') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group mt-4">
									<input type="number" name="max" class="form-control" id="" placeholder="Rentang harga maximum" value="{{ old('max') }}">
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		@if (count($kos) > 0)
			@foreach ($kos as $item)
			<div class="col-md-4 mb-4">
				<div class="recent_item">
					<div class="recent_item_inner">
						<div class="recent_item_image">
							<img src="images/{{ $item->foto }}" alt="">
						</div>
						<div class="recent_item_body text-center">
							<div class="recent_item_location">{{ $item->kota }}</div>
							<div class="recent_item_title"><a href="{{ route('detail', $item->id) }}">{{ $item->nama }}</a></div>
							<div class="recent_item_price">Rp. {{ number_format($item->harga, 0 , ' , ' ,  '.') }} (bulan)</div>
						</div>
						<div class="recent_item_footer d-flex align-items-center">
							<div class="text-center m-auto">{{ $item->alamat }}</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<div class="m-auto" style="">
				<h1 class="text-center mt-5 mb-5">Oops.. kosan tidak ditemukan</h1>
			</div>
		@endif
	</div>

</section>
@endsection