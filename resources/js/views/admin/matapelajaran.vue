<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Mata Pelajaran</li>
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
                  Tambah Mata Pelajaran
                  <Button type="info" ghost @click="showModal = true">
                    <Icon type="md-create" size="24" color="primary" />
                  </Button>
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Mata Pelajaran</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.name }}</td>
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
                          @click="deleteSubject(item, i)"
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
                    @on-change="getSubject"
                    v-if="pageInfo"
                  />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Add subject -->
    <Modal
      v-model="showModal"
      title="Tambah Mata Pelajaran"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="exampleInputEmail1">Mata Pelajaran</label>
        <input
          type="text"
          v-model="form.mapel"
          class="form-control"
          id="exampleInputEmail1"
          placeholder="cth: Matematika"
        />
        <p class="text-danger" v-if="form.mapel == ''">* Wajib diisi</p>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal = false">Keluar</Button>
        <Button type="primary" @click="addSubject" :disabled="isAdding">
          {{ isAdding ? "menambahkan..." : "Tambah" }}
        </Button>
      </div>
    </Modal>

    <!-- Edit subject -->

    <Modal
      v-model="showModal1"
      title="Edit Mata Pelajaran"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="inputMapel">Mata Pelajaran</label>
        <input
          type="text"
          v-model="editForm.name"
          class="form-control"
          id="inputMapel"
          placeholder="cth: Matematika"
        />
        <p class="text-danger" v-if="editForm.name == ''">* Wajib diisi</p>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal1 = false">Keluar</Button>
        <Button type="primary" @click="editSubject" :disabled="isAdding">
          {{ isAdding ? "mengubah..." : "Edit" }}
        </Button>
      </div>
    </Modal>
  </div>
</template>


<script>
export default {
  data() {
    return {
      form: {
        mapel: "",
      },
      editForm: [],
      data: [],
      showModal: false,
      showModal1: false,
      isAdding: false,
      total: 15,
      pageInfo: null,
      index: -1,
    };
  },
  methods: {
    async addSubject() {
      if (this.form.mapel == "") {
        this.notif("Gagal", "Data tidak tidak boleh kosong", "error");
      } else {
        this.isAdding = true;
        this.showModal = false;
        const res = await this.apiRequest("post", "/api/subjects/", this.form);
        if (res.status === 200) {
          this.data.unshift(res.data.data);
          this.form.mapel = "";
          this.notif("Berhasil", "Data berhasil dimasukkan", "success");
          this.isAdding = false;
        } else {
          this.notif("Gagal", "Data tidak berhasil dimasukkan", "error");
          this.isAdding = false;
        }
      }
    },

    async editSubject() {
      this.isAdding = true;
      this.showModal1 = false;
      const res = await this.apiRequest("put", "/api/subjects/", this.editForm);
      if (res.status === 200) {
        this.data[this.index] = this.editForm;
        this.editForm.mapel = "";
        this.notif("Berhasil", "Data berhasil diubah", "success");
        this.isAdding = false;
      } else {
        this.notif("Gagal", "Data tidak berhasil diubah", "error");
        this.isAdding = false;
      }
    },

    async getSubject(page = 1) {
      const res = await this.apiRequest(
        "get",
        `/api/subjects?page=${page}&total=${this.total}`
      );
      if (res.status) {
        this.data = res.data.data;
        this.pageInfo = res.data;
      }
    },

    deleteSubject(item, i) {
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
          this.apiRequest("delete", "/api/subjects/", item).then((res) => {
            if (res.status === 200) {
              this.data.splice(i, 1);
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

    orderNumber(index) {
      return this.pageInfo.current_page * this.total - this.total + index + 1;
    },
    showEditModal(item, index) {
      let tmp = {
        id: item.id,
        name: item.name,
      };
      this.showModal1 = true;
      this.editForm = tmp;
      this.index = index;
    },
  },

  async created() {
    this.getSubject();
  },
};
</script>

<style scoped>
.text-danger {
  font-style: italic;
  font-size: 10px;
}
</style>