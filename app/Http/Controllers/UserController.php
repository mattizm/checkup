<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware('role:1');
  // }

  public function createuser()
  {
    $user = null;
    return view('peserta.biodata', compact('user'));
  }

  public function edituser()
  {
    $user = null;
    return view('peserta.biodata', compact('user'));
  }

  public function saveuser(Request $request, User $user)
  {
    $request->validate([
      'avatar'        => 'nullable|image|mimes:png,jpg|max:400',
      'name'          => 'required|string',
      'email'         => 'required|email',
      'password'      => 'required|confirmed',
      'id_ktp'        => 'required|numeric|unique:users,id_ktp',
      'id_kk'         => 'required|numeric|unique:users,id_kk',
      'no_hp'         => 'required|numeric',
      'alamat'        => 'required|string',
      'tanggal_lahir' => 'nullable|date',
      'balita'        => 'nullable|numeric',
      'pendapatan'    => 'nullable|string',
      'pendidikan'    => 'nullable|string',
      'pekerjaan'     => 'nullable|string',
      'keterangan'    => 'nullable|string',
    ]);
    $user = New $user;
    $user->name              = $request->name;
    $user->email             = $request->email;
    $user->password          = $request->password;
    $user->id_ktp            = $request->id_ktp;
    $user->id_kk             = $request->id_kk;
    $user->no_hp             = $request->no_hp;
    $user->alamat            = $request->alamat;
    $user->tanggal_lahir     = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
    $user->balita            = $request->balita;
    $user->pendapatan        = $request->pendapatan;
    $user->pendidikan        = $request->pendidikan;
    $user->pekerjaan         = $request->pekerjaan;
    $user->keterangan        = $request->keterangan;
    $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');

    if ($request->hasFile('avatar')) {
      $img  = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $user->profile_photo_path = $nama;
    }

    //   $user->save();

    return redirect()->back()->with('success', 'Data Berhasil di Simpan');
  }

  public function updateuser(Request $request, User $user)
  {
    $user = $user->find(Auth::id());

    $request->validate([
      'avatar'        => 'nullable|image|mimes:png,jpg|max:400',
      'name'          => 'required|string',
      'email'         => 'required|email',
      'password'      => 'required|confirmed',
      'id_ktp'        => 'required|numeric|unique:users,id_ktp,' . $user->id . '',
      'id_kk'         => 'required|numeric|unique:users,id_kk,' . $user->id . '',
      'no_hp'         => 'required|numeric',
      'alamat'        => 'required|string',
      'tanggal_lahir' => 'nullable|date',
      'balita'        => 'nullable|numeric',
      'pendapatan'    => 'nullable|string',
      'pendidikan'    => 'nullable|string',
      'pekerjaan'     => 'nullable|string',
      'keterangan'    => 'nullable|string',
    ]);

    $user->name          = $request->name;
    $user->email         = $request->email;
    $user->password      = $request->password;
    $user->id_ktp        = $request->id_ktp;
    $user->id_kk         = $request->id_kk;
    $user->no_hp         = $request->no_hp;
    $user->alamat        = $request->alamat;
    $user->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');;
    $user->balita        = $request->balita;
    $user->pendapatan    = $request->pendapatan;
    $user->pendidikan    = $request->pendidikan;
    $user->pekerjaan     = $request->pekerjaan;
    $user->keterangan    = $request->keterangan;

    if ($request->hasFile('avatar')) {
      $user == null ? false : File::delete('avatar/' . $user->profile_photo_path);
      $img  = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $user->profile_photo_path = $nama;
    }

    //   $user->update();

    return redirect()->back()->with('success', 'Data Berhasil di Perbaharui');
  }
}
