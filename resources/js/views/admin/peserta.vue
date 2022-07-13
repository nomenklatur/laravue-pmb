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
                <Input suffix="ios-search" v-model="sName" placeholder="Cari nama" @input="search" style="width: auto" />
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Bukti Pembayaran</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody  v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.username }}</td>
                      <td>Belum aktif</td>
                      <td ><a v-if="item.upload" :href="'/images/'+item.upload.image" target="blank" > Bukti Transfer</a>
                            <p v-else>Belum diunggah</p></td>
                      <td align="center">
                        <Button
                          type="primary"
                          @click="activateParticipant(item, i)"
                          ghost
                        >
                          Aktifkan
                        </Button>
                      
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
        sName:'',
        form :{
          activated:'0',
          id_select_user : null
        },
        
    };
  },

  methods: {
    async getParticipant(page = 1) {
      
      const res = await this.apiRequest(
        "get",
        `/api/participants?page=${page}&total=${this.total}&name=${this.sName}`
      );

      if (res.status) {
        this.data = res.data.data;
        this.pageInfo = res.data;
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

    search(){
      this.getParticipant(1);
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

    orderNumber(index) {
      return this.pageInfo.current_page * this.total - this.total + index + 1;
    },
  },

  async created(){
      this.getParticipant()
  }
};
</script>