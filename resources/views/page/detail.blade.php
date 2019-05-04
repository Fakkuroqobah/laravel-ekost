@extends('landing.master')

@section('content')
<section>
    
    <link rel="stylesheet" href="{{ asset('css/property.css') }}">

	{{-- Intro --}}

	<div class="intro" style="margin-top: -200px;">
		<div class="intro_slider_container">

			{{-- Intro Slider --}}
			<div class="owl-carousel owl-theme intro_slider">
				<div class="owl-item"><img src="{{ asset('images/'. $kos->foto) }}" alt=""></div>
				<div class="owl-item"><img src="{{ asset('images/'. $kos->foto) }}" alt=""></div>
				<div class="owl-item"><img src="{{ asset('images/'. $kos->foto) }}" alt=""></div>
			</div>

			{{-- Intro Slider Nav --}}
			<div class="intro_slider_nav_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="intro_slider_nav_content d-flex flex-row align-items-start justify-content-end">
								<div class="intro_slider_nav intro_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
								<div class="intro_slider_nav intro_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- Property --}}

	<div class="property">
		<div class="container">
			<div class="row">
		
				{{-- Sidebar --}}

				<div class="col-lg-4">
					<div class="sidebar">
						<div class="sidebar_search">
							<div class="sidebar_search_title">{{ $kos->nama }}</div>
							<div class="sidebar_search_form_container text-center mb-3">
								<p>
									Harga: Rp. {{ number_format($kos->harga, 0 , ' , ' ,  '.') }} /Bulan <br>
									Uang muka: Rp. {{ number_format($kos->uang_muka, 0 , ' , ' ,  '.') }} <br>
									Terakhir diupdate {{ $kos->updated_at->diffForHumans() }}
								</p>
							</div>
							@auth
								<h4 class="text-center">Pesan Kos</h4>
								<form id="booking" action="{{ route('booking', $kos->id) }}" method="POST">
									@csrf
									<div class="form-group">
										<input type="text" id="tgl_awal" class="form-control bg-light" autocomplete="off" data-id="{{ $kos->id }}" placeholder="Tanggal Masuk">
									</div>

									<div class="form-group">
										<input type="text" id="tgl_akhir" class="form-control bg-light" autocomplete="off" data-id="{{ $kos->id }}" placeholder="Tanggal Keluar">
									</div>

									<button id="pesan-kos" class="btn btn-success btn-block">Pesan</button>
								</form>
								<button class="btn btn-block mt-3 rpl-btn-hubungi" data-toggle="modal" data-target="#hubungi">Tanyakan sesuatu</button>
							@else
								<p class="text-center">Login untuk pesan</p>
							@endauth
						</div>

						{{-- Realtor --}}
						<div class="sidebar_realtor">
							<div class="sidebar_realtor_body text-center">
								<h4 >Pemilik Kos</h4>
								<div class="sidebar_realtor_title"><a href="#">{{ $kos->pemilik->nama }}</a></div>
								<div class="sidebar_realtor_subtitle"><span>Email : {{ $kos->pemilik->email }}</span></div>
								<div class="sidebar_realtor_phone"><span>No. Rekening: </span>{{ $kos->pemilik->no_rek }}</div>
								<div class="sidebar_realtor_phone"><span>No. Telp: </span>{{ $kos->pemilik->no_telp }}</div>
							</div>
						</div>
					</div>
				</div>
				
				{{-- Property Content --}}
				<div class="col-lg-7 offset-lg-1">
					<div class="property_content">
						<div class="property_icons">
							<div class="property_title">Fasilitas</div>
							<div class="property_text property_text_1">
								<ol class="ml-3" style="margin-bottom: 0">
									@foreach ($kos->fasilitas as $item)
										<li style="font-weight: bold">{{ $item->nama }}</li>
									@endforeach
								</ol>
							</div>
						</div>

						{{-- Description --}}

						<div class="property_description">
							<div class="property_title">Deskripsi</div>
							<div class="property_text property_text_2">
								<p>{{ $kos->keterangan }}</p>
							</div>
						</div>

						<div class="property_description">
							<div class="property_title">Lokasi</div>
							<div class="property_text property_text_2">
								<div id="mapid" class="mt-5"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- modal --}}
	<div class="modal fade" id="hubungi" tabindex="-1" role="dialog" aria-labelledby="hubungiLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="hubungiLabel">Tanyakan sesuatu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@auth
					<form id="hubungi" action="{{ route('pesan', $kos->id) }}" method="POST">
						@csrf
						<div class="modal-body">
							<div class="form-group">
								<textarea name="subjek" id="subjek" class="form-control" cols="30" rows="10" placeholder="Tulis Sesuatu..." required></textarea>
							</div>
							<input type="hidden" name="pemilik" value="{{ $kos->id_pemilik }}">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="kirim">Kirim</button>
						</div>
					</form>
				@else
					<div class="modal-body text-center">
						<h2>Anda Harus login</h2>
						<a href="{{ route('login') }}" class="btn btn-block btn-primary">Login disini</a>
					</div>
				@endauth
			</div>
		</div>
	</div>

</section>
@endsection

@section('script')
<script>
	
	// var mymap = L.map('mapid').setView([{{ $kos->latitude . "," . $kos->longitude }}], 13);

	// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	// 	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	// }).addTo(mymap);

	// L.marker([{{ $kos->latitude . "," . $kos->longitude }}]).addTo(mymap)
	// 	.bindPopup('Lokasi kos.')
	// 	.openPopup();

	$('#um').on('mouseenter', function(){
		$('#um').tooltip('show');
	});

	let tgl_awal  = $('#tgl_awal').pickadate({
		format: 'CheckIn: dddd, dd mmm, yyyy',
		min: new Date(),
		disable: [
			@foreach ($booking as $tgl)
				// { from: [2019,02 - 1,6], to: [2019,02 - 1,21] },
				@php 
					$masuk  = explode('-', $tgl->tgl_masuk);
					$tahun_masuk = explode(',', $masuk[0]);
					$bulan_masuk = explode(',', $masuk[1]);
					$tgl_masuk   = explode(',', $masuk[2]);
					$tanggal_masuk = implode(',', [$tahun_masuk[0], $bulan_masuk[0] - 1, $tgl_masuk[0]]);

					$keluar  = explode('-', $tgl->tgl_keluar);
					$tahun_keluar = explode(',', $keluar[0]);
					$bulan_keluar = explode(',', $keluar[1]);
					$tgl_keluar   = explode(',', $keluar[2]);
					$tanggal_keluar = implode(',', [$tahun_keluar[0], $bulan_keluar[0] - 1, $tgl_keluar[0]]);
				@endphp
					
				{ from: [{{ $tanggal_masuk }}], to: [{{ $tanggal_keluar }}] },

			@endforeach
		],
	});

	
	// let ab = @php // $total_booking->days @endphp;

	let tgl_akhir = $('#tgl_akhir').pickadate({
		format: 'CheckOut: dddd, dd mmm, yyyy',
		min: new Date(),
		disable: [
			@foreach ($booking as $tgl)
				@php 
					$masuk  = explode('-', $tgl->tgl_masuk);
					$tahun_masuk = explode(',', $masuk[0]);
					$bulan_masuk = explode(',', $masuk[1]);
					$tgl_masuk   = explode(',', $masuk[2]);
					$tanggal_masuk = implode(',', [$tahun_masuk[0], $bulan_masuk[0] - 1, $tgl_masuk[0]]);

					$keluar  = explode('-', $tgl->tgl_keluar);
					$tahun_keluar = explode(',', $keluar[0]);
					$bulan_keluar = explode(',', $keluar[1]);
					$tgl_keluar   = explode(',', $keluar[2]);
					$tanggal_keluar = implode(',', [$tahun_keluar[0], $bulan_keluar[0] - 1, $tgl_keluar[0]]);
				@endphp

				{ from: [{{ $tanggal_masuk }}], to: [{{ $tanggal_keluar }}] },

			@endforeach
		],
	});
	
	$("button#pesan-kos").click(function(e){
		e.preventDefault();

		let awal_select = tgl_awal.pickadate('picker');
		let $awal		= awal_select.get('select', 'yyyy/mm/dd');
		
		let akhir_select = tgl_akhir.pickadate('picker');
		let $akhir		 = akhir_select.get('select', 'yyyy/mm/dd');
		let $bulan		 = akhir_select.get('select', 'mm');

		if ($awal == '' || $akhir == '') {
			swal("Oops!", "Tanggal tidak boleh kosong", "warning")
			return false;			
		}

		let tgl = new Date();
		if (tgl.getMonth() + 1 == $bulan) {
			swal("Oops!", "Minimal penyewaan 1 bulan", "warning")
			akhir_select.clear();
			return false;
		}

		// if ($awal == $akhir) {
		// 	swal("Oops!", "Minimal penyewaan 1 hari", "warning")
		// 	awal_select.clear();
		// 	akhir_select.clear();
		// 	return false;
		// }

		if ($awal > $akhir) {
			swal("Oops!", "pengaturan tanggal kamu salah", "warning")
			awal_select.clear();
			akhir_select.clear();
			return false;
		}

		let form = $('form#booking'),
			url  = form.attr('action'),
			id  = $('#tgl_awal').data('id'),
			_token = $('input[name="_token"]').val();
		
		// $total_booking = date_diff(date_create($tgl->tgl_masuk), date_create($tgl->tgl_keluar));
		@auth
			$.ajax({
				url: url,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method: "POST",
				data: {awal:$awal, akhir:$akhir, id:id, token:_token},
				success: function(response){
					swal("Pemesanan berhasil!", "Silahkan lakukan pembayaran uang muka", "success")
					.then((value) => {
						window.location.href = '{{ route('pemesanan', Auth::user()->id) }}' ;
						awal_select.clear();
						akhir_select.clear();
					});
				},
				error: function(xhr){
					swal("Pemesanan gagal!", "Kamu sudah memesan kos ini sebelumnya", "warning")
					.then((value) => {
						awal_select.clear();
						akhir_select.clear();
					});
				}
			});
		@endauth
	});

	// hubungi
	$('#kirim').click(function(event){
		event.preventDefault();
		let form = $('form#hubungi'),
			url  = form.attr('action');

		form.find('#subjek').removeClass('is-invalid');
		form.find('#rpl-feedback').remove();

		$.ajax({
			url: url,
			method: "POST",
			data: form.serialize(),
			success: function(response){
				$('#subjek').val('');
				$('.modal').modal('hide');
				swal("Pesan terkirim!", "Tungggu email dari pemilik kos", "success");
			},
			error: function(xhr){
				let res = xhr.responseJSON;
				if ($.isEmptyObject(res) == false) {
					$.each(res.errors, function(key, value){
						$('#' + key)
							.addClass('is-invalid')
							.after('<span id="rpl-feedback" class="invalid-feedback" role="alert"><strong>' + value + '</strong></span>')
					});
				}
			}
		});
	});

</script>
@endsection