@extends('pemilik.master')

@section('content')

	<style>
		table.table-responsive {
			display: inline-table;
		}
		@media (max-width: 992px) {
			table.table-responsive {
				display: block;
			}
		}
	</style>
	
	<table class="table table-bordered table-responsive" id="dataBooking" style="background-color: #fff;">
	  	<thead>
		    <tr class="text-center">
			    {{-- <th scope="col">
					<input id="all" type="checkbox">
				</th> --}}
			    <th scope="col">No</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Email</th>
			    <th scope="col">Kos</th>
			    <th scope="col">Tgl Masuk</th>
			    <th scope="col">Tgl Keluar</th>
			    <th scope="col">Status</th>
			    <th scope="col">pembayaran</th>
			    <th scope="col">Aksi</th>
		    </tr>
	  	</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($all as $row)
			    <tr class="text-center">
			      	{{-- <th scope="row">
						<form id="all" action="{{ route('delete.pesanAll') }}" method="POST">
							@csrf
							<input type="checkbox" id="single" name="arr[]" data-id="{{ $row->id }}">
						</form>
					</th> --}}
			      	<th scope="row">{{ $no++ }}</th>
			      	<td>{{ $row->namaUser }}</td>
			      	<td>{{ $row->emailUser }}</td>
			      	<td>{{ $row->namaKos }}</td>
			      	<td>{{ date('j F Y', strtotime($row->tgl_masuk)) }}</td>
					<td>{{ date('j F Y', strtotime($row->tgl_keluar)) }}</td>
					<td>
                        @if ( $row->deleted_at !== null )
							<span class="badge badge-danger">CANCEL</span>
						@else
							<span class="badge badge-success">OK</span>
                        @endif
                    </td>
					<td><a href="{{ asset('images/' . $row->bukti) }}" target="_BLANK"><img src="{{ asset('images/' . $row->bukti) }}" width="200"></a></td>
					<td>
						@if ($row->aktiv === 0 && $row->deleted_at === null)
							<a href="{{ route('aktiv.booking', $row->id) }}" class="btn btn-success btn-sm btn-block">Konfirmasi</a>
						@elseIf ($row->aktiv === 1 && $row->deleted_at === null) 
							<span class="badge badge-primary">AKTIF</span>
						@elseIf ($row->deleted_at !== null)
							<form id="form-hapus" action="{{ route('delete.booking', $row->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button id="btn-delete" type="submit" class="btn btn-danger btn-sm btn-block" style="width: 100%;">Hapus</button>
							</form>
						@endif
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
			$('#dataBooking').DataTable();
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