<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1
              class="m-0 text-dark"
              v-if="this.$store.state.user.activated == '1'"
            >
              Dashboard User
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content" v-if="this.$store.state.user.activated == '1'">
      <div class="container-fluid">
        <div class="row">
        
          
          <div class="col-12 col-sm-6 col-md-6" v-if="this.$store.state.user.degress=='pascasarjana'">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"
                ><i class="fa fa-id-card" aria-hidden="true"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-number"><a :href="'/print/' + user_id" target="_blank">Download Kartu Peserta</a></span>
              </div>
            </div>
          </div>


          <div class="col-12 col-sm-12 col-md-12" v-else>
            <div class="info-box mb-3">
              <div class="info-box-content">
                <span class="info-box-number">Selamat datang di website PMB IAKN Tarutung</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section 
    
      ref="select"
      v-if="
        this.$store.state.user.degress == 'sarjana' &&
        this.$store.state.user.activated == '1' && 
        this.$store.state.user.prodi_1 == null ||
        this.$store.state.user.prodi_1 == '' ||
        this.$store.state.user.prodi_1 == undefined
      "
    >
     <div class="row">
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">Pilih prodi 2</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <Select v-model="form1.prodi" clearable 
                          placeholder="Pilih prodi 2"
                        >
                            <Option v-for="item in prodis" :value="item.id" :key="item.id">{{ item.names }}</Option>
                        </Select>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-button">
                  <button
                    type="submit"
                    @click.prevent="updateProdi"
                    class="btn btn-primary"
                  >
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
     </div>
    </section>

    <section
      v-if="
        this.$store.state.user.degress == 'sarjana' &&
        this.$store.state.user.activated == '0'
      "
    >
      <div class="container-fluid">
        <div class="row"></div>
        <div class="container-mini">
          <div class="box">
            <p>Upload Bukti Pembayaran</p>
            <div class="form">
              <label for="file">Pilih file</label>
              <input
                type="file"
                id="file"
                ref="file"
                @change="changeFile"
                hidden
              />
              <img :src="url" alt="" />
              <button @click="upload">Upload file</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section
      v-if="
        this.$store.state.user.degress == 'pascasarjana' &&
        this.$store.state.user.activated == '0'
      "
    >
      <div class="container-fluid">
        <h3>Silahkan download dan isi file di bawah ini</h3>
        <div class="row">
          <div class="col-md-4">
            <a href="/file/file-formulir.docx">
              <div class="card">
                <div class="card-title">
                  <p>Contoh Form Rekomendasi</p>
                  <i class="fas fa-download"></i>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="/file/file-kartu_pendaftar.docx">
              <div class="card">
                <div class="card-title">
                  <p>Contoh Kartu Pendaftaran</p>
                  <i class="fas fa-download"></i>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="/file/file-cv.docx">
              <div class="card">
                <div class="card-title">
                  <p>Contoh CV</p>
                  <i class="fas fa-download"></i>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- <h3 class="title-uploada">Upload File</h3> -->
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">Upload Berkas</div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body body-limit"> 
                  <div class="form-group">
                    <label for="rekomendasi">File Rekomendasi</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          accept="application/msword, .doc, .docx, application/pdf"
                          @change="changeRekom"
                          ref="rekomendasi"
                          id="rekomendasi"
                        />
                        <label class="custom-file-label" for="rekomendasi">{{
                          textRekom
                        }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="transkrip">File Transkrip</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          accept="application/msword, .doc, .docx, application/pdf"
                          @change="changeTranskrip"
                          ref="transkrip"
                          id="transkrip"
                        />
                        <label class="custom-file-label" for="transkrip">{{
                          textTranskrip
                        }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ijazah">File Ijazah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          accept="application/msword, .doc, .docx, application/pdf"
                          @change="changeIjazah"
                          ref="ijazah"
                          id="ijazah"
                        />
                        <label class="custom-file-label" for="ijazah">{{
                          textIjazah
                        }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="karyailmiah">File Karya Ilmiah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          accept="application/msword, .doc, .docx, application/pdf"
                          @change="changeKaryaIlmiah"
                          ref="karyailmiah"
                          id="karyailmiah"
                        />
                        <label class="custom-file-label" for="rekomendasi">{{
                          textKaryaIlmiah
                        }}</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cv">File CV</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          @change="changeCv"
                          accept="application/msword, .doc, .docx, application/pdf"
                          ref="cv"
                          id="cv"
                        />
                        <label class="custom-file-label" for="cv">{{
                          textCv
                        }}</label>
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="foto">Pas Foto (3x4)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          @change="changeFoto"
                          accept="image/x-png, image/gif,image/jpg"
                          ref="foto"
                          id="foto"
                        />
                        <label class="custom-file-label" for="foto">{{
                          textFoto
                        }}</label>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="ktp">KTP</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input
                          type="file"
                          class="custom-file-input"
                          @change="changeKtp"
                          accept="image/x-png, image/gif,image/jpg"
                          ref="ktp"
                          id="ktp"
                        />
                        <label class="custom-file-label" for="ktp">{{
                          textKtp
                        }}</label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-button">
                  <button
                    type="submit"
                    @click.prevent="uploadPasca"
                    class="btn btn-primary"
                  >
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
           <div class="col-md-4">
             <div class="box-pasca">
                  <p>Upload Bukti Pembayaran</p>
                  <div class="form">
                    <label for="file">Pilih file</label>
                    <input
                      type="file"
                      id="file"
                      ref="file"
                      @change="changeFile"
                      hidden
                    />
                    <img :src="url" alt="" />
                    <button @click="upload">Upload file</button>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">Status</div>
              <div class="card-body">
                <div
                  class="badge badge-warning p-2"
                  v-if="status == 'start' || status == ''"
                >
                  Terdaftar
                </div>
                <div class="badge badge-primary p-2" v-if="status == 'pending'">
                  Pending
                </div>
                <div class="badge badge-success p-2" v-if="status == 'success'">
                  Aktif
                </div>
                <div class="badge badge-danger p-2" v-if="status == 'rejected'">
                  Rejected
                </div>
                <div class="pt-1 catatan">
                  catatan: <span>{{ noted }}</span>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url:
        "http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg",
      file: "",
      user_id: this.$store.state.user.id,
      textRekom: "Pilih File",
      textKartu: "Pilih File",
      textTranskrip: "Pilih File",
      textIjazah: "Pilih File",
      textKaryaIlmiah: "Pilih File",
      textCv: "Pilih File",
      textFoto:"Pilih File",
      textKtp:"Pilih File",
      rekom: "",
      ijazah: "",
      transkrip: "",
      karyailmiah: "",
      kartu: "",
      status: "",
      noted: "Berkas perlu dikirim",
      cv: "",
      foto:"",
      ktp:"",
      urlRekom: "",
      urlIjazah: "",
      urlTranskrip: "",
      urlKaryaIlmiah: "",
      urlKartu: "",
      urlCv: "",
      urlFoto: "",
      urlKtp: "",
      data: {
        file_rekom: "",
      },
      form1:{
          prodi:'',
          user_id: this.$store.state.user.id,
      },
      prodis : [
      ],
      form: {
        rekomendasi: "",
        kartu: "",
        cv: "",
        foto:"",
        ktp:"",
        ijazah: "",
        transkrip: "",
        karyailmiah: "",
      },
    };
  },

  methods: {
    changeFile(e) {
      const file = e.target.files[0];
      this.file = this.$refs.file.files[0];
      this.url = URL.createObjectURL(file);
    },

    changeRekom(e) {
      const rekom = e.target.files[0];
      this.rekom = this.$refs.rekomendasi.files[0];
      this.textRekom = this.rekom.name;
    },

    changeKartu(e) {
      const kartu = e.target.files[0];
      this.kartu = this.$refs.kartu.files[0];
      this.textKartu = this.kartu.name;
    },

    changeCv(e) {
      const cv = e.target.files[0];
      this.cv = this.$refs.cv.files[0];
      this.textCv = this.cv.name;
    },

    changeFoto(e) {
      const foto = e.target.files[0];
      this.foto = this.$refs.foto.files[0];
      this.textFoto = this.foto.name;
    },

    changeKtp(e){
      const ktp = e.target.files[0];
      this.ktp = this.$refs.ktp.files[0];
      this.textKtp = this.ktp.name;
    },

    changeIjazah(e){
      const ijazah = e.target.files[0];
      this.ijazah = this.$refs.ijazah.files[0];
      this.textIjazah = this.ijazah.name;
    },

    changeTranskrip(e){
      const transkrip = e.target.files[0];
      this.transkrip = this.$refs.transkrip.files[0];
      this.textTranskrip = this.transkrip.name;
    },

    changeKaryaIlmiah(e){
      const karyailmiah = e.target.files[0];
      this.karyailmiah = this.$refs.karyailmiah.files[0];
      this.textKaryaIlmiah = this.karyailmiah.name;
    },

    upload() {
      this.file = this.$refs.file.files[0];
      let formData = new FormData();
      formData.append("user_id", this.user_id);
      formData.append("file", this.file);

      axios
        .post("/api/upload", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.notif("sucsess", "Data berhasil diunggah");
        })
        .catch(() => {
          this.notif("error", "Data tidak berhasil diunggah");
        });
    },

    uploadPasca() {
      this.rekom = this.$refs.rekomendasi.files[0];
      // this.kartu = this.$refs.kartu.files[0];
      this.cv = this.$refs.cv.files[0];
      this.foto = this.$refs.foto.files[0];
      this.ktp = this.$refs.ktp.files[0];
      this.ijazah = this.$refs.ijazah.files[0];
      this.transkrip = this.$refs.transkrip.files[0];
      this.karyailmiah = this.$refs.transkrip.files[0];
      let formData = new FormData();

      formData.append("user_id", this.user_id);
      formData.append("rekom", this.rekom);
      // formData.append("kartu", this.kartu);
      formData.append("cv", this.cv);
      formData.append("foto", this.foto);
      formData.append("ktp", this.ktp);
      formData.append("ijazah", this.ijazah);
      formData.append("transkrip", this.transkrip);
      formData.append("karyailmiah", this.karyailmiah);

      axios
        .post("/api/file", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          if (res.data.data != 1) {
            this.status = res.data.data.status;
            this.noted = "Menunggu konfirmasi";
          }

          this.notif("sucsess", "Data berhasil diunggah");
        })
        .catch(() => {
          this.notif("error", "Data tidak berhasil diunggah");
        });
    },

    async getFile() {
      const res = await this.apiRequest("get", `/api/file/${this.user_id}`);
      if (res.status == 200) {
        if (res.data.data) {
          this.data = res.data.data;
          this.status = res.data.data.status;
          if (this.status == "pending") {
            this.noted = "Menunggu konfirmasi";
          }
          if (this.status == "success") {
            this.noted = "Akun berhasil diaktifkan";
          }

          if (this.status == "rejected") {
            this.noted = res.data.data.noted;
          }
        }

        // this.urlRekom = '/upload_file/' + res.data.data.file_rekom;
        // this.urlKartu = '/upload_file/' + res.data.data.file_kartu;
        // this.urlCv    = '/upload_file/' + res.data.data.file_cv;
      } else {
        this.urlRekom = "";
        this.urlKartu = "";
        this.urlCv = "";
      }
    },

    async getImage() {
      const res = await this.apiRequest("get", `/api/upload/${this.user_id}`);
      if (res.status == 200) {
        if (res.data.data != null) {
          this.url = "/images/" + res.data.data.image;
        }
      } else {
        this.url =
          "http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg";
      }
    },

    async getProdi(){
      const res = await this.apiRequest("get", `/api/prodis2/`);
      if (res.status == 200) {
        this.prodis = res.data.prodi.data
      } 
    },

    async updateProdi(){
      if(!this.form1.prodi){
        this.notif("Pilih Prodi!", "Prodi tidak boleh kosong!", "error");
        return;
      }
      const res = await this.apiRequest('put', '/api/prodis2/', this.form1 );
      if(res.status == 200){
        console.log(this.$refs.select)
        this.$refs.select.remove()
        this.notif("Berhasil!", res.data.msg, "success");
      }
    }
  },

  async created() {
    this.getFile();
    this.getImage();
    this.getProdi();
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
a {
  color: #666;
}

.card {
  margin: 10px 20px;
}

a:hover {
  color: rgb(27, 201, 100);
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

.body-limit {
  height: 400px;
  overflow: auto;
}
</style>