<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role:1', ['only' => ['user', 'createuser', 'saveuser', 'edituser', 'updateuser']]);
  }

  public function client()
  {
    $user = null;
    return view('peserta.profilclient', compact('user'));
  }

  public function editclient(User $user)
  {
    $user = $user->find(Auth::id());
    return view('peserta.profilclient', compact('user'));
  }

  public function updateclient(Request $request, User $user)
  {
    $request->validate([
      'avatar'        => 'nullable|image|mimes:png,jpg|max:400',
      'ktp'           => 'required|image|mimes:png,jpg|max:400',
      'name'          => 'required|string',
      'email'         => 'required|email',
      'password'      => 'required|confirmed',
      'id_ktp'        => 'required|numeric|unique:users,id_ktp,' . Auth::id() . '',
      'id_kk'         => 'required|numeric|unique:users,id_kk,' . Auth::id() . '',
      'no_hp'         => 'required|numeric',
      'alamat'        => 'required|string',
      'tempat_lahir'  => 'required|string',
      'tanggal_lahir' => 'required|date',
      'balita'        => 'nullable|numeric',
      'pendapatan'    => 'nullable|string',
      'pendidikan'    => 'nullable|string',
      'pekerjaan'     => 'nullable|string',
      'keterangan'    => 'nullable|string',
    ]);

    $user                = $user->find(Auth::id());
    $user->status        = 3;
    $user->name          = Str::title($request->name);
    $user->email         = $request->email;
    $user->password      = Hash::make($request->password);
    $user->id_ktp        = $request->id_ktp;
    $user->id_kk         = $request->id_kk;
    $user->no_hp         = $request->no_hp;
    $user->alamat        = $request->alamat;
    $user->tempat_lahir  = $request->tempat_lahir;
    $user->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
    $user->balita        = $request->balita;
    $user->pendapatan    = $request->pendapatan;
    $user->pendidikan    = $request->pendidikan;
    $user->pekerjaan     = $request->pekerjaan;
    $user->keterangan    = $request->keterangan;

    if ($request->hasFile('avatar')) {
      $user == null ? false : File::delete('avatar/' . $user->profile_photo_path);
      $img = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $user->profile_photo_path = $nama;
    }

    if ($request->hasFile('ktp')) {
      $user == null ? false : File::delete('ktp/' . $user->ktp);
      $img = $request->ktp;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('ktp/', $nama);
      $user->ktp = $nama;
    }

    $user->update();

    return redirect()
      ->back()
      ->with('success', 'Data Berhasil di Perbaharui');
  }

  // ---------------------ADMIN AREA --------------------- //
  public function user()
  {
    $user = null;
    return view('peserta.profiladmin', compact('user'));
  }

  public function createuser()
  {
    $user = null;
    return view('peserta.profiladmin', compact('user'));
  }

  public function edituser(User $user, $id)
  {
    $user = $user->find($id);
    return view('peserta.profiladmin', compact('user'));
  }

  public function saveuser(Request $request, User $user)
  {
    $request->validate([
      'avatar'        => 'nullable|image|mimes:png,jpg|max:400',
      'ktp'           => 'required|image|mimes:png,jpg|max:400',
      'name'          => 'required|string',
      'email'         => 'required|email',
      'password'      => 'required|confirmed',
      'id_ktp'        => 'required|numeric|unique:users,id_ktp',
      'id_kk'         => 'required|numeric|unique:users,id_kk',
      'no_hp'         => 'required|numeric',
      'alamat'        => 'required|string',
      'tempat_lahir'  => 'required|string',
      'tanggal_lahir' => 'required|date',
      'balita'        => 'nullable|numeric',
      'pendapatan'    => 'nullable|string',
      'pendidikan'    => 'nullable|string',
      'pekerjaan'     => 'nullable|string',
      'keterangan'    => 'nullable|string',
    ]);
    $user                    = new $user();
    $user->status            = 3;
    $user->name              = Str::title($request->name);
    $user->email             = $request->email;
    $user->password          = Hash::make($request->password);
    $user->id_ktp            = $request->id_ktp;
    $user->id_kk             = $request->id_kk;
    $user->no_hp             = $request->no_hp;
    $user->alamat            = $request->alamat;
    $user->tempat_lahir      = $request->tempat_lahir;
    $user->tanggal_lahir     = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
    $user->balita            = $request->balita;
    $user->pendapatan        = $request->pendapatan;
    $user->pendidikan        = $request->pendidikan;
    $user->pekerjaan         = $request->pekerjaan;
    $user->keterangan        = $request->keterangan;
    $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');

    if ($request->hasFile('avatar')) {
      $img = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $user->profile_photo_path = $nama;
    }

    if ($request->hasFile('ktp')) {
      $img = $request->ktp;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('ktp/', $nama);
      $user->ktp = $nama;
    }

    $user->save();

    return redirect()
      ->back()
      ->with('success', 'Data Berhasil di Simpan');
  }

  public function updateuser(Request $request, User $user, $id)
  {
    $request->validate([
      'avatar'        => 'nullable|image|mimes:png,jpg|max:400',
      'ktp'           => 'required|image|mimes:png,jpg|max:400',
      'name'          => 'required|string',
      'email'         => 'required|email',
      'password'      => 'required|confirmed',
      'id_ktp'        => 'required|numeric|unique:users,id_ktp,' . $user->id . '',
      'id_kk'         => 'required|numeric|unique:users,id_kk,' . $user->id . '',
      'no_hp'         => 'required|numeric',
      'alamat'        => 'required|string',
      'tempat_lahir'  => 'required|string',
      'tanggal_lahir' => 'required|date',
      'balita'        => 'nullable|numeric',
      'pendapatan'    => 'nullable|string',
      'pendidikan'    => 'nullable|string',
      'pekerjaan'     => 'nullable|string',
      'keterangan'    => 'nullable|string',
    ]);

    $user                = $user->find($id);
    $user->name          = Str::title($request->name);
    $user->email         = $request->email;
    $user->password      = Hash::make($request->password);
    $user->id_ktp        = $request->id_ktp;
    $user->id_kk         = $request->id_kk;
    $user->no_hp         = $request->no_hp;
    $user->alamat        = $request->alamat;
    $user->tempat_lahir  = $request->tempat_lahir;
    $user->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
    $user->balita        = $request->balita;
    $user->pendapatan    = $request->pendapatan;
    $user->pendidikan    = $request->pendidikan;
    $user->pekerjaan     = $request->pekerjaan;
    $user->keterangan    = $request->keterangan;

    if ($request->hasFile('avatar')) {
      $user == null ? false : File::delete('avatar/' . $user->profile_photo_path);
      $img = $request->avatar;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('avatar/', $nama);
      $user->profile_photo_path = $nama;
    }

    if ($request->hasFile('ktp')) {
      $user == null ? false : File::delete('ktp/' . $user->ktp);
      $img = $request->ktp;
      $nama = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move('ktp/', $nama);
      $user->ktp = $nama;
    }

    $user->update();

    return redirect()
      ->back()
      ->with('success', 'Data Berhasil di Perbaharui');
  }
}
