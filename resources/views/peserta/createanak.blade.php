@extends('layouts.master')
@section('title', 'Tambah Data Anak')
@section('js')
  <script>
    $("#pickumur").flatpickr({
      maxDate: new Date(),
      dateFormat: "d F Y"
    });
  </script>
@endsection
@section('content')
  <!--begin::Card header-->
  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
    data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
    <!--begin::Card title-->
    <div class="card-title m-0">
      <h3 class="fw-bold m-0">Tambah Data Anak</h3>
    </div>
    <!--end::Card title-->
  </div>
  <!--begin::Card header-->
  <!--begin::Content-->
  <div id="kt_account_settings_profile_details" class="collapse show">
    <!--begin::Form-->
    <form action="{{ $anak == null ? route('save.anak') : route('edit.anak', $anak->id) }}" class="form" method="POST" enctype="multipart/form-data">@csrf
      <!--begin::Card body-->
      <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Foto Anak</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-6 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  style="background-image: url('assets/media/svg/avatars/blank.svg')">
                  <!--begin::Preview existing avatar-->
                  <div class="image-input-wrapper w-125px h-125px"
                    style="background-image: url({{ $anak ? asset('avatar/' . $anak->foto) : asset('assets/media/svg/avatars/blank.svg') }})">
                  </div>
                  <!--end::Preview existing avatar-->
                  <!--begin::Label-->
                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                  </label>
                  <!--end::Label-->
                  <!--begin::Cancel-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                  </span>
                  <!--end::Cancel-->
                  <!--begin::Remove-->
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                  </span>
                  <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Tipe foto hanya: png, jpg, jpeg.</div>
                <!--end::Hint-->
              </div>
            </div>
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="nama" class="form-control form-control-lg form-control-solid"
              placeholder="Nama Lengkap" value="{{ $anak->nama ?? old('nama') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">
            <span class="">Data Kelahiran</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
              title="Data Kelahiran seperti akte atau surat tanda kelahiran"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="file" name="data_kelahiran" class="form-control form-control-lg form-control-solid"
              placeholder="Upload Data Kelahiran" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat Tanggal Lahir</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input name="tempat_lahir" value="{{ $anak->tempat_lahir ?? old('tempat_lahir') }}"
                  class="form-control form-control-solid" placeholder="Tempat Lahir Anda" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input name="tanggal_lahir" value="{{ $anak ? \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d F Y') : old('tanggal_lahir') }}"
                  class="form-control form-control-solid" placeholder="Pilih Tanggal Lahir Anda" id="pickumur" />
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Jenis Kelamin & Golongan Darah</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <select name="jenis_kelamin" aria-label="Pilih Jenis Kelamin" data-control="select2"
                  data-placeholder="Pilih Jenis Kelamin.." class="form-select form-select-solid form-select-lg">
                  <option selected disabled>Pilih Jenis Kelamin</option>
                  @foreach (config('matt.jenis_kelamin') as $key => $value)
                    @if (isset($anak->jenis_kelamin))
                      <option {{ $anak->jenis_kelamin == $key ? 'selected' : '' }} value="{{ $key }}">
                        {{ $value }}</option>
                    @else
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <div class="col-lg-6 fv-row">
                  <select name="darah" aria-label="Pilih Golongan Darah" data-control="select2"
                    data-placeholder="Pilih Golongan Darah.." class="form-select form-select-solid form-select-lg">
                    <option selected disabled>Pilih Golongan Darah</option>
                    @foreach (config('matt.darah') as $key => $value)
                      @if (isset($anak->darah))
                        <option {{ $anak->darah == $key ? 'selected' : '' }} value="{{ $key }}">
                          {{ $value }}</option>
                      @else
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Keterangan</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="keterangan" class="form-control form-control-lg form-control-solid"
              placeholder="Masukan Keterangan" value="{{ $anak->keterangan ?? old('keterangan') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Berat, Tinggi, Lingkar Kepala</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-4 fv-row">
                <input name="berat" value="{{ $anak->berat ?? old('berat') }}"
                  class="form-control form-control-solid" placeholder="Berat Badan" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-4 fv-row">
                <input name="tinggi" value="{{ $anak->tinggi ?? old('tinggi') }}"
                  class="form-control form-control-solid" placeholder="Masukan Tinggi Badan"/>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-4 fv-row">
                <input name="lingkar_kepala" value="{{ $anak->lingkar_kepala ?? old('lingkar_kepala') }}"
                  class="form-control form-control-solid" placeholder="Pilih Tanggal Lahir Anda" />
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
      </div>
      <!--end::Card body-->
      <!--begin::Actions-->
      <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
      </div>
      <!--end::Actions-->
    </form>
    <!--end::Form-->
  </div>
  <!--end::Content-->
@endsection
