@extends('auth.masterauth')
@section('title', 'Verifikasi Email')
@section('content')
  <!--begin::Authentication - Signup Welcome Message -->
  <div class="d-flex flex-column flex-center flex-column-fluid">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-center text-center p-10">
      <!--begin::Wrapper-->
      <div class="card card-flush w-lg-650px py-5">
        <div class="card-body py-15 py-lg-20">
          <!--begin::Logo-->
          <div class="mb-14">
            <a href="/" class="">
              <img alt="Logo" src="{{ asset('assets/media/logos/custom-2.svg') }}" class="h-40px" />
            </a>
          </div>
          <!--end::Logo-->
          <!--begin::Title-->
          <h1 class="fw-bolder text-gray-900 mb-5">Verify your email</h1>
          <!--end::Title-->
          @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
              {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
          @endif
          <!--begin::Action-->
          <div class="fs-6 mb-8">
            <span class="fw-semibold text-gray-500">Did’t receive an email?</span>
            <form action="{{ route('verification.send') }}" method="post">@csrf
              <button class="link-primary fw-bold">TryAgain</button>
            </form>
          </div>
          <!--end::Action-->
          <!--begin::Link-->
          <div class="mb-11">
            <form action="{{ route('logout') }}" method="post">@csrf
              <button class="btn btn-sm btn-primary">Skip for now | Log Out</button>
            </form>
          </div>
          <!--end::Link-->
          <!--begin::Illustration-->
          <div class="mb-0">
            <img src="{{ asset('assets/media/auth/please-verify-your-email.png') }}"
              class="mw-100 mh-300px theme-light-show" alt="" />
            <img src="{{ asset('assets/media/auth/please-verify-your-email-dark.png') }}"
              class="mw-100 mh-300px theme-dark-show" alt="" />
          </div>
          <!--end::Illustration-->
        </div>
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Authentication - Signup Welcome Message-->
@endsection
