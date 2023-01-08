@extends('auth.masterauth')
@section('title', 'Daftar Baru')
@section('js')
  <script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
@endsection
@section('content')
  <!--begin::Authentication - Sign-up -->
  <div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
      <!--begin::Content-->
      <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
        <!--begin::Image-->
        <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency.png"
          alt="" />
        <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
          src="assets/media/auth/agency-dark.png" alt="" />
        <!--end::Image-->
        <!--begin::Title-->
        <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
        <!--end::Title-->
        <!--begin::Text-->
        <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,
          <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve
          interviewed
          <br />and provides some background information about
          <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
          <br />work following this is a transcript of the interview.
        </div>
        <!--end::Text-->
      </div>
      <!--end::Content-->
    </div>
    <!--begin::Aside-->
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
      <!--begin::Wrapper-->
      <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
        <!--begin::Content-->
        <div class="w-md-400px">
          <!--begin::Form-->
          <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"
            data-kt-redirect-url="{{ route('register') }}" action="{{ route('register') }}">@csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
              <!--begin::Title-->
              <h1 class="text-dark fw-bolder mb-3">Daftar Baru</h1>
              <!--end::Title-->
              <!--begin::Subtitle-->
              <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
              <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Name-->
              <input type="text" placeholder="Nama" name="name" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Name-->
            </div>
            <!--begin::Input group-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Email-->
              <input type="text" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Email-->
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-8" data-kt-password-meter="true">
              <!--begin::Wrapper-->
              <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                  <input class="form-control bg-transparent" type="password" placeholder="Password" name="password"
                    autocomplete="off" />
                  <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                    data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                  </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
              </div>
              <!--end::Wrapper-->
              <!--begin::Hint-->
              <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
              <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Repeat Password-->
              <input placeholder="Konfirmasi Password" name="password_confirmation" type="password" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Repeat Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Accept-->
            <div class="fv-row mb-8">
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
                  <a href="#" class="ms-1 link-primary">Terms</a></span>
              </label>
            </div>
            <!--end::Accept-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
              <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Sign up</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
              </button>
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
              <a href="{{ route('login') }}"
                class="link-primary fw-semibold">Sign in</a>
            </div>
            <!--end::Sign up-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Content-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Body-->
  </div>
  <!--end::Authentication - Sign-up-->
@endsection
