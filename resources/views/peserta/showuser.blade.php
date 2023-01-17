@extends('layouts.master')
@section('title', 'Biodata Peserta')
@section('content')
  <!--begin::Card header-->
  <div class="card-header cursor-pointer">
    <!--begin::Card title-->
    <div class="card-title m-0">
      <h3 class="fw-bold m-0">Profile Details</h3>
    </div>
    <!--end::Card title-->
    <!--begin::Action-->
    <a href="{{ route('edit.user', $user->id) }}" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
    <!--end::Action-->
  </div>
  <!--begin::Card header-->
  <!--begin::Card body-->
  <div class="card-body p-9">
    <!--begin::Row-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Foto</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <div class="image-input-wrapper w-125px h-125px"
          style="background-image: url({{ $user->profile_photo_path ? asset('avatar/' . $user->profile_photo_path) : asset('assets/media/svg/avatars/blank.svg') }})">
        </div>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Nama Lengkap</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <span class="fw-bold fs-6 text-gray-800">{{ $user->name ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">ID KTP</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">{{ $user->id_ktp ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">ID KK</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">{{ $user->id_kk ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Jumlah Balita</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">{{ $user->balita ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Jumlah Pendapatan</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">{{ $user->pendapatan ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Pendidikan</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">
          @if ($user->pendidikan)
            @foreach (config('matt.pendidikan') as $key => $value)
              @if ($user->pendidikan == $key)
                {{ $value }}
              @endif
            @endforeach
          @else
            -
          @endif
        </span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Pekerjaan</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 fv-row">
        <span class="fw-semibold text-gray-800 fs-6">
          @if ($user->pekerjaan)
            @foreach (config('matt.pekerjaan') as $key => $value)
              @if ($user->pekerjaan == $key)
                {{ $value }}
              @endif
            @endforeach
          @else
            -
          @endif
        </span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">HP
        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
          title="Phone number must be active"></i></label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8 d-flex align-items-center">
        <span class="fw-bold fs-6 text-gray-800 me-2">{{ $user->no_hp ?? '-' }}</span>
        <span class="badge badge-success">Verified</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Email</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <p href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $user->email ?? '-' }}</p>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Alamat
        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
          title="Country of origination"></i></label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <span class="fw-bold fs-6 text-gray-800">{{ $user->alamat ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Tempat, tanggal lahir</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <span
          class="fw-bold fs-6 text-gray-800">{{ $user->tempat_lahir . ' ' . \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y') }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
      <!--begin::Label-->
      <label class="col-lg-4 fw-semibold text-muted">Keterangan</label>
      <!--end::Label-->
      <!--begin::Col-->
      <div class="col-lg-8">
        <span class="fw-bold fs-6 text-gray-800">{{ $user->keterangan ?? '-' }}</span>
      </div>
      <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Notice-->
    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
      <!--begin::Icon-->
      <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
      <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
            fill="currentColor" />
          <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
            fill="currentColor" />
          <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
            fill="currentColor" />
        </svg>
      </span>
      <!--end::Svg Icon-->
      <!--end::Icon-->
      <!--begin::Wrapper-->
      <div class="d-flex flex-stack flex-grow-1">
        <!--begin::Content-->
        <div class="fw-semibold">
          <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
          <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
            <a class="fw-bold" href="../../demo30/dist/account/billing.html">Add Payment Method</a>.
          </div>
        </div>
        <!--end::Content-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Notice-->
  </div>
  <!--end::Card body-->
@endsection
