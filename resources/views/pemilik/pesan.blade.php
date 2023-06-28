@extends('pemilik.master')

@section('content')
	
	<table class="table table-bordered" style="background-color: #fff" id="dataPesan">
	  	<thead>
		    <tr>
			    {{-- <th scope="col">
					<input id="all" type="checkbox">
				</th> --}}
			    <th scope="col">No</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Email</th>
			    <th scope="col">Kos</th>
			    <th scope="col">Pesan</th>
			    <th scope="col">Waktu</th>
			    <th scope="col">Aksi</th>
		    </tr>
	  	</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($all as $row)
			    <tr>
			      	{{-- <th scope="row">
						<form id="all" action="{{ route('delete.pesanAll') }}" method="POST">
							@csrf
							<input type="checkbox" id="single" name="arr[]" data-id="{{ $row->id }}">
						</form>
					</th> --}}
			      	<th scope="row">{{ $no++ }}</th>
			      	<td>{{ $row->nama }}</td>
			      	<td>{{ $row->email }}</td>
			      	<td>{{ $row->namakos }}</td>
			      	<td>{{ $row->subjek }}</td>
					<td>{{ $row->created_at }}</td>
					<td>
						<form id="form-hapus" action="{{ route('delete.pesan', $row->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button id="btn-delete" type="submit" class="btn btn-danger" style="width: 100%;">Hapus</button>
						</form>
					</td>
			    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{-- <button id="rpl-btn-all" type="button" class="btn btn-danger">Hapus yang dicentang</button> --}}

@endsection

@section('script')
	<script>

		$(document).ready(function() {
			$('#dataPesan').DataTable();
		});

		$("#rpl-btn-all").click(function () {
			let d = $("input#single").attr('class');

			if (d != "") {
				let c = $('form#all').submit();
			}
		});

		$("form #single").click(function() {
			$( this ).toggleClass( "rpl-checked" );
			// let id = $('form #single').data('id');
			// let data = [];
			// data.push(id);
			// console.log(id);
		});

		$( "#all" ).click(function() {
			$( this ).toggleClass( "rpl-checked" );
			let a = $(this).attr('class');

			if (a != "") {
				$( "#single" ).addClass( "rpl-checked" );
				$("body #single").prop('checked', true);
			}else{
				$( "#single" ).removeClass( "rpl-checked" );
				$("body #single").prop('checked', false);
			}
		});

		$("form#form-hapus").click('#btn-delete', function (event) {

			event.preventDefault();	
			let href = $(this).attr('action');

			swal({
				title: "Kamu yakin?",
				text: "Data akan dihapus secara permanen!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$(this).submit();
				}
			});

		});	

	</script>
@endsection