<template>
  <div>
    <Navbar></Navbar>
     <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Penerimaan Mahasiswa Baru</h1>
          <h2>IAKN TARUTUNG</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#about" class="btn-get-started scrollto">Daftar</a>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-mind-map"></i></div>
            <h4 class="title"><a href="">Alur Pendaftaran</a></h4>
            <p class="description">Klik untuk melihat alur pendaftaran PMB IAKN Tarutung</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-file-info-line"></i></div>
            <h4 class="title"><a href="">Pengumuman</a></h4>
            <p class="description">Klik untuk melihat Pengumuman PMB IAKN Tarutung</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-money-dollar-circle-fill"></i></div>
            <h4 class="title"><a href="">Uang Kuliah</a></h4>
            <p class="description">Klik untuk melihat daftar biaya kuliah di IAKN Tarutung</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="ri-government-fill"></i></div>
            <h4 class="title"><a href="">Program Studi</a></h4>
            <p class="description">Klik untuk melihat daftar program studi di IAKN Tarutung</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <main id="main">
  </main>
  <Footer></Footer>
  </div>
</template>

<script>

import Navbar from './navbar';
import Slider from './slider';
import Footer from './footer';

export default {
    components:{Navbar,Slider, Footer}
}
</script>

