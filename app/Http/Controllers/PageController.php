<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik_kos;
use App\Models\Jenis_kos;
use App\Models\Booking;
use App\Models\Pesan;
use App\Models\Kota;
use App\Models\Kos;
use Auth;
use DB;

class PageController extends Controller
{
    public function search (Request $request)
    {
        $q = $request->get('cari');
        $jenis = $request->get('jenis');
        $min = $request->get('min');
        $max = $request->get('max');

        if ( empty($min) ) {
            $min = 0;
        }

        if ( empty($max) ) {
            $max = 10000000;
        }

        if (!empty($jenis) || !empty($min) || !empty($max)) {
            if (!empty($jenis)) {
                $sql = "AND id_jenis = $jenis";
            }else{
                $sql = "";
            }
            $kos = DB::select( DB::raw("SELECT * FROM kos WHERE kota LIKE '%$q%' " . $sql . " AND harga BETWEEN $min AND $max "));
        }else{
            $kos = Kos::where('kota', "LIKE", "%$q%")->get();
        }

        $jenis_kos = Jenis_kos::all();

    	return view('page.search', compact('kos', 'jenis_kos'));
    }

    public function detail ($id)
    {
        $kos = Kos::findOrFail($id);
        $booking = DB::select( DB::raw("SELECT * FROM bookings, kos WHERE bookings.id_kos = kos.id AND kos.id = $kos->id AND bookings.aktiv = 1 AND bookings.deleted_at IS NULL "));

        return view('page.detail', compact('kos', 'booking'));
    }

    public function pesan (Request $request, $id)
    {
        $valid = $this->validate($request, [
            'subjek' => 'required'
        ]);

        Pesan::create([
            'user_id' => Auth::user()->id,
            'kos_id' => $id,
            'id_pemilik' => $request->pemilik,
            'subjek' => $request->subjek,
        ]);

        return redirect()->back();
    }

    public function booking (Request $request, $id)
    {
        $login = Auth::user()->id;
        $cek = DB::select( DB::raw("SELECT * FROM bookings WHERE bookings.id_user = $login AND bookings.id_kos = $id "));
        
        if (count($cek) > 0) {
            return false;
        }

        Booking::create([
            'id_user' => $login,
            'id_kos' => $id,
            'tgl_masuk' => $request->awal,
            'tgl_keluar' => $request->akhir,
        ]);

        return redirect()->back();
    }

    public function pemesanan ($id)
    {
        $login = Auth::user()->id;
        $data = DB::select( DB::raw("SELECT *, bookings.id as id_booking, bookings.uang_muka as bukti, pemilik_kos.nama as nama_pemilik, kos.nama as nama_kos FROM bookings, pemilik_kos, kos, users WHERE kos.id_pemilik = pemilik_kos.id AND bookings.id_kos = kos.id AND deleted_at IS NULL AND bookings.id_user = $login AND users.id = $login "));
        $checkout = DB::select( DB::raw("SELECT bookings.id as id_booking FROM bookings WHERE deleted_at IS NULL "));
        
        return view('page.pemesanan', compact('data', 'checkout'));
    }

    public function pemesananCheckout (Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        $bukti = $request->file("bukti")->store("bukti_pembayaran");

        $booking->update([
            "uang_muka" => $bukti,
        ]);

        return redirect()->back()->with('success', 'Silahkan tunggu konfirmasi dari pemilik kos');
    }

    public function hapusBooking ($id)
    {
        $kos = Booking::findOrFail($id);
        $kos->delete();

        return redirect()->back()->with('success', 'Data booking berhasil dihapus');
    }

    public function hapusPermanenBooking ($id)
    {
        Booking::withTrashed()->where('id', $id)->forceDelete();

        return redirect()->back()->with('success', 'Data booking berhasil dihapus');
    }

    public function auto (Request $request)
    {
    	$qe = $request->get('query');
        $data = Kota::where('name', 'LIKE', "%$qe%")->get();

        if ($data != "") {
            $output = '<ul class="dropdown-menu rpl-dropdown" style="width: 98%; top: -5px; left: 15px; border-top-color: transparent; border-radius: 0">';

            foreach ($data as $row){
                $output .= '<li class="rpl-dropdown-item"><a href="#" class="dropdown-item" data-id="'. $row['id'] .'">'. $row->name .'</a></li>';
            }

            $output .= "</ul>";
            echo $output;
        }
    }
}
