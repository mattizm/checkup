<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Pertumbuhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AnakController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role:1', ['only' => ['user', 'createuser', 'saveuser', 'edituser', 'updateuser']]);
  }

  public function anak()
  {
    $childs = Anak::all();
    return view('data.dataanak', compact('childs'));
  }

  public function lihatanak($id)
  {
    $childs = Anak::where('user_id', $id)->get();
    return view('data.dataanak', compact('childs'));
  }

  public function createanak()
  {
    $anak = null;
    return view('peserta.createanak', compact('anak'));
  }

  public function editanak($id)
  {
    $anak = Anak::findOrFail($id);
    if ($anak->user_id != Auth::id()) {
      abort('403');
    }
    return view('peserta.createanak', compact('anak'));
  }

  public function saveanak(Request $request)
  {
    $request->validate([
      'avatar'         => 'nullable|image|mimes:png,jpg|max:400',
      'data_kelahiran' => 'nullable|max:400',
      'nama'           => 'required|string',
      'tempat_lahir'   => 'required|string',
      'tanggal_lahir'  => 'required|date',
      'jenis_kelamin'  => 'required',
      'tinggi'         => 'required|string',
      'berat'          => 'required|string',
      'darah'          => 'nullable',
      'lingkar_kepala' => 'nullable|string',
      'keterangan'     => 'nullable|string',
    ]);

    $anak                = New Anak;
    $anak->user_id       = Auth::id();
    $anak->nama          = Str::title($request->nama);
    $anak->tempat_lahir  = $request->tempat_lahir;
    $anak->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
    $anak->jenis_kelamin = $request->jenis_kelamin;
    $anak->darah         = $request->darah;
    $anak->keterangan    = $request->keterangan;

    if ($request->hasFile('avatar')) {
      $anak == null ? false : File::delete('avatar/' . $anak->profile_photo_path);
      $img = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $anak->profile_photo_path = $nama;
    }

    if ($request->hasFile('data_kelahiran')) {
      $anak == null ? false : File::delete('data_kelahiran/' . $anak->data_kelahiran);
      $img = $request->data_kelahiran;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('data_kelahiran/', $nama);
      $anak->data_kelahiran = $nama;
    }

    $anak->save();

    $pertumbuhan                 = New Pertumbuhan;
    $pertumbuhan->anak_id        = $anak->id;
    $pertumbuhan->umur           = Carbon::parse($anak->tanggal_lahir)->age;
    $pertumbuhan->tinggi         = $request->tinggi;
    $pertumbuhan->berat          = $request->berat;
    $pertumbuhan->lingkar_kepala = $request->lingkar_kepala;
    $pertumbuhan->save();

    return redirect()->back()->with('success', 'Data Berhasil di Tambahkan');
  }
}
