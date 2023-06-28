@extends('admin.master')

@section('content')
	
	<table class="table table-bordered" id="dataUser" style="background-color: #fff">
	  	<thead>
		    <tr>
			    <th scope="col">No</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Email</th>
			    <th scope="col">Jenis Kelamin</th>
			    <th scope="col">Alamat</th>
			    <th scope="col">Nomor Telp</th>
			    <th scope="col">Tanggal</th>
			    <th scope="col">Aksi</th>
		    </tr>
	  	</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($data as $row)
			    <tr>
			      	<th scope="row">{{ $no++ }}</th>
			      	<td>{{ $row->nama }}</td>
			      	<td>{{ $row->email }}</td>
			      	<td>{{ $row->jenis_kelamin }}</td>
			      	<td>{{ $row->alamat }}</td>
			      	<td>{{ $row->no_telp }}</td>
					<td>{{ $row->created_at }}</td>
					<td>
						<form id="form-hapus" action="{{ route('delete.user', $row->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button id="btn-delete" type="submit" class="btn btn-danger" style="width: 100%;">Hapus</button>
						</form>
					</td>
			    </tr>
		    @endforeach
		</tbody>
	</table>

@endsection

@section('script')
	<script>
		$(document).ready(function() {
			$('#dataUser').DataTable();
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