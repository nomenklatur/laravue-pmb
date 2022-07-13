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
                      :placeholder="name"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tempat Lahir</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="place_of_birth"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Jenis Kelamin</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="gender"
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
                      :placeholder="mother_name"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(date_of_birth)" disabled />
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
                      :placeholder="religion"
                      disabled
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Prodi</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="prodi1"
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
                      :placeholder="nik"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NISN</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="nisn"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NPWP</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="npwp"
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
                      :placeholder="citizenship"
                      disabled
                    />
                  </div>
                  <div class="col-md-8 mb-3">
                    <label for="validationCustom02">Jalan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="nama_jalan"
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
                      :placeholder="dusun"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RT</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="rt"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RW</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="rw"
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
                      :placeholder="kelurahan"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Kode Pos</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="kode_pos"
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
                      :placeholder="kecamatan"
                      disabled
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Kabupaten</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="kabupaten"
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
                      :placeholder="jenis_tinggal"
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
                      :placeholder="alat_transfortasi"
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
                      :placeholder="telepon"
                      disabled
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Hp</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="hp"
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
                      :placeholder="email"
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
                      :placeholder="kps"
                       disabled
                      />
                    </div>
   
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">No KIP</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="nomor_kps"
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
                      :placeholder="nik_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                     :placeholder="nama_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                      <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(tgl_lahir_ayah)" disabled />
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
                     :placeholder="pendidikan_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="pekerjaan_ayah"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="penghasilan_ayah"
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
                      :placeholder="nik_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="nama_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(tgl_lahir_ibu)" disabled />
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
                      :placeholder="pendidikan_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="pekerjaan_ibu"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="penghasilan_ibu"
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
                      :placeholder="nik_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="nama_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(tgl_lahir_wali)" disabled />
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
                      :placeholder="pendidikan_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      :placeholder="pekerjaan_wali"
                      disabled
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      :placeholder="penghasilan_wali"
                      disabled
                    />
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
            prodi1:""
        };
    },
    methods:{
     async getBioDataUser() {
        const res = await this.apiRequest("GET", `/api/user/biodata/${this.$route.params.id}`);
        if (res.status == 200) {
            if (res.data != null) {
                this.place_of_birth = res.data.place_of_birth;
                this.gender = res.data.gender;
                this.mother_name = res.data.mother_name;
                this.date_of_birth = res.data.date_of_birth;
                this.religion = res.data.religion;
                this.nik = res.data.nik;
                this.nisn = res.data.nisn;
                this.citizenship = res.data.citizenship;
                this.nama_jalan = res.data.nama_jalan;
                this.dusun = res.data.dusun;
                this.rt = res.data.rt;
                this.rw = res.data.rw;
                this.kelurahan = res.data.kelurahan;
                this.kode_pos = res.data.kode_pos;
                this.kecamatan = res.data.kecamatan;
                this.kabupaten = res.data.kabupaten;
                this.alat_transfortasi = res.data.alat_transfortasi;
                this.telepon = res.data.telepon;
                this.hp = res.data.hp;
                this.npwp = res.data.npwp;
                this.kps = res.data.kps;
                this.nomor_kps = res.data.nomor_kps;
                this.nik_ayah = res.data.nik_ayah;
                this.nama_ayah = res.data.nama_ayah;
                this.tgl_lahir_ayah = res.data.tgl_lahir_ayah;
                this.penghasilan_ayah = res.data.penghasilan_ayah;
                this.pendidikan_ayah = res.data.pendidikan_ayah;
                this.pekerjaan_ayah = res.data.pekerjaan_ayah;
                this.nik_ibu = res.data.nik_ibu;
                this.nama_ibu = res.data.nama_ibu;
                this.tgl_lahir_ibu = res.data.tgl_lahir_ibu;
                this.pendidikan_ibu = res.data.pendidikan_ibu;
                this.pekerjaan_ibu = res.data.pekerjaan_ibu;
                this.jenis_tinggal = res.data.jenis_tinggal;
                this.penghasilan_ibu = res.data.penghasilan_ibu;
                this.nik_wali = res.data.nik_wali;
                this.tgl_lahir_wali = res.data.tgl_lahir_wali;
                this.pendidikan_wali = res.data.pendidikan_wali;
                this.pekerjaan_wali = res.data.pekerjaan_wali;
                this.penghasilan_wali = res.data.penghasilan_wali;
                this.activated = res.data.activated;
                this.nama_wali = res.data.nama_wali
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
              this.name = res.data.user.name;
              this.prodi1 = res.data.prodi1.names
              this.email = res.data.user.email
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
