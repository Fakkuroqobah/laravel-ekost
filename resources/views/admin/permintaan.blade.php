@extends('admin.master')

@section('content')
	
	<table class="table table-bordered" id="dataPermintaan" style="background-color: #fff">
	  	<thead>
		    <tr>
			    <th scope="col">No</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Email</th>
			    <th scope="col">Alamat</th>
			    <th scope="col">Nomor Telp</th>
			    <th scope="col">Aktif</th>
			    <th scope="col">Tanggal</th>
			    <th scope="col">Konfirmasi</th>
		    </tr>
	  	</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($data as $row)
			    <tr>
			      	<th scope="row">{{ $no++ }}</th>
			      	<td>{{ $row->nama }}</td>
			      	<td>{{ $row->email }}</td>
			      	<td>{{ $row->alamat }}</td>
			      	<td>{{ $row->no_telp }}</td>
			      	<td>
						@if ($row->aktif == 0)
							<span class="badge badge-danger">Belum aktif</span>
						@else
							<span class="badge badge-success">Sudah aktif</span>
						@endIf
					</td>
					<td>{{ $row->created_at }}</td>
					<td>
						@if ($row->aktif == 0)
							<a href="{{ route('aktifasi', $row->id) }}" class="btn btn-sm btn-success">Aktifasi</a>
						@else
							<a href="{{ route('aktifasi', $row->id) }}" class="btn btn-sm btn-danger">Nonaktifkan</a>
						@endIf
					</td>
			    </tr>
		    @endforeach
		</tbody>
	</table>

@endsection

@section('script')
	<script>
		$(document).ready(function() {
			$('#dataPermintaan').DataTable();
		});
	</script>
@endsection