<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMB IAKN Tarutung</title>

    <link href="{{ asset('src/assets/img/fav.ico') }}" rel="icon">
    <link href="{{ asset('src/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
</head>

<body class="body">

    @include('home.navigation')
    @yield('content')

  <!-- <main id="main">
  </main> -->

  @include('home.footer')
</body>

</html>