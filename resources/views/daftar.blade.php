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
            background-color: #3490dc;
        }

        .navbar span {
            color: white;
            font-size: 1.2em;
        }

        .navbar a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar img {
            height: 43px;
            margin-right: .6em;
        }

        .form-section {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .form-section .card {
            border: 1px solid rgba(0, 0, 0, .125);
            min-width: 25%;
            box-sizing: content-box;
        }

        .form-section .card-body {
            padding: 20px;
        }

        .form-control input,
        select {
            width: 100%;
            padding-top: .4em;
            padding-bottom: .4em;
            text-indent: 1em;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            margin: 10px auto;
            color: #666;
            font-size: 1em;
            border: 1px solid#EEEDED;
        }

        label {
            color: #666;
        }

        .form-control input:focus,
        select:focus {
            outline: none !important;
            border: 1px solid #3490dc;
        }

        .login-box-msg {
            color: #3490dc;
            font-weight: bold;
            text-align: left;
        }

        .sign-up {
            width: 100%;
            background-color: #3490dc;
            color: white;
            border: none;
            padding: 8px 0;
            font-size: 1.2em;
            border-radius: 8px;
        }

        .sign-up:hover {
            background-color: #2287da;
            border-color: #2287da;
        }

        .sign-up:focus,
        .sign-up:active {
            outline: 1 !important;
            outline-color: #4a9bdd85;
        }

        .text-block {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #666;
        }

        .text-block a {
            text-decoration: none;
            color: #3490dc;
            margin-left: 10px;
        }
        .container{
            display: flex;
            margin: 50px;
            justify-content: center;
            border: 1px solid #3490dc;
            border-radius: 10px;
        }

        .warning{
            font-style: italic;
            color: #EE4848;
            margin-left: 10px;
            margin-top: -6px;
            font-size: .8rem;
            display: none;
        }

        .form-control.prodi_s2{
            display: none;
        }
        /* .form-control.kps {
            display: none;
        } */
    </style>
</head>

<body>
    <div class="navbar">
        <a href="/">
            <img src="/images/logo.png" alt="logo">
            <span>PMB IAKN TARUTUNG</span>
        </a>
    </div>
@if($page[0]->activated=='active')
    <div class="form-section">
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Daftar</p>
                <form action="{{route('pengguna.register')}}" method="POST">
                    @csrf
                    <div class="form-control">
                        <input type="text" id="name" name="name" placeholder="Nama Lengkap"  required>
                        <p class="warning name"></p>
                    </div>
                    <div class="form-control">
                        <input type="text" id="email" name="email" placeholder="Email Aktif" required>
                        <p class="warning email"></p>
                    </div>
                    <div class="form-control">
                        <label for="degress">Pilihan jenjang Pendidikan</label>
                        <select name="degress" id="degress" onchange="selectDegrees()">
                            <option value="sarjana">Sarjana (S1)</option>
                            <option value="pascasarjana">Pascasarjana (S2)</option>
                        </select>
                    </div>
                    <div class="form-control kps">
                        <label for="kps">Penerima KIP</label>
                        <select name="acc_kps" id="kps">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>

                    <div class="form-control prodi_s1">
                        <label for="prodi_s1">Pilih 1 Prodi Sarjana</label>
                        <select name="prodi1" id="prodi_s1">
                            @foreach($prodi_s1 as $i)
                                <option value="{{$i->id}}">{{$i->names}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control prodi_s1_">
                        <label for="prodi_s1">Pilih 2 Prodi Sarjana</label>
                        <select name="prodi2" id="prodi_s1">
                            @foreach($prodi_s1 as $i)
                                <option value="{{$i->id}}">{{$i->names}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control prodi_s2">
                        <label for="prodi_s2">Pilih Prodi Pascasarjana</label>
                        <select name="prodi" id="prodi_s2">
                            @foreach($prodi_s2 as $i)
                                <option value="{{$i->id}}">{{$i->names}}</option>
                            @endforeach
                        </select>
                    </div>

               

                    <div class="form-control">
                        <input type="number" id="phone" name="no_hp" placeholder="No. Handphone" required>
                        <p class="warning phone"></p>
                    </div>

                    <div class="form-control">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <p class="warning password"></p>
                    </div>

                    <div class="form-control">
                        <input type="password" id="konfirm_password" name="konfirm_password" placeholder="Konfirmasi password" required>
                        <p class="warning konfirm-password"></p>
                    </div>

                    <div>
                        <button type="submit" class="sign-up">Daftar</button>
                    </div>
                </form>

                <div class="text-block">
                    <p>Sudah punya akun? </p> <a href="/auth">Login</a>
                </div>
            </div>
        </div>
    </div>

@elseif($page[0]->activated=='nonaktive')
      
            <div class="container">
                <div class="box">
                    <p>Pendaftaran belum dibuka. Silahkan cek secara berkala!</p>
                </div>
            </div>

@endif

    <script src="{{ asset('/src/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        const kps = document.getElementsByClassName('form-control kps');
        function selectDegrees() {

            const e = document.getElementById('degress');
            const s1 = document.getElementsByClassName('prodi_s1');
            const s1_ = document.getElementsByClassName('prodi_s1_');
            const s2 = document.getElementsByClassName('prodi_s2');

            const selectValue = e.value
                kps[0].style.display = 'block';
                s2[0].style.display = 'none';
                s1[0].style.display = 'block';
                s1_[0].style.display = 'block';
            if(selectValue=='pascasarjana'){
                kps[0].style.display = 'none'
                s2[0].style.display = 'block';
                s1[0].style.display = 'none';
                s1_[0].style.display = 'none';
            }
        }
    </script>

    <script>
        const password = document.getElementById('password');
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        const konfirmPassword = document.getElementById('konfirm_password');
        const btnSubmit = document.getElementsByClassName('sign-up');
        const warningPassword = document.getElementsByClassName('password');
        const warningKonfirmPassword = document.getElementsByClassName('konfirm-password');
        const warningName = document.getElementsByClassName('name');
        const warningEmail = document.getElementsByClassName('email');
        const warningPhone = document.getElementsByClassName('phone');
        

        btnSubmit[0].addEventListener("click", function(e){
            e.preventDefault();  
            let isTrue = true;
            warningKonfirmPassword[0].style.display = "none";
            warningPassword[0].style.display = "none";
            warningName[0].style.display = "none";
            warningEmail[0].style.display = "none";
            warningPhone [0].style.display = "none";

            if(password.value.length < 8 ){
                warningPassword[0].style.display = "inline-block";
                warningPassword[0].innerHTML = "*Password minimal 8 karakter";
                isTrue = false;
            }

            if(password.value !== konfirmPassword.value){
                warningKonfirmPassword[0].style.display = "inline-block";
                warningKonfirmPassword[0].innerHTML = "*Password tidak sama";
                isTrue = false;
            }

            if(!name.value){
                warningName[0].style.display = "inline-block";
                warningName[0].innerHTML = "*Nama tidak boleh kosong";
                isTrue = false;
            }

            if(!email.value){
                warningEmail[0].style.display = "inline-block";
                warningEmail[0].innerHTML = "*Email tidak boleh kosong";
                isTrue = false;
            }

            if(!phone.value){
                warningPhone[0].style.display = "inline-block";
                warningPhone[0].innerHTML = "*Nomor hp tidak boleh kosong";
                isTrue = false;
            }
            

            if(isTrue){
                btnSubmit[0].form.submit();
            }

           
        })
    
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