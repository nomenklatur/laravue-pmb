<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Halaman Depan</li>
              <li class="breadcrumb-item active">Program Studi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Info Program Studi</h3>
              </div>
              <div class="card-body">
                <ckeditor v-model="data.study"></ckeditor>
              </div>
              <div class="card-footer">
                <div class="float-right">
                  <Button type="info" @click="editStudy" v-if="count > 0">
                    Update
                  </Button>
                  <Button type="info" @click="addStudy" v-else> Tambah </Button>
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
      data: {
        id: null,
        study: "",
      },
      count:0
    };
  },

  methods: {
    async getStudy() {
      const res = await this.apiRequest("get", "/api/study");
      if (res.status == 200 && res.data.count != 0) {
        this.data = res.data.data;
        this.count = res.data.count;
      }
    },

    async addStudy() {
      const res = await this.apiRequest("post", "/api/study", this.data);
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil ditambah", "success");
        this.getStudy();
      }
    },

    async editStudy() {
      const res = await this.apiRequest("put", "/api/study", this.data);
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil ditambah", "success");
      }
    },
  },

  async created() {
    this.getStudy();
  },
};
</script>