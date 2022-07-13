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
              <li class="breadcrumb-item active">Manajemen Prodi</li>
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
                <h3 class="card-title">
                  Tambah Prodi
                  <Button type="info" ghost @click="showAddModal()">
                    <Icon type="md-create" size="24" color="primary" />
                  </Button>
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!-- <th style="width: 10px">No.</th> -->
                      <th>Nama Prodi</th>
                      <th>Jenjang</th>
                      <th>Kode</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i" >
                      <td>{{item.names}}</td>
                      <td>{{item.level}}</td>
                      <td>{{item.code}}</td>
                      <td align="center">
                        <Button
                          type="primary"
                          @click="showEditModal(item, i)"
                          ghost
                        >
                          <Icon
                            type="ios-create-outline"
                            size="24"
                            color="primary"
                          />
                        </Button>
                        <Button
                          type="error"
                          @click="deleteProdi(item)"
                          ghost
                        >
                          <Icon
                            type="ios-trash-outline"
                            size="24"
                            color="error"
                          />
                        </Button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <Page
                    :total="pageInfo.total"
                    :current="pageInfo.current_page"
                    :page-size="parseInt(pageInfo.per_page)"
                    @on-change="getProdi"
                    v-if="pageInfo"
                  />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <Modal
      v-model="showModal"
      title="Tambah Prodi"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="exampleInputNama">Nama Prodi</label>
        <input
          type="text"
          v-model="form.name"
          class="form-control"
          id="exampleInputEmail1"
        />
      </div>


      <div class="form-group">
        <label for="exampleInputCode">Kode</label>
        <input
          type="number"
          v-model="form.code"
          class="form-control"
          id="exampleInputCode"
        />
      </div>

      <div class="form-group">
        <label for="degress">Jenjang  Prodi</label>
        <select class="form-control" v-model="form.level" id="degress">
            <option disabled value="">Pilih Jenjang Prodi</option>
            <option value="s1">Sarjana (S1)</option>
            <option value="s2">Pascasarjana (S2)</option>
            <option value="s3">Pascasarjana (S3)</option>
        </select>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal = false">Keluar</Button>
        <Button type="primary" @click="editProdi" :disabled="isAdding" v-if="isUpdate">
          {{ isAdding ? "mengubah..." : "Ubah" }}
        </Button>
        <Button type="primary" @click="addProdi" :disabled="isAdding" v-if="!isUpdate">
          {{ isAdding ? "menambahkan..." : "Tambah" }}
        </Button>
      </div>
    </Modal>

  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {
        id: null,
        names: "",
        level:'',
        code:0,
      },
      form :{
          name:'',
          level:'',
          code:null
      },
      showModal: false,
      showModal1: false,
      isAdding: false,
      isUpdate:false,
      total: 15,
      pageInfo: null,
    };
  },

  methods: {
    async getProdi(page = 1) {
      const res = await this.apiRequest("get", `/api/prodi/?page=${page}&total=${this.total}`);
      if (res.status == 200) {
        this.data = res.data.prodi.data;
        this.pageInfo = res.data.prodi;
      }
    },

    async addProdi() {
      const res = await this.apiRequest("post", "/api/prodi", this.form);
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil ditambah", "success");
        this.showModal = false
        this.getProdi();
      }
    },

    async editProdi() {
      const res = await this.apiRequest("PUT", "/api/prodi", this.form);
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil ditambah", "success");
        this.showModal = false;
        this.getProdi();
      }
    },

    showAddModal(){

        this.form.name = '';
        this.form.level='';
        this.form.code='';

        this.showModal = true;
    },

    showEditModal(item){
        const tmp = {
            id   : item.id,
            name : item.names,
            level: item.level,
            code : item.code
        }
        this.isUpdate = true
        this.form = tmp
        this.showModal = true
    },

      deleteProdi(item, i) {
      this.$swal({
        title: "Hapus Data",
        text: "Yakin ingin menghapus data?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, hapus data",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          this.apiRequest("delete", "/api/prodi/", item).then((res) => {
            if (res.status === 200) {
              this.getProdi();
              this.notif("Terhapus!", "Data berhasil dihapus.", "success");
            } else {
              this.notif(
                "Tidak terhapus!",
                "Data tidak berhasil dihapus.",
                "error"
              );
            }
          });
        }
      });
    },
  },

  async created() {
    this.getProdi();
  },
};
</script>