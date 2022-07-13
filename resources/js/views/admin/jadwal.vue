<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Soal</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Soal</li>
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
                  Jadwal
                  <Button type="info" @click="showModal = true" ghost>
                    <Icon type="md-create" size="24" color="primary" />
                  </Button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Agenda</th>
                      <th>Tanggal</th>
                      <th>Waktu mulai</th>
                      <th>Waktu akhir</th>
                      <th>Status</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.agenda }}</td>
                      <td>{{ item.date }}</td>
                      <td>{{ item.start_time }}</td>
                      <td>{{ item.end_time }}</td>
                      <td align="center">
                        {{ item.status == 1 ? "Aktif" : "Tidak Aktif" }}
                      </td>
                      <td align="center">
                        <Button type="primary" @click="showEditModal(item, i)" ghost>
                          <Icon
                            type="ios-create-outline"
                            size="24"
                            color="primary"
                          />
                        </Button>
                        <Button type="error" ghost>
                          <Icon
                            type="ios-trash-outline"
                            size="24"
                            color="error"
                            @click="deleteSchedule(item, i)"
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
                    @on-change="getSchedule"
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
    <!-- Add schedule -->
    <Modal v-model="showModal" title="Tambah Jadwal" :mask-closable="false">
      <div class="form-group">
        <label for="agenda">Agenda</label>
        <input
          type="text"
          class="form-control"
          id="agenda"
          v-model="form.agenda"
          placeholder="kegiatan"
        />
        <p class="text-danger">* Wajib diisi</p>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label">Tanggal</label>
        <div class="col-sm-8">
          <date-picker
            v-model="form.date"
            type="date"
            format="YYYY-MM-DD"
            placeholder="Select date"
          ></date-picker>
        </div>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label"
          >Waktu Mulai</label
        >
        <div class="col-sm-8">
          <date-picker
            v-model="form.start_time"
            type="time"
            format="HH:mm:ss"
            placeholder="Select time"
          >
          </date-picker>
        </div>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label"
          >Waktu Akhir</label
        >
        <div class="col-sm-8">
          <date-picker
            v-model="form.end_time"
            type="time"
            format="HH:mm:ss"
            placeholder="Select time"
          ></date-picker>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
          <Select
            v-model="form.status"
            style="width: 200px"
            placeholder="Pilih status"
          >
            <Option :value="1" :key="1">Aktif</Option>
            <Option :value="0">Tidak Aktif</Option>
          </Select>
        </div>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal = false">Keluar</Button>
        <Button type="primary" @click="addSchedule">
          {{ isAdding ? "menambahkan..." : "Tambah" }}
        </Button>
      </div>
    </Modal>

    <!-- edit schedule -->

    <Modal v-model="showModal1" title="Edit Jadwal" :mask-closable="false">
      <div class="form-group">
        <label for="agenda">Agenda</label>
        <input
          type="text"
          class="form-control"
          id="agenda"
          v-model="editForm.agenda"
          placeholder="kegiatan"
        />
        <p class="text-danger">* Wajib diisi</p>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label">Tanggal</label>
        <div class="col-sm-8">
          <date-picker
            v-model="editForm.date"
            type="date"
            format="YYYY-MM-DD"
            placeholder="Pilih tanggal"
          ></date-picker>
        </div>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label"
          >Waktu Mulai</label
        >
        <div class="col-sm-8">
          <date-picker
            v-model="editForm.start_time"
            type="time"
            placeholder="Pilih waktu"
          >
          </date-picker>
        </div>
      </div>

      <div class="form-group row">
        <label for="datepicker" class="col-sm-4 col-form-label"
          >Waktu Akhir</label
        >
        <div class="col-sm-8">
          <date-picker
            v-model="editForm.end_time"
            type="time"
            placeholder="Pilih waktu"
          ></date-picker>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
          <Select
            v-model="editForm.status"
            style="width: 200px"
            placeholder="Pilih status"
          >
            <Option :value="1" :key="1">Aktif</Option>
            <Option :value="0">Tidak Aktif</Option>
          </Select>
        </div>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal1=false" >Keluar</Button>
        <Button type="primary" @click="editSchedule">
          {{ isAdding ? "mengubah..." : "Edit" }}
        </Button>
      </div>
    </Modal>
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
      showModal: false,
      showModal1: false,
      data: [],
      form: {
        agenda: "",
        date: null,
        start_time: null,
        end_time: null,
        status: "",
      },
      editForm:[],
      isAdding: false,
      total: 2,
      pageInfo: null,
      index: -1,
    };
  },

  methods: {
    async editSchedule(){
      this.isAdding = true;
      this.editForm.date = this.customDateFormat(this.editForm.date);
      this.editForm.start_time = this.customTimeFormat(this.editForm.start_time);
      this.editForm.end_time = this.customTimeFormat(this.editForm.end_time);
      const res = await this.apiRequest("PUT", "/api/schedule", this.editForm);
      if(res.status == 200){
        this.showModal1 = false;
        this.data = res.data.data;
        this.notif("Berhasil", "Data berhasil diubah", "success");
      }else{
        this.notif("Gagal", "Data tidak berhasil diubah", "error");
      }
    },
    async addSchedule() {
      this.isAdding = true;
      this.form.date = this.customDateFormat(this.form.date);
      this.form.start_time = this.customTimeFormat(this.form.start_time);
      this.form.end_time = this.customTimeFormat(this.form.end_time);
      const res = await this.apiRequest("POST", "/api/schedule", this.form);
      if (res.status == 200) {
        this.form.agenda = "";
        this.form.time = "";
        this.status = "";
        this.isAdding = false;
        this.data.unshift(res.data.data);
        this.showModal = false;
        this.notif("Berhasil", "Data berhasil dimasukkan", "success");
      } else {
        this.notif("Gagal", "Data tidak berhasil ditambah", "error");
      }
    },

    async getSchedule(page = 1) {
      const res = await this.apiRequest(
        "GET",
        `/api/schedules?page=${page}&total=${this.total}`
      );
      if (res.status == 200) {
        this.data = res.data.data;
        this.pageInfo = res.data;
      } else {
      }
    },

    

    orderNumber(i) {
      return this.pageInfo.current_page * this.total - this.total + i + 1;
    },

    customDateFormat(date) {
      return moment(date).format("YYYY-MM-DD");
    },

    customTimeFormat(start) {
      return moment(start).format("HH:mm:ss");
    },

    showEditModal(item, i){
      let tmp ={
        id          : item.id,
        agenda      : item.agenda,
        date        : this.customDateFormat(item.date),
        start_time  : item.start_time,
        end_time    : item.end_time,
        status      : item.status
      }
      this.editForm = tmp
      this.isAdding = false
      this.showModal1 = true
    },
    deleteSchedule(item, i) {
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
          console.log(item)
          this.apiRequest("delete", "/api/schedules/", item).then((res) => {
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
    this.getSchedule();
  },
};
</script>


