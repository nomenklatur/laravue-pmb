<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        .container{
            margin: 3em;
        }
        .logo-bar{
            text-align: center;
            padding: 1em;
            background-color: #3490dc;
        }
        .logo-bar img{
            width: 45px;
            vertical-align: middle;
            height: 45px;
        }

        .logo-bar span{
            color: white;
            font-size: 19px;
            width: 100px;
            position: relative;
            margin: .5em;
        }

        .text-mgs{
            background-color: #46a2ee;
            color: white;
            text-align: center;
            padding: 1em;
        }
        .account{
            text-align: center;
        }
        .account-info{
            text-align: center;
        }

        .btn-login{
            background-color: #3490dc;
            padding: 1em 2em;
            border-radius: 0.5em;
            color: white;
            margin-top: 2em;
            width: 100px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .footer{
            display: flex;
            justify-content: center;
            background-color:rgb(235, 235, 235);
            margin: 1em auto;
        }
        .logo-footer{
          width: 300px;
          text-align: center;
        }

        .logo-footer img{
            width: 100px;
            height: 100px;
            margin: 1em;
        }

        .info-footer{
            max-width: 500px;
        }

        .info-footer p{
            text-align: justify;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="logo-bar">
            <img src="https://pmb.iakntarutung.ac.id/images/logo.png" alt="">
            <span > PMB IAKN TARUTUNG</span></a>
        </div>
        <div class="text-mgs">
            Selamat anda berhasil terdaftar, berikut informasi akun Anda :
        </div>

        <div class="account">
            <div class="account-info">
                <p>usename</p>
                <h3>{{$username}}</h3>
                <p>password</p>
                <h3>{{$password}}</h3>
            </div>
            <!-- <a type="button" href="/login" class="btn-login">Link login</a> -->
        </div>
    
        <div class="footer">
            <div class="logo-footer">
                <img src="https://pmb.iakntarutung.ac.id/images/logo.png" alt="">
            </div>
            <div class="info-footer">
                <h3>Our Contact</h3>
                <p>Kampus I : Jalan Pemuda Ujung No. 17 Tarutung
                    Kampus II : Jalan Raya Tarutung-Siborongborong KM 11 Silangkitang Kec.Sipoholon Kab. Tapanuli Utara
                    info@iakntarutung.ac.id</p>
            </div>
        </div>
    </div>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
    <title>Akun PMb</title>
</head>
<body>
<h2 style="text-align:center">{{$title}}</h2>

<div class="card">
  <p>Username:</p>
  <h1>{{$username}}</h1>
  <p>Password:</p>
  <h3>{{$password}}</h3>
</div>
</body>
</html> -->