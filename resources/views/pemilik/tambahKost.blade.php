@extends('pemilik.master')

@section('content')
<div class="row mt-3 ml-auto mr-auto">
    <div class="card rpl-card">
        <div class="card-header">
            Tambah Kos
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="ml-3">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <form action="{{ route('post.kos') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Kos kosanmu</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Kos" value="{{ old('nama') }}">
                </div>

                <div class="form-group">
                    <label for="jenis">Untuk siapa kosanmu</label>
                    <select name="jenis" class="form-control">
                        @foreach ($jenis_kos as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <label for="fasilitas">Fasilitas kosanmu</label> <br>
                    @foreach ($fasilitas_kos as $fasilitas)
                        <label class="form-check-label mr-3"><input class="form-check-input" name="fasilitas[]" type="checkbox" value="{{ $fasilitas->id }}">{{ $fasilitas->nama }}</label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="harga">Harga kosanmu (Bulan)</label>
                    <input name="harga" type="number" class="form-control" id="harga" placeholder="Harga Kos (Bulan)" value="{{ old('harga') }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat kosanmu</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat Kos" style="resize: none;">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="kota">Kota kosanmu</label>
                    <input name="kota" type="text" class="form-control" id="kota" placeholder="Kota Kos" value="{{ old('kota') }}">
                </div>

                <div class="form-group">
                    <label for="keterangan">Deskripsi</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Deskripsi Kos" style="resize: none;">{{ old('keterangan') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="uang_muka">Uang Muka</label>
                    <input name="uang_muka" type="number" class="form-control" id="uang_muka" placeholder="Uang Muka" value="{{ old('uang_muka') }}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" class="form-control" id="foto" placeholder="Foto Kos" style="resize: none;">{{ old('foto') }}
                </div>

                <div class="form-group">
                    <div><label for="lokasi">Lokasi</label></div>
                    <div class="col-md-6 mb-3" style="padding: 0;">
                        <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude" value="{{ old('latitude') }}">
                    </div>

                    <div class="col-md-6" style="padding: 0">
                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Longitude" value="{{ old('longitude') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection