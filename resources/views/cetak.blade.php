
<!DOCTYPE html>
<html>
<head>
    <title>Kartu Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .title {
            font-size: 11px;
            font-weight: bold;
        }

        tr {
            font-size: 12px;
        }

        .notif{
            font-style: italic;
            font-size: 9px;
        }
    </style>
</head>

<body>

    <div class="container">
        <center>
            <img src="images/header.jpg" alt="">
            <p class="title">PANITIA PENERIMAAN MAHASISWA BARU <br>
                PASCASARJANA IAKN TARUTUNG <br>
                TAHUN AKADEMIK 2020/2021
            </p>
            <h6>KARTU PENDAFTARAN</h6>
        </center>
        <br />

        <table class='table'>
            <thead>
                <tr>
                    <td width="100px">NOMOR UJIAN</td>
                    <td width="10px">:</td>
                    <td>{{$user->test_number}}</td>
                </tr>
                <tr>
                    <td width="100px">PILIHAN PRODI</td>
                    <td width="10px">:</td>
                    <td>{{$user->toArray()['prodi']['code']}}. {{$user->toArray()['prodi']['names']}}</td>
                </tr>

            </thead>
        </table>

        <table>
            <tr>
                <td width="100px">
                    <img src="upload_file/{{$user->toArray()['file']['file_foto']}}" width="90px" height="120px" alt="">
                </td>
                <td width="260px">{{$user[0]}}</td>
                <td>
                    <p>Tarutung, ..........2021 <br>
                        Ketua panitia,</p>
                    <img src="images/ttd.png" width="130px" height="60px"  alt="">
                    <p>Dr. Simion D. Harianja, M.Th <br>
                    NIP. 19640531198901001</p>
                </td>
            </tr>
        </table>
        <p class="notif">Harap dibawa kartu ini pada waktu ujian. <br>
            Penyerahan berkas pendaftaran selambatnya tanggal 31 Agustus 2021 <br>
            Pelaksanaan ujian pada tanggal 03-04 September 2021, mulai pukul 08.00 Wib <br>
            di Kampus 2 IAKN Tarutung
        </p>
    </div>

</body>

</html>