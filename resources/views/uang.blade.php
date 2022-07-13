<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAFTAR | PMB IAKN Tarutung</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-image: url('assets/img/bg.svg');
      background-repeat: repeat;
      background-position: cover;
    }

    body,
    html {
      height: 100%;
      margin: 0;
    }

    .navbar {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: .8em;
      box-sizing: border-box;
      background-color: #3490dc;
    }

    .navbar a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
    }

    .navbar a img {
      width: 68px;
      height: 58px;
    }

    .navbar a span {
      font-size: 1.2em;
      margin-left: 10px;
    }

    section {
      display: flex;
      margin: auto;
      justify-content: center;
    }


    .wrapper {
      display: flex;
      justify-content: center;
      width: 80%;
      flex-direction: column;
      background-color: white;
      padding-bottom: 100px;
    }

    .wrapper span {
      margin: auto 30px;
      word-wrap: break-word;
    }

    .wrapper h3 {
      text-align: center;
      border: 1px solid #3490dc;
      border-radius: 10px;
      padding: 10px 0;
      margin: 20px 30px;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #3490dc;
      padding: 0 30px;
      box-sizing: border-box;
    }

    .container p,
    .navbar a,
    .container a {
      color: white;
      text-decoration: none;
    }

    .foot-nav {
      display: none;
    }



    @media screen and (max-width:769px) {

      footer .container {
        display: none;
      }

      footer .foot-nav {
        display: flex;
        position: fixed;
        justify-content: space-around;
        align-items: center;
        background-color: #3490DC;
        width: 100%;
        bottom: 0;
        height: 80px;
      }

      .active {
        background-color: white;
        color: var(--primary-color);
        padding: 35px 20px;
      }


    }

    @media screen and (max-width:402px) {
      .right-side h3 {
        font-size: 1.3rem;
        margin-bottom: 20px;
      }

      .right-side a {
        display: inline-block;
        background-color: var(--primary-color);
        border-radius: 30px;
        width: 157px;
        height: 30px;
        font-size: 1rem;
        line-height: 30px;
        text-align: center;
        margin-bottom: 100px;
        font-size: 1rem;
        color: var(--Third-color);
      }

      .right-side p {
        display: none;
      }

      .wrapper p {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="navbar">
    <a href="/">
      <img src="/images/logo.png" alt="logo">
      <span>PMB IAKN TARUTUNG</span>
    </a>
  </div>

  <section>
    <div class="wrapper">
      <h3>Informasi Uang Kuliah</h3>
      <span>
        {!!$fees[0]->fee!!}
      </span>
    </div>
  </section>


  <footer>
    <div class="container">
      <p>Copyright @ 2021 IAKN Tarutung</p>
      <a href="#">contact us</a>
    </div>

    <div class="foot-nav">
      <a href="/"><img src="{{url('/assets/img/homed.svg')}}" alt=""></a>
      <a href="alur"><img src="{{url('/assets/img/flow.svg')}}" alt=""></a>
      <a href="pengumuman"><img src="{{url('/assets/img/notice.svg')}}" alt=""></a>
      <a href="uang-kuliah"><img src="{{url('/assets/img/money.svg')}}" alt=""></a>
      <a href="program-studi"><img src="{{url('/assets/img/study.svg')}}" alt=""></a>
    </div>
  </footer>


  <script src="{{ asset('/src/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    const kps = document.getElementsByClassName('form-control kps');

    function selectDegrees() {

      const e = document.getElementById('degress');
      const selectValue = e.value
      kps[0].style.display = 'block'

      if (selectValue == 'pascasarjana') {
        kps[0].style.display = 'none'
      }
    }
  </script>

  @if(session()->has('success'))
  <script>
    Swal.fire(
      'Berhasil',
      '{{session()->get('
      success ')}}',
      'success'
    )
  </script>
  @endif

  @if(session()->has('error'))
  <script>
    Swal.fire(
      'Coba lagi',
      '{{session()->get('
      error ')}}',
      'error'
    )
  </script>
  @endif
</body>

</html>