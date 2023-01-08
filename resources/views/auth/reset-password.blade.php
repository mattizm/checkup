@extends('auth.masterauth')
@section('title', 'Reset Password')
@section('content')
  <!--begin::Authentication - New password -->
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
          <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('password.update') }}">@csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
              <!--begin::Title-->
              <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
                <a href="../../demo30/dist/authentication/layouts/overlay/sign-in.html" class="link-primary fw-bold">Sign
                  in</a>
              </div>
              <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!--end::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Email-->
              <input type="email" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Password-->
              <input type="password" placeholder="Password" name="password" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
              <!--begin::Repeat Password-->
              <input type="password" placeholder="Repeat Password" name="password_confirmation" autocomplete="off"
                class="form-control bg-transparent" />
              <!--end::Repeat Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Action-->
            <div class="d-grid mb-10">
              <button type="submit" id="kt_new_password_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Submit</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
              </button>
            </div>
            <!--end::Action-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Content-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Body-->
  </div>
  <!--end::Authentication - New password-->
@endsection
