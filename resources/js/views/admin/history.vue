<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sejarah</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Halaman Profil</li>
              <li class="breadcrumb-item active">Sejarah</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Tambah Sejarah
                  <Button type="info" ghost>
                    <Icon
                      type="md-create"
                      size="24"
                      @click="isModal = true"
                      color="primary"
                    />
                  </Button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Judul</th>
                      <th>Sejarah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody  v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.title }}</td>
                      <td><div v-html="item.description"></div></td>
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
                          type="info"
                          @click="showDetailModal(item, i)"
                          ghost
                        >
                          <Icon type="md-eye" size="24" color="info" />
                        </Button>
                        <Button
                          type="error"
                          @click="deleteAnnounce(item, i)"
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
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <Page
                    :total="pageInfo.total"
                    :current="pageInfo.current_page"
                    :page-size="parseInt(pageInfo.per_page)"
                    @on-change="getAnnounce"
                    v-if="pageInfo"
                  />
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    <!-- add Announcement Modal -->
    <Modal
      v-model="isModal"
      title="Tambah Pengumuman"
      width="820"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="inputMapel">Judul Sejarah</label>
        <Input type="text" v-model="form.title" placeholder="Judul"> </Input>
      </div>
      <div class="form-group">
        <label for="inputMapel">Sejarah</label>
        <ckeditor v-model="form.desc"></ckeditor>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal = false">Keluar</Button>
        <Button type="primary" @click="addAnounce" :disabled="isAdding">
          {{ isAdding ? "menambahkan..." : "Tambah" }}</Button
        >
      </div>
    </Modal>

    <!-- edit Announcement Modal -->
    <Modal
      v-model="isModal1"
      title="Edit Pengumuman"
      width="820"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="inputMapel">Judul Sejarah</label>
        <Input type="text" v-model="editForm.title" placeholder="Judul">
        </Input>
      </div>
      <div class="form-group">
        <label for="inputMapel">Sejarah</label>
        <ckeditor v-model="editForm.desc"></ckeditor>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal1 = false">Keluar</Button>
        <Button type="primary" @click="editAnnounce" :disabled="isAdding">
          {{ isAdding ? "mengubah..." : "Ubah" }}</Button
        >
      </div>
    </Modal>

    <Modal
      v-model="isModal2"
      :title="showForm.title"
      width="820"
      :mask-closable="false"
    >
      <div class="post">
        <!-- <div class="user-block">
          <img class="img-circle img-bordered-sm" src="https://www.w3schools.com/w3images/avatar2.png" alt="user image" />
          <span class="username">
            <a href="#">Admin</a>
          </span>
          <span class="description">Shared publicly - 7:30 PM today</span>
        </div> -->
        <!-- /.user-block -->
        <div v-html="showForm.desc"></div>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal2 = false">Keluar</Button>
      </div>
    </Modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      form: {
        title: "",
        desc: "",
        file: "",
      },
      editForm: [],
      showForm: [],
      isModal: false,
      isModal1: false,
      isModal2: false,
      isAdding: false,
      pageInfo: null,
      total: 10,
      index: -1,
    };
  },
  methods: {
    async editAnnounce() {
      this.isAdding = true;
      this.isModal1 = false;
      const res = await this.apiRequest(
        "put",
        "/api/announcement",
        this.editForm
      );
      if (res.status == 200) {
        this.notif("Berhasil", "Data berhasil diubah", "success");
        this.isAdding = false;
        this.getAnnounce();
      }
    },
    async getAnnounce() {
      const res = await this.apiRequest("GET", "/api/announcements");
      if (res.status == 200) {
        this.data = res.data.data;
        this.pageInfo = res.data;
      }
    },

    async addAnounce() {
      this.isAdding = true;
      const res = await this.apiRequest("POST", "/api/announcement", this.form);
      if (res.status == 200) {
        this.data.unshift(res.data.data);
        this.isModal = false;
        this.form.title = '';
        this.form.desc = '';
        this.isAdding = false;
        this.notif("Berhasil", "Data berhasil ditambah", "success");
      }
    },

    orderNumber(i) {
      return this.pageInfo.current_page * this.total - this.total + i + 1;
    },

    showEditModal(item, i) {
      let tmp = {
        id: item.id,
        title: item.title,
        desc: item.description,
      };
      this.isModal1 = true;
      (this.editForm = tmp), (this.index = i);
    },

    showDetailModal(item, i) {
      this.isModal2 = true;
      let tmp = {
        id: item.id,
        title: item.title,
        desc: item.description,
      };

      this.showForm = tmp;
    },

    deleteAnnounce(item, i) {
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
          this.apiRequest("delete", "/api/announcement/", item).then((res) => {
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
  },

  async created() {
    this.getAnnounce();
  },
};
</script>
