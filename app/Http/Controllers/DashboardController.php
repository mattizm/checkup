<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function dashboard()
  {
    return view('dashboard');
  }

  public function biodata()
  {
    return view('peserta.biodata');
  }

  public function about()
  {
    return view('layouts.about');
  }

  public function faq()
  {
    return view('layouts.faq');
  }

  public function kontak()
  {
    return view('layouts.kontak');
  }

  public function listpeserta()
  {
    return view('listpeserta.listpeserta');
  }

  public function wizard()
  {
    return view('wizard');
  }

  public function admin()
  {
    return view('admin.admin');
  }
}
