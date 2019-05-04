@extends('landing.master')

@section('content')
<section style="margin-top: 95px">

    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Segera lakukan pembayaran uang muka ke nomor rekening pemilik kos!</strong> Tanggal pemesananmu tidak terbooking jika belum mengupload bukti pembayaran <br>
            <strong>Jika kamu sudah melakukan checkout dan membatalkan pemesanan!</strong> uang muka mu tidak dapat dikembalikan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="table table-bordered">
            @php $no = 1; @endphp
            <tr>
                <th>No</th>
                <th>Nama Pemilik Kos</th>
                <th>No. Rekening</th>
                <th>Nama Kos</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Uang Muka</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_pemilik }}</td>
                    <td>{{ $row->no_rek }}</td>
                    <td><a href="{{ route('detail', $row->id_kos) }}">{{ $row->nama_kos }}</a></td>
                    <td>{{ date('j F Y', strtotime($row->tgl_masuk)) }}</td>
                    <td>{{ date('j F Y', strtotime($row->tgl_keluar)) }}</td>
                    <td>Rp. {{ number_format($row->uang_muka, 0 , ' , ' ,  '.') }}</td>
                    <td>
                        @if ( $row->aktiv === 1 )
                            <span class="badge badge-success">Aktif</span>
                        @endif

                        @if ( $row->bukti === null )
                            <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#hubungi{{ $row->id_booking }}">Checkout</button>
                        @endif

                        @if ( $row->bukti !== null )
                            <form id="form-cancel" action="{{ route('pemesanan.hapus', $row->id_booking) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" id="btn-cancel" class="btn btn-danger btn-sm btn-block">Batal</button>
                            </form>
                        @else
                            <form id="form-cancel" action="{{ route('delete.permanen.booking', $row->id_booking) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" id="btn-cancel" class="btn btn-danger btn-sm btn-block">Batal</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- modal --}}
    @foreach ($checkout as $item)
        <div class="modal fade" id="hubungi{{ $item->id_booking }}" tabindex="-1" role="dialog" aria-labelledby="hubungiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hubungiLabel">Upload bukti pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @auth
                        <form id="hubungi" action="{{ route('pemesanan.pemesananCheckout', $item->id_booking) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="bukti" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
    @endforeach

</section>
@endsection

@section('script')
    <script>
        $("form#form-cancel").click('#btn-cancel', function (event) {
            
            event.preventDefault();	
            let href = $(this).attr('action');

            swal({
                title: "Kamu yakin?",
                text: "Tanggal booking mu akan terhapus!",
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