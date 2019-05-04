@extends('pemilik.master')

@section('content')
<div class="row mt-3">
    @foreach ($pemilik_kos->kos as $kos)
        <div class="col-md-4">
            <div class="recent_item">
                <div class="recent_item_inner">
                    <div class="recent_item_image">
                        <img src="{{ asset('images/' . $kos->foto) }}" alt="">
                    </div>
                    <div class="recent_item_body text-center">
                        <div class="recent_item_location">{{ $kos->kota }}</div>
                        <div class="recent_item_title">{{ $kos->nama }}</div>
                        <div class="recent_item_price">Rp. {{ number_format($kos->harga, 0 , ' , ' ,  '.') }}</div>
                    </div>
                    <div class="recent_item_footer d-flex flex-row align-items-center justify-content-start">
                        <a href="" class="btn btn-info" style="width: 32%" data-toggle="modal" data-target="#detail{{ $kos->id }}">Lihat</a>
                        <a href="{{ route('get.edit.kos', $kos->id) }}" class="btn btn-success" style="width: 32%">Edit</a>
                        <form id="form-hapus" action="{{ route('delete.kos', $kos->id) }}" method="POST" style="width: 32%; display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button id="btn-delete" type="submit" class="btn btn-danger" style="width: 100%;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal -->
@foreach ($pemilik_kos->kos as $kos)
    <div class="modal fade" id="detail{{ $kos->id }}" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailLabel">Detail Kos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nama kos</th>
                                <th scope="col">Harga (bulan)</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $kos->nama }}</td>
                                <td>Rp. {{ number_format($kos->harga, 0 , ' , ' ,  '.') }}</td>
                                <td>{{ $kos->alamat }}</td>
                                <td>{{ $kos->kota }}</td>
                                <td>{{ $kos->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
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