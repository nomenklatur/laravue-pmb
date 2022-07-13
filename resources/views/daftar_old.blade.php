@extends('layouts.app')

@section('content')

<section id="about" class="about" style="background-color:aliceblue;margin-top:80px">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Daftar</h2>
            <p>Silahkan lengkapi data berikut </p>
        </div>
        <div class="row" style="display: flex;justify-content:center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('pengguna.register')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="kps">Penerima KPS</label>
                                        <select class="form-control" name="acc_kps" id="kps" >
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                </div>
                            </div>
                            
                            <!-- <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Nomor KPS</label>
                                    <input type="text" class="form-control" placeholder="Isi jika Anda penerima kps" name="no_kps">
                            </div> -->

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">No. Handphone</label>
                                <input type="number" class="form-control" name="no_hp" required>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary" style="width:100%" type="submit">Daftar</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>

@endsection