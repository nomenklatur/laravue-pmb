<template>
    <div class="content-wrapper">

            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Peserta Sarjana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Peserta Sarjana</li>
                    </ol>
                </div>
               <div class="col-sm-6">
                    <a title="Print Screen" 
                    alt="Print Screen"
                    onclick="window.print();" 
                    target="_blank" 
                    class="float-right btn btn-primary"
                    style="cursor:pointer;">
                    Cetak
                  <Icon
                    type="ios-print-outline"
                    size="24"
                    color="error"
                  />
                    </a>
                </div>
                </div>
            </div>
            </div>

     <section class="content">
      <div class="container-fluid">
        <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">Data Diri</h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Lengkap</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.name"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tempat Lahir</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.place_of_birth"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Jenis Kelamin</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.gender"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Ibu</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.mother_name"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.date_of_birth)" disabled />
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Agama</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.religion"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Prodi 1</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.prodi1"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Prodi 2</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.prodi2"
                      disabled
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">Data Alamat</h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">NIK</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nik"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NISN</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nisn"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NPWP</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.npwp"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Kewarganegaraan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.citizenship"
                      disabled
                    />
                  </div>
                  <div class="col-md-8 mb-3">
                    <label for="validationCustom02">Jalan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nama_jalan"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Dusun</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.dusun"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RT</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.rt"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RW</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.rw"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-8 mb-3">
                    <label for="validationCustom01">Kelurahan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.kelurahan"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Kode Pos</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.kode_pos"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Kecamatan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.kecamatan"
                      disabled
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Kabupaten</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.kabupaten"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Jenis Tinggal</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.jenis_tinggal"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Alat Transfortasi</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.alat_transfortasi"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Telepon</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.telepon"
                      disabled
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Hp</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.hp"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.email"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-3 mb-3">
                    <label for="validationCustom01">Penerima KIP</label>
                    <div class="form-check">
                      <input
                      type="text"
                      class="form-control"
                      :placeholder="data.kps"
                       disabled
                      />
                    </div>
   
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">No KIP</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nomor_kps"
                      disabled
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">Data Ayah</h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">NIK</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nik_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                     :placeholder="data.nama_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                      <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_ayah)" disabled />
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Pendidikan</label>
                    <input
                      type="text"
                      class="form-control"
                     :placeholder="data.pendidikan_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.pekerjaan_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="data.penghasilan_ayah"
                      disabled
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">Data Ibu</h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">NIK</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nik_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nama_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_ibu)" disabled />
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Pendidikan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.pendidikan_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.pekerjaan_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="data.penghasilan_ibu"
                      disabled
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">
                Data Wali
              </h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">NIK</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nik_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.nama_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_wali)" disabled />
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Pendidikan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.pendidikan_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="data.pekerjaan_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="data.penghasilan_wali"
                      disabled
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card KK -->
         <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">
                Kartu Keluarga
              </h5>

              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-12 mb-3" v-if="data.fileKK">
                      <img 
                      class="img-fluid"
                      :src="'/upload_kip/'+data.fileKK" 
                      alt="" />
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

          <!-- Card Ijazah -->
         <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">
                Ijazah
              </h5>

              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-12 mb-3" v-if="data.fileIjazah">
                      <img 
                      class="img-fluid"
                      :src="'/upload_kip/'+data.fileIjazah" 
                      alt="" />
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>

        <!-- Card KIP -->
         <div class="row content">
          <div class="col-lg-12">
            <div class="card">
              <h5 class="card-header">
                KIP
              </h5>

              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-12 mb-3" v-if="data.fileKip" >
                      <img 
                      class="img-fluid"
                      :src="'/upload_kip/' + data.fileKip"
                      alt="tes" />
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>

        <br />
      </div>
    </section>
    </div>
</template>

<script>

import moment from "moment";
import "vue2-datepicker/index.css";
export default {
    data(){
        return{
            data:{
              name: "",
              place_of_birth: "",
              gender: "",
              mother_name: "",
              date_of_birth: "",
              religion: "",
              nik: "",
              nisn: "",
              npwp: "",
              citizenship: "",
              nama_jalan: "",
              dusun: "",
              rt: "",
              rw: "",
              kelurahan: "",
              kode_pos: "",
              kecamatan: "",
              kabupaten: "",
              jenis_tinggal: "",
              alat_transfortasi: "",
              telepon: "",
              hp: "",
              kps: "",
              nomor_kps: "",
              nik_ayah: "",
              nama_ayah: "",
              tgl_lahir_ayah: "",
              pendidikan_ayah: "",
              pekerjaan_ayah: "",
              penghasilan_ayah: "",
              nik_ibu: "",
              nama_ibu: "",
              tgl_lahir_ibu: "",
              pendidikan_ibu: "",
              pekerjaan_ibu: "",
              penghasilan_ibu: "",
              nik_wali: "",
              nama_wali: "",
              tgl_lahir_wali: "",
              pendidikan_wali: "",
              pekerjaan_wali: "",
              penghasilan_wali: "",
              activated: "",
              email:"",
              fileKK:null,
              fileIjazah:null,
              fileKip:null,
              prodi1:"",
              prodi2:""
            }
        };
    },
    methods:{
     async getBioDataUser() {
        const res = await this.apiRequest("GET", `/api/user/biodata/${this.$route.params.id}`);
        if (res.status == 200) {
            if (res.data != null) {
              this.data.place_of_birth = res.data.place_of_birth;
                this.data.gender = res.data.gender;
                this.data.mother_name = res.data.mother_name;
                this.data.date_of_birth = res.data.date_of_birth;
                this.data.religion = res.data.religion;
                this.data.nik = res.data.nik;
                this.data.nisn = res.data.nisn;
                this.data.citizenship = res.data.citizenship;
                this.data.nama_jalan = res.data.nama_jalan;
                this.data.dusun = res.data.dusun;
                this.data.rt = res.data.rt;
                this.data.rw = res.data.rw;
                this.data.kelurahan = res.data.kelurahan;
                this.data.kode_pos = res.data.kode_pos;
                this.data.kecamatan = res.data.kecamatan;
                this.data.kabupaten = res.data.kabupaten;
                this.data.alat_transfortasi = res.data.alat_transfortasi;
                this.data.telepon = res.data.telepon;
                this.data.hp = res.data.hp;
                this.data.npwp = res.data.npwp;
                this.data.kps = res.data.kps;
                this.data.nomor_kps = res.data.nomor_kps;
                this.data.nik_ayah = res.data.nik_ayah;
                this.data.nama_ayah = res.data.nama_ayah;
                this.data.tgl_lahir_ayah = res.data.tgl_lahir_ayah;
                this.data.penghasilan_ayah = res.data.penghasilan_ayah;
                this.data.pendidikan_ayah = res.data.pendidikan_ayah;
                this.data.pekerjaan_ayah = res.data.pekerjaan_ayah;
                this.data.nik_ibu = res.data.nik_ibu;
                this.data.nama_ibu = res.data.nama_ibu;
                this.data.tgl_lahir_ibu = res.data.tgl_lahir_ibu;
                this.data.pendidikan_ibu = res.data.pendidikan_ibu;
                this.data.pekerjaan_ibu = res.data.pekerjaan_ibu;
                this.data.jenis_tinggal = res.data.jenis_tinggal;
                this.data.penghasilan_ibu = res.data.penghasilan_ibu;
                this.data.nik_wali = res.data.nik_wali;
                this.data.tgl_lahir_wali = res.data.tgl_lahir_wali;
                this.data.pendidikan_wali = res.data.pendidikan_wali;
                this.data.pekerjaan_wali = res.data.pekerjaan_wali;
                this.data.penghasilan_wali = res.data.penghasilan_wali;
                this.data.activated = res.data.activated;
                this.data.fileKK = res.data.file_kk
                this.data.fileIjazah = res.data.file_ijazah
                this.data.fileKip = res.data.file_kip
                this.data.nama_wali = res.data.nama_wali
            }
        }
        
    },
    
    dateFormat(date) {
      return moment(date).format("YYYY-MM-DD");
    },
    async getUserDetail() {
        const res = await this.apiRequest("GET", `/api/user/${this.$route.params.id}`);
        if (res.status == 200) {
            if (res.data != null) {
              this.data.name = res.data.user.name;
              this.data.prodi1 = res.data.prodi1.names
              this.data.prodi2 = res.data.prodi2.names
              this.data.email = res.data.user.email
            }
        }
    },
    
  },

  async created() {
    this.getUserDetail();
    this.getBioDataUser();
  },

};
</script>
<style scoped>
.container-mini {
  display: flex;
  justify-content: center;
}

.box {
  width: 40%;
  height: 400px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  width: 40%;
}

.box p {
  text-align: center;
  margin-top: 1em;
  font-size: 23px;
}

.form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 2em;
}
.form label {
  border: 1px solid black;
  padding: 0.5em;
  width: 100px;
  text-align: center;
  border-radius: 5px;
  cursor: pointer;
}

.form button {
  margin: 1em auto;
  background-color: black;
  padding: 0.5em;
  width: 100px;
  border-radius: 5px;
  color: white;
  cursor: pointer;
}

.form img {
  width: 200px;
  height: 200px;
}

.container-mini-pasca {
  display: flex;
  justify-content: space-between;
}

.card-title {
  display: flex;
  justify-content: space-between;
  padding: 20px 30px;
}

.card {
  margin: 10px 20px;
}

.card-title i {
  color: rgb(27, 201, 100);
  text-decoration: none;
}

.container-fluid h3 {
  margin-left: 20px;
}

.card-button button {
  width: 100%;
}

.row.center {
  display: flex;
  justify-content: center;
}

.title-upload {
  margin-top: 80px;
  text-align: center;
}

.col-md-6.card {
  margin: 0;
}

.pt-1.catatan {
  display: flex;
  flex-direction: column;
  margin: 20px 0 0 0;
}

.box-pasca{
  background-color: white;
  margin: 10px 0;
}

.box-pasca p{
  padding: 17px;
  text-align: center;
}
</style>
