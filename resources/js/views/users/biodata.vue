<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Biodata</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Biodata</li>
            </ol>
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
                      v-model="data.name"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tempat Lahir</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.place_of_birth"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Jenis Kelamin</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.gender"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Ibu</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.mother_name"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.date_of_birth)" disabled />
                      </div>
                      <div class="col-md-4">
                        <date-picker
                          v-model="data.date_of_birth"
                          type="date"
                          format="YYYY-MM-DD"
                          placeholder="Select date"
                        ></date-picker>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Agama</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.religion"
                      required
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
                      v-model="data.nik"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NISN</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nisn"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">NPWP</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.npwp"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Kewarganegaraan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.citizenship"
                      required
                    />
                  </div>
                  <div class="col-md-8 mb-3">
                    <label for="validationCustom02">Jalan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nama_jalan"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Dusun</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.dusun"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RT</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.rt"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">RW</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.rw"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-8 mb-3">
                    <label for="validationCustom01">Kelurahan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.kelurahan"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Kode Pos</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.kode_pos"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Kecamatan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.kecamatan"
                      required
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Kabupaten</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.kabupaten"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Jenis Tinggal</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.jenis_tinggal"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Alat Transfortasi</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.alat_transfortasi"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Telepon</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.telepon"
                      required
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Hp</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.hp"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.email"
                      required
                    />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">Penerima KIP</label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="data.kps"
                        name="kps"
                        v-bind:value="'ya'"
                        id="ya"
                      />
                      <label class="form-check-label" for="ya">Ya</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="data.kps"
                        name="kps"
                        v-bind:value="'tidak'"
                        id="tidak"
                      />
                      <label class="form-check-label" for="tidak">Tidak</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom01">No KIP</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nomor_kps"
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
                      v-model="data.nik_ayah"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nama_ayah"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                      <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_ayah)" disabled />
                      </div>
                      <div class="col-md-4">
                        <date-picker
                          v-model="data.tgl_lahir_ayah"
                          type="date"
                          format="YYYY-MM-DD"
                          placeholder="Select date"
                        ></date-picker>
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
                      v-model="data.pendidikan_ayah"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.pekerjaan_ayah"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="data.penghasilan_ayah"
                      required
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
                      v-model="data.nik_ibu"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nama_ibu"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_ibu)" disabled />
                      </div>
                      <div class="col-md-4">
                        <date-picker
                          v-model="data.tgl_lahir_ibu"
                          type="date"
                          format="YYYY-MM-DD"
                          placeholder="Select date"
                        ></date-picker>
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
                      v-model="data.pendidikan_ibu"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.pekerjaan_ibu"
                      required
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="data.penghasilan_ibu"
                      required
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
                <span style="font-style: italic; font-size: 15px">
                  (Jika ada)</span
                >
              </h5>
              <div class="card-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">NIK</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nik_wali"
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.nama_wali"
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control" :value="dateFormat(data.tgl_lahir_wali)" disabled />
                      </div>
                      <div class="col-md-4">
                        <date-picker
                          v-model="data.tgl_lahir_wali"
                          type="date"
                          format="YYYY-MM-DD"
                          placeholder="Select date"
                        ></date-picker>
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
                      v-model="data.pendidikan_wali"
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Pekerjaan</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="data.pekerjaan_wali"
                    />
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Penghasilan</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="data.penghasilan_wali"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button
              type="submit"
              @click.prevent="tambahData"
              class="btn btn-primary btn-block"
              v-if="data.activated == '0'"
            >
              Tambah
            </button>

            <button
              class="btn btn-primary btn-block"
              v-if="data.activated == '1'"
              @click="updateData"
            >
              Ubah
            </button>
          </div>
        </div>
        <br />
      </div>
    </section>
  </div>
</template>

<script>
import moment from "moment";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
export default {
  components: {
    DatePicker,
  },
  data() {
    return {
      data: {
        user_id: null,
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
        kps: "Tidak",
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
        activated: "0",
      },
      user_id: null,
    };
  },
  methods: {
    async getBiodata() {
      this.user_id = this.$store.state.user.id;
      const res = await this.apiRequest(
        "get",
        `/api/user/biodata/${this.user_id}`
      );
      if (res.status == 200 && res.data != "") {
        this.data = res.data;
        this.data.name = this.$store.state.user.name;
      }
    },
    async updateData() {
      this.data.date_of_birth = this.dateFormat(this.data.date_of_birth);
      this.data.tgl_lahir_ayah = this.dateFormat(this.data.tgl_lahir_ayah);
      this.data.tgl_lahir_ibu = this.dateFormat(this.data.tgl_lahir_ibu);
      this.data.tgl_lahir_wali = this.dateFormat(this.data.tgl_lahir_wali);
      const res = await this.apiRequest("put", "/api/user/biodata", this.data);
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil diubah", "success");
      } else {
        this.notif("Gagal", "Data tidak berhasil diubah", "error");
      }
    },
    async tambahData() {
      this.data.date_of_birth = this.dateFormat(this.data.date_of_birth);
      this.data.tgl_lahir_ayah = this.dateFormat(this.data.tgl_lahir_ayah);
      this.data.tgl_lahir_ibu = this.dateFormat(this.data.tgl_lahir_ibu);
      this.data.tgl_lahir_wali = this.dateFormat(this.data.tgl_lahir_wali);

      this.data.user_id = this.$store.state.user.id;
      const res = await this.apiRequest(
        "post",
        "/api/user/biodata/",
        this.data
      );
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil dimasukkan", "success");
      } else {
        this.notif("Gagal", "Data tidak berhasil dimasukkan", "error");
      }
    },
    dateFormat(date) {
      return moment(date).format("YYYY-MM-DD");
    },
  },
  async created() {
    this.getBiodata();
  },
};
</script>