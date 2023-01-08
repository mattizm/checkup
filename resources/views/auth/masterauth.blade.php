<!DOCTYPE html>
<html lang="id">
<!--begin::Head-->

<head>
  <base href="../../../" />
  <title>@yield('title') | {{ config('app.name') }}</title>
  <meta charset="utf-8" />
  <meta name="description" content="Bekali Kendali can chekup your family health." />
  <meta name="keywords" content="checkup, bekali kendali, cek kesehatan, bekali, kendali" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="system" />
  <meta property="og:title" content="@yield('title') - {{ config('app.name') }}" />
  <meta property="og:url" content="{{ config('app.url') }}" />
  <meta property="og:site_name" content="{{ config('app.name') }}" />
  <link rel="canonical" href="{{ config('app.url') }}" />
  <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
  <!--begin::Fonts(mandatory for all pages)-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Vendor Stylesheets(used for this page only)-->

  @yield('css')

  <!--end::Vendor Stylesheets-->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
  <!--begin::Theme mode setup on page load-->
  <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
      if (document.documentElement.hasAttribute("data-theme-mode")) {
        themeMode = document.documentElement.getAttribute("data-theme-mode");
      } else {
        if (localStorage.getItem("data-theme") !== null) {
          themeMode = localStorage.getItem("data-theme");
        } else {
          themeMode = defaultThemeMode;
        }
      }
      if (themeMode === "system") {
        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
      }
      document.documentElement.setAttribute("data-theme", themeMode);
    }
  </script>
  <!--end::Theme mode setup on page load-->
  <!--begin::Root-->
  <div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
      body {
        background-image: url('assets/media/auth/bg10.jpeg');
      }

      [data-theme="dark"] body {
        background-image: url('assets/media/auth/bg10-dark.jpeg');
      }
    </style>
    <!--end::Page bg image-->

    @yield('content')

  </div>
  <!--end::Root-->
  <!--begin::Javascript-->
  <script>
    var hostUrl = "assets/";
  </script>
  <!--begin::Global Javascript Bundle(mandatory for all pages)-->
  <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Custom Javascript(used for this page only)-->

  @yield('js')

  <!--end::Custom Javascript-->
  <script>
    @if(Session::has('status'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.success("{{ Session::get('status') }}");
    @php
    Session::forget('status');
    @endphp
    @endif
    @if(Session::has('pesan'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.success("{{ Session::get('pesan') }}");
    @php
    Session::forget('pesan');
    @endphp
    @endif
    @if(Session::has('success'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.success("{{ Session::get('success') }}");
    @php
    Session::forget('success');
    @endphp
    @endif
    @if(Session::has('info'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.info("{{ Session::get('info') }}");
    @php
    Session::forget('info');
    @endphp
    @endif
    @if(Session::has('warning'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.warning("{{ Session::get('warning') }}");
    @php
    Session::forget('warning');
    @endphp
    @endif
    @if(Session::has('danger'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.error("{{ Session::get('danger') }}");
    @php
    Session::forget('danger');
    @endphp
    @endif


    @if(Session::has('errors'))
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toastr-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    toastr.error("<ul class='mb-0'> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>");
    @php
    Session::forget('error');
    @endphp
    @endif
  </script>
  <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
