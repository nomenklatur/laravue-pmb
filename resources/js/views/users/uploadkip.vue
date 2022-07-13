<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload KIP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload KIP</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Card Uupload KIP -->
    <section class="content">
        <div class="row">
         <div class="col-md-4">
             <div class="box-pasca">
                  <p>Upload KIP</p>
                  <div class="form">
                    <label for="fileKIP">Pilih file</label>
                    <input
                      type="file"
                      id="fileKIP"
                      ref="fileKIP"
                      name="fileKIP"
                      @change="changeFileKIP"
                      hidden
                    />
                    <img :src="fileKIP" alt="" />
                </div>
            </div>
          </div>
            <div class="col-md-4">
             <div class="box-pasca">
                  <p>Upload Ijazah</p>
                  <div class="form">
                    <label for="fileIjazah">Pilih file</label>
                    <input
                      type="file"
                      id="fileIjazah"
                      ref="fileIjazah"
                      name="fileIjazah"
                      @change="changeFileIjazah"
                      hidden
                    />
                    <img :src="fileIjazah" alt="" />
                </div>
            </div>
          </div>
            <div class="col-md-4">
             <div class="box-pasca">
                  <p>Upload KK</p>
                  <div class="form">
                    <label for="fileKK">Pilih file</label>
                    <input
                      type="file"
                      id="fileKK"
                      name="fileKK"
                      ref="fileKK"
                      @change="changeFileKK"
                      hidden
                    />
                    <img :src="fileKK" alt="" />
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          <button class="btn btn-primary btn-block" @click="uploadFile">Upload file</button>
          </div>
        </div>
    </section>
    <!--End Card Uupload KIP -->

  </div>
</template>

<script>

export default {
    data(){
        return{
             user_id: this.$store.state.user.id,
             fileKIP:"http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg",
             fileKK:"http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg",
             fileIjazah:"http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg"
        };
    },
    methods:{  
        changeFileKK(e) {
            const fileKK = e.target.files[0];
            this.fileKK = this.$refs.fileKK.files[0];
            this.fileKK = URL.createObjectURL(fileKK);
    },
       changeFileIjazah(e) {
            const fileIjazah = e.target.files[0];
            this.fileIjazah = this.$refs.fileIjazah.files[0];
            this.fileIjazah = URL.createObjectURL(fileIjazah);
    },
       changeFileKIP(e) {
            const fileKIP = e.target.files[0];
            this.fileKIP = this.$refs.fileKIP.files[0];
            this.fileKIP = URL.createObjectURL(fileKIP);
    },
    uploadFile(e){
      this.fileKK = this.$refs.fileKK.files[0];
      this.fileKIP = this.$refs.fileKIP.files[0];
      this.fileIjazah = this.$refs.fileIjazah.files[0];
      // this.kartu = this.$refs.kartu.files[0];
      let formData = new FormData();

      formData.append("user_id", this.user_id);
      formData.append("fileKIP", this.fileKIP);
      formData.append("fileKK", this.fileKK);
      formData.append("fileIjazah", this.fileIjazah);
           axios
        .post("/api/uploadfilekip", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {

          if(res.data.msg !== "failed"){
             this.fileKIP =  "/upload_kip/" + res.data.data.file_kip;
             this.fileKK =  "/upload_kip/" + res.data.data.file_kk;
             this.fileIjazah =  "/upload_kip/" + res.data.data.fileIjazah;
             this.notif("sucsess", "Data berhasil diunggah");
          }else{
             this.fileKIP="http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg";
             this.fileKK="http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg";
             this.fileIjazah="http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg";
             this.notif("Gagal", "Harap isi Biodata","error");
          }
        
        })
        .catch(() => {
          this.notif("error", "Data tidak berhasil diunggah");
        });

    },
     async getImageKip() {
      const res = await this.apiRequest("GET", `/api/uploadfilekip/${this.user_id}`);
      if (res.status == 200) {
        if (res.data.data != null) {
          this.fileKIP = "/upload_kip/" + res.data.data.file_kip;
          this.fileKK =  "/upload_kip/" + res.data.data.file_kk;
          this.fileIjazah =  "/upload_kip/" + res.data.data.file_ijazah;
        }
      } else {
        this.url =
          "http://bppl.kkp.go.id/uploads/publikasi/karya_tulis_ilmiah/default.jpg";
      }
    },

    
    },

  async created() {
    this.getImageKip();
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
</style>