<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik_kos;
use App\Models\User;

class AdminController extends Controller
{
    public function index ()
    {
    	$data = Pemilik_kos::orderBy('id', 'desc')->get();
    	return view('admin.permintaan', compact('data'));
    }

    public function permintaan ()
    {
    	$data = Pemilik_kos::orderBy('id', 'desc')->get();
    	return view('admin.permintaan', compact('data'));
    }

    public function users ()
    {
    	$data = User::orderBy('id', 'desc')->get();
    	return view('admin.daftarUser', compact('data'));
    }

    public function aktifasi ($id)
    {
        $data = Pemilik_kos::findOrFail($id);

        if ($data->aktif == 0) {
            $aktif = 1;
        }else{
            $aktif = 0;
        }

        $data->update([
            'aktif' => $aktif
        ]);

        return redirect()->back();
    }

    public function hapusUser ($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->back();
    }
}
