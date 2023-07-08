<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <title>LuxSpace</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  <link rel="apple-touch-icon" href="{{ url('/frontend/images/content/favicon.png') }}" />

  <link rel="icon" href="{{ url('/frontend/images/content/favicon.png') }}" />

  <meta name="theme-color" content="#000" />
  <link rel="icon" href="{{ url('/frontend/favicon.ico') }}">
  <link href="{{ url('/frontend/css/app.minify.css') }}" rel="stylesheet">
</head>

<body>
  @include('components.frontend.navbar')

  @yield('content')

  @include('components.frontend.footer')

  <!-- START: LOAD SVG -->
  <!-- <svg width="23" height="26" class="hidden" id="icon-play">
      <path
        d="M21 9.536c2.667 1.54 2.667 5.39 0 6.928l-15 8.66c-2.667 1.54-6-.385-6-3.464V4.34C0 1.26 3.333-.664 6 .876l15 8.66z"
        fill="#fff"
      />
    </svg> -->
  <!-- END: LOAD SVG  -->

  <script src="{{ url('/frontend/js/app.js') }}"></script>
</body>

</html>
