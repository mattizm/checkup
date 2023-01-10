@extends('layouts.master')
@section('title', 'Biodata Peserta')
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
      <h3 class="fw-bold m-0">Biodata Peserta</h3>
    </div>
    <!--end::Card title-->
  </div>
  <!--begin::Card header-->
  <!--begin::Content-->
  <div id="kt_account_settings_profile_details" class="collapse show">
    <!--begin::Form-->
    <form action="{{ route('update.client') }}" class="form" method="POST" enctype="multipart/form-data">@csrf
      <!--begin::Card body-->
      <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Upload Foto & KTP</label>
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
                    style="background-image: url({{ $user->profile_photo_path ? asset('avatar/' . $user->profile_photo_path) : asset('assets/media/svg/avatars/blank.svg') }})">
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
              <div class="col-lg-6 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  style="background-image: url('assets/media/svg/avatars/blank.svg')">
                  <!--begin::Preview existing avatar-->
                  <div class="image-input-wrapper w-125px h-125px"
                    style="background-image: url({{ $user->ktp ? asset('ktp/' . $user->ktp) : asset('assets/media/svg/avatars/blank.svg') }})">
                  </div>
                  <!--end::Preview existing avatar-->
                  <!--begin::Label-->
                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change ktp">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="ktp" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="ktp_remove" />
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
                <div class="form-text text-danger required">Tipe KTP hanya: png, jpg, jpeg.</div>
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
            <input type="text" name="name" class="form-control form-control-lg form-control-solid"
              placeholder="Nama Lengkap" value="{{ $user->name ?? old('name') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nomor Identitas</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input type="text" name="id_ktp" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  placeholder="Nomor KTP" value="{{ $user->id_ktp ?? old('id_ktp') }}" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input type="text" name="id_kk" class="form-control form-control-lg form-control-solid"
                  placeholder="Nomor KK" value="{{ $user->id_kk ?? old('id_kk') }}" />
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
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="alamat" class="form-control form-control-lg form-control-solid"
              placeholder="Masukan Alamat" value="{{ $user->alamat ?? old('alamat') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="email" class="form-control form-control-lg form-control-solid"
              placeholder="Masukan Email" value="{{ $user->email ?? old('email') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">
            <span class="required">Nomor HP</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
              title="Nomor Telpon Harus Aktif"></i>
          </label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="tel" name="no_hp" class="form-control form-control-lg form-control-solid"
              placeholder="Masukan Nomor HP" value="{{ $user->no_hp ?? old('no_hp') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lainya</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-5 fv-row">
                <input name="tempat_lahir" value="{{ $user->tempat_lahir ?? old('tempat_lahir') }}"
                  class="form-control form-control-solid" placeholder="Tempat Lahir Anda" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-4 fv-row">
                <input name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y') ?? old('tanggal_lahir') }}"
                  class="form-control form-control-solid" placeholder="Pilih Tanggal Lahir Anda" id="pickumur" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-3 fv-row">
                <input type="text" name="balita" class="form-control form-control-lg form-control-solid"
                  placeholder="Jumlah Balita" value="{{ $user->balita ?? old('balita') }}" />
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
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Pendapatan</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8 fv-row">
            <input type="text" name="pendapatan" class="form-control form-control-lg form-control-solid"
              placeholder="Pendapatan keluarga selama sebulan" value="{{ $user->pendapatan ?? old('pendapatan') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Pendidikan & Pekerjaan</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <select name="pendidikan" aria-label="Pilih Pendidikan" data-control="select2"
                  data-placeholder="Pilih Pendidikan.." class="form-select form-select-solid form-select-lg">
                  <option selected disabled>Pilih Pendidikan</option>
                  @foreach (config('matt.pendidikan') as $key => $value)
                    @if (isset($user->pendidikan))
                      <option {{ $user->pendidikan == $key ? 'selected' : '' }} value="{{ $key }}">
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
                  <select name="pekerjaan" aria-label="Pilih Pekerjaan" data-control="select2"
                    data-placeholder="Pilih Pekerjaan.." class="form-select form-select-solid form-select-lg">
                    <option selected disabled>Pilih pekerjaan</option>
                    @foreach (config('matt.pekerjaan') as $key => $value)
                      @if (isset($user->pekerjaan))
                        <option {{ $user->pekerjaan == $key ? 'selected' : '' }} value="{{ $key }}">
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
              placeholder="Masukan Keterangan" value="{{ $user->keterangan ?? old('keterangan') }}" />
          </div>
          <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
          <!--begin::Label-->
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
          <!--end::Label-->
          <!--begin::Col-->
          <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input type="password" name="password"
                  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Password" />
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-lg-6 fv-row">
                <input type="password" name="password_confirmation"
                  class="form-control form-control-lg form-control-solid" placeholder="Konfirmasi Password" />
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
