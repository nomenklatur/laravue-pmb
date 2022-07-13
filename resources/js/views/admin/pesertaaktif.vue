<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peserta Aktif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Peserta Ujian</li>
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
                <Input suffix="ios-search" v-model="sName" placeholder="Cari nama" @input="search" style="width: auto" />
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Tahun Terdaftar</th>
                      <th>Pilihan Prodi 1</th>
                      <th>Pilihan Prodi 2</th>
                      <th>Bukti Pembayaran</th>
                      <th>Status</th>
                      <th>Jadwal</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i" >
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.username }}</td>
                      <td>{{ item.year===0 ? '2021' : item.year }}</td>
                      <td>{{ item.prodi.names}}</td>
                      <td>{{ item.prodi1? item.prodi1.names : 'Prodi 2 Belum dipilih'}}</td>
                      <td >
                        <a v-if="item.upload" :href="'/images/'+item.upload.image" target="blank" > Bukti Transfer</a>
                      </td>
                      <td>Aktif</td>
                      <td v-if="!item.schedule">
                          <Button
                            type="primary"
                            @click="pilihJadwal(item, i)"
                            ghost
                          >
                          Pilih Jadwal
                        </Button>
                      </td>
                      <td v-else>{{item.schedule.agenda}} | {{item.schedule.start_time}} WIB - {{item.schedule.end_time}} WIB <br>
                         <Button
                            type="primary"
                            @click="pilihJadwal(item, i)"
                            ghost
                          >
                          Ganti Jadwal
                        </Button>
                      </td>
                      <td align="center">
                        <router-link :to="{name:'hasil_user', params:{id:item.id}}"><Icon
                            type="ios-eye"
                            size="24"
                            color="primary"
                          /></router-link>
                          <router-link :to="'/admin/pesertaaktifdetail/' +item.id">
                                <Icon
                                    type="ios-book-outline"
                                    size="24"
                                    color="error"
                                />
                            </router-link>
                          <Button
                            type="error"
                            @click="deleteUser(item, i)"
                            ghost
                          >
                          Hapus
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
                    @on-change="getParticipant"
                    v-if="pageInfo"
                  />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

     <Modal v-model="showModal" title="Pilih Jadwal" :mask-closable="false">

      <div class="form-group">
        <label class="col-sm-4 col-form-label">Jadwal</label>
        <div class="col-sm-8">
          <Select
            v-model="form.jadwalId"
            style="width: 200px"
            placeholder="Pilih Jadwal Ujian"
            v-if="showSchedule"
          >
            <Option v-for="(item, index) in showSchedule" :key="index" :value="item.id">{{item.agenda}}</Option>
          </Select>
        </div>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal = false">Keluar</Button>
        <Button type="primary" @click="addSchedule">
          {{ isAdding ? "menambahkan..." : "Pilih" }}
        </Button>
      </div>
    </Modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
        data:[],
        pageInfo:null,
        total:20,
        index :-1,
        showModal:false,
        isAdding : false,
        showSchedule:[],
        sName:'',
        user_id:null,
        form :{
          jadwalId:null,
          id_select_user : null
        },
    };
  },

  methods: {
    async getParticipant(page = 1) {
      const res = await this.apiRequest(
        "get",
        `/api/activeparticipants?page=${page}&total=${this.total}&name=${this.sName}`
      );
      if (res.status) {
        this.data = res.data.data;
        this.pageInfo = res.data;
      }
    },

    async getSchedule(page = 1) {
      const res = await this.apiRequest(
        "GET",
        `/api/schedules?page=1&total=999999`
      );
      
      if (res.status == 200) {
        this.showSchedule = res.data.data
      } else {
      }
    },

     async activateParticipant(item, i){
      this.form.activated = '1';
      this.form.id_select_user = item.id
       const res = await this.apiRequest('put', '/api/activeparticipant', this.form);
       if(res.status == 200){
         this.getParticipant()
          this.notif("Diaktifkan!", "Peserta berhasil diaktifkan.", "success");
       }
    },

     deleteUser(item, i) {
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
          this.apiRequest("delete", "/api/user/", item).then((res) => {
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

    pilihJadwal(item, index){
      this.showModal = true
      this.user_id = item.id
    },

    async addSchedule(){
        this.isAdding = true
        this.form.id_select_user = this.user_id
        const res = await this.apiRequest('put', '/api/updateschedule', this.form);
          if(res.status == 200){
              this.notif("Diaktifkan!", "Peserta berhasil diaktifkan.", "success");
              this.isAdding = false
              this.showModal = false
          }
    },

    search(){
      this.getParticipant(1);
    },

    orderNumber(index) {
      return this.pageInfo.current_page * this.total - this.total + index + 1;
    },
    
  },

  async created(){
      this.getParticipant();
      this.getSchedule();
  }
};
</script>