<!DOCTYPE html>
<html lang="en">
<head>
<title>Kos'E | Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Kos'E">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/landing.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/default.date.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>

   	<style>#mapid { height: 280px; }</style>

	<script src="{{ asset('js/sweetalert.min.js') }}"></script>
</head>
<body>

<div class="super_container">

	{{-- alert --}}
    @include('partials.alert')

	@include('partials.landing.header')
	
	{{-- Home --}}
	@yield('content')

	{{-- Footer --}}
	<footer class="footer">
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-row align-items-center justify-content-start">
							<div class="cr">{{-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --}}
								Copyright Kos'E &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
								{{-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --}}
							</div>
							<div class="footer_nav">
								<ul>
									@auth
										<li class="active"><a href="{{ url('/') }}">HOME</a></li>
										<li><a href="{{ route('pemesanan', Auth::user()->id) }}">PEMESANAN</a></li>
									@else
										<li><a href="{{ route('register') }}">DAFTAR</a></li>
										<li><a href="{{ route('register.pemilik') }}">GABUNG</a></li>
										<li><a href="{{ route('login') }}">LOGIN</a></li>
									@endauth
								</ul>
							</div>
							<div class="footer_phone ml-auto">Kos'E</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('css/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('css/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/property.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/picker.js') }}"></script>
<script src="{{ asset('js/picker.date.js') }}"></script>
<script src="{{ asset('js/id_ID.js') }}"></script>

@yield('script')

<script>
	// custom
	$(".search_form_select").keyup(function(){
		let query = $(this).val();
		
	    let _token = $('input[name="_token"]').val();
	    if (query != "") {
	        $.ajax({
	            url: "{{ route('auto') }}",
	            method: "GET",
	            data: {query:query},
	            success: function (data){
	                $('#auto').fadeIn();
	                $('#auto').html(data);
	            }
	        });
	    }
	});

	$("body").on("click", "li.rpl-dropdown-item", function(e){
		e.preventDefault();
        $(".search_form_select").val($(this).text());
        $("#auto2").fadeOut();
    });

    $("body").on("click", function(){
        $(".rpl-dropdown").css("display", "none");
    });
</script>

</body>
</html>