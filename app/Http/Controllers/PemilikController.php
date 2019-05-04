<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_kos;
use App\Models\Fasilitas;
use App\Models\Pemilik_kos;
use App\Models\Booking;
use App\Models\Pesan;
use App\Models\User;
use App\Models\Kos;
use Storage;
use Auth;
use DB;

class PemilikController extends Controller
{
    public function index ()
    {
        $pemilik_kos = Pemilik_kos::findOrFail(Auth::guard('pemilik-kos')->user()->id);
    	return view('pemilik.dashboard', compact('pemilik_kos'));
    }

    public function getKos ()
    {
        $jenis_kos = Jenis_kos::all();
    	$fasilitas_kos = Fasilitas::all();
    	return view('pemilik.tambahKost', compact('jenis_kos', 'fasilitas_kos'));
    }

    public function postKos (Request $request)
    {
        $valid = $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'alamat' => 'required',
            'kota' => 'required',
            'keterangan' => 'required',
            'foto' => 'required',
            'uang_muka' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $foto = $request->file('foto')->store('kos');
        
        $kos = Kos::create([
            'id_pemilik' => Auth::guard('pemilik-kos')->user()->id,
            'nama' => $request->nama,
            'id_jenis' => $request->jenis,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'uang_muka' => $request->uang_muka,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $kos->fasilitas()->attach($request->fasilitas);

        return redirect()->route('dash.pemilik')->with('success', 'Data kos berhasil ditambahkan');
    }

    public function detailKos ()
    {
        return view('pemilik.detail');
    }

    public function editkos ($id)
    {
        $kos = Kos::findOrFail($id);
        $jenis_kos = Jenis_kos::all();
        $fasilitas_kos = Fasilitas::all();
        $checked = $kos->fasilitas->toArray();

        return view('pemilik.editKost', compact('kos', 'jenis_kos', 'fasilitas_kos', 'checked'));
    }

    public function updateKos (Request $request, $id)
    {
        $valid = $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'alamat' => 'required',
            'kota' => 'required',
            'keterangan' => 'required',
            'latitude' => 'required',
            'uang_muka' => 'required|numeric',
            'longitude' => 'required',
        ]);

        $kos = Kos::findOrFail($id);

        if (empty($request->file('foto'))) {
            $foto = $kos->foto;
        }else{
            $foto = $request->file('foto')->store('kos');
            Storage::delete($kos->foto);
        }

        $kos->update([
            'nama' => $request->nama,
            'id_jenis' => $request->jenis,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'uang_muka' => $request->uang_muka,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $kos->fasilitas()->sync($request->fasilitas);

        return redirect()->route('dash.pemilik')->with('success', 'Data kos berhasil diedit');
    }

    public function deleteKos ($id)
    {
        $kos = Kos::findOrFail($id);
        
        Storage::delete($kos->foto);
        $kos->delete();

        return redirect()->back()->with('success', 'Data kos berhasil dihapus');
    }

    public function pesan ()
    {
        $login = Auth::guard('pemilik-kos')->user()->id;
        $all = DB::select( DB::raw("SELECT pesan.id, users.nama, users.email, kos.nama as namakos, pesan.subjek, pesan.created_at FROM pesan, kos, users, pemilik_kos WHERE pesan.user_id = users.id AND pesan.kos_id = kos.id AND pemilik_kos.id = ". $login ." AND pesan.id_pemilik = " . $login));
        
        return view('pemilik.pesan', compact('all'));
    }

    public function hapusPesan ($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->delete();

        return redirect()->back()->with('success', 'Data pesan berhasil dihapus');
    }

    public function hapusPesanAll (Request $request)
    {
        dd($request->arr);
    }

    public function booking ()
    {
        $login = Auth::guard('pemilik-kos')->user()->id;
        $all = DB::select( DB::raw("SELECT bookings.id as id, deleted_at, bookings.aktiv as aktiv, bookings.uang_muka as bukti, users.nama as namaUser, users.email as emailUser, kos.nama as namaKos, tgl_masuk, tgl_keluar FROM bookings, users, kos, pemilik_kos WHERE bookings.id_user = users.id AND bookings.id_kos = kos.id AND pemilik_kos.id = $login AND bookings.uang_muka IS NOT NULL  "));
        
        return view('pemilik.booking', compact('all'));
    }

    public function aktivBooking ($id)
    {
        $kos = Booking::findOrFail($id);

        if ($kos->aktiv == 0) {
            $aktif = 1;
        }else{
            $aktif = 0;
        }

        $kos->update([
            'aktiv' => $aktif
        ]);

        return redirect()->back();
    }

    public function hapusBooking ($id)
    {
        $kos = Booking::withTrashed()->findOrFail($id);
        
        $old = $kos->uang_muka;
        Storage::delete($old);

        Booking::onlyTrashed()->where('id', $id)->forceDelete();

        return redirect()->back()->with('success', 'Data booking berhasil dihapus');
    }
}
