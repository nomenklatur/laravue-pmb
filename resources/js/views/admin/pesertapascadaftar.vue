<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peserta Terdaftar</h1>
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
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i" >
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.username }}</td>
                      <td>Terdaftar</td>
                      <td align="center">
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

     <Modal v-model="showModal" title="Pilih Status" :mask-closable="false">

      <div class="form-group">
        <label class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
          <Select
            style="width: 200px"
            v-model="form.status"
            placeholder="Pilih status"
          >
            <Option :value="'success'" :key="1">Aktifkan</Option>
            <Option :value="'rejected'">Tolak</Option>
          </Select>
        </div>
      </div>

        <div class="form-group">
        <label class="col-sm-4 col-form-label">Catatan</label>
        <div class="col-sm-12">
          <Input v-model="form.catatan" maxlength="1001" show-word-limit type="textarea" placeholder="Beri catatan..." style="width: 30em" />
        </div>
      </div>

      <div slot="footer">
        <Button type="default" @click="showModal = false">Keluar</Button>
        <Button type="primary" @click="activateParticipant">
          {{ isAdding ? "mengirim..." : "Kirim" }}
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
        showModal: false,
        isAdding : false,
        index :-1,
        file_id:null,
        user_id:null,
        form :{
          activated:'0',
          status:'',
          catatan:'',
          id_file:null,
          id_select_user : null
        },
        
    };
  },

  methods: {
    async getParticipant(page = 1) {
      const res = await this.apiRequest(
        "get",
        `/api/participantspasca?page=${page}&total=${this.total}`
      );
      const dataArr = res.data.data.filter(item=>{
        return item.activated == '0' && item.file==null || item.file.status=='start'
      })

      if (res.status) {
        this.data = dataArr;
        this.pageInfo = res.data;
      }
    },

    showModalFunc(item, i){
        if(item.file){
            this.file_id = item.file.id
        }
        this.user_id = item.id
        this.showModal = true
    },

    async activateParticipant(){
      if(this.form.status=='success'){
          this.form.activated = '1';
      }
      this.form.id_file = this.file_id
      if(this.form.status == ''){
          this.notif("Gagal!", "Isi status dan catatan sebelum kirim.", "error");
          return
      }
      this.form.id_select_user = this.user_id
       const res = await this.apiRequest('put', '/api/activeparticipantspasca', this.form);
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

    orderNumber(index) {
      return this.pageInfo.current_page * this.total - this.total + index + 1;
    },
  },

  async created(){
      this.getParticipant()
  }
};
</script>