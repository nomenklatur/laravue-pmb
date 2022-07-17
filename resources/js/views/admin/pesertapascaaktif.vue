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
               <Select
                  style="width: 200px"
                  placeholder="Pilih tahun daftar"
                  v-model="tahun"
                  @on-change="filter"
                >
                  <Option :value="0" :key="1">Semua</Option>
                  <Option v-for="(item, i) in dataYear" :key="i" :value="parseInt(item[0].year)">{{item[0].year}}</Option>
                </Select>

                <Select
                  v-model="prodi"
                  style="width: 200px"
                  placeholder="Pilih prodi"
                  @on-change="filter"
                >
                  <Option :value="0" >Semua</Option>
                  <Option v-for="(item, i) in dataProdi" :key="i" :value="item.id">{{item.names}}</Option>
                </Select>
              </div>
              <div class="card-body" style="overflow: auto;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nomor Ujian</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Nomor Hp</th>
                      <th>Prodi</th>
                      <th>Tahun Terdaftar</th>
                      <th>File Rekom</th>
                      <th>File Kartu Peserta</th>
                      <th>File CV</th>
                      <th>File Transkrip</th>
                      <th>File Ijazah</th>
                      <th>File Karya Ilmiah</th>
                      <th>Status</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody  v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.test_number}}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.username }}</td>
                      <td>{{ item.no_hp}}</td>
                      <td>{{ item.prodi.names}}</td>
                      <td>{{ item.year===0 ? '2021' : item.year }}</td>
                      <td><a :href="'/upload_file/'+item.file.file_rekom" v-if="item.file!=null">File Rekom</a></td>
                      <td><a :href="'/print/' + item.id" target="_blank">File Kartu</a></td>
                      <td><a :href="'/upload_file/'+item.file.file_cv" v-if="item.file!=null">File CV</a></td>
                      <td><a :href="'/upload_file/'+item.file.file_transkrip" v-if="item.file!=null">File Transkrip</a></td>
                      <td><a :href="'/print/' + item.file.file_ijazah" v-if="item.file!=null">File Ijazah</a></td>
                      <td><a :href="'/upload_file/'+item.file.file_karyailmiah" v-if="item.file!=null">File Karya Ilmiah</a></td>
                      <td>Aktif</td>
                      <td align="center">   
                          <Button
                            type="primary"
                             :to="'/admin/pesertapascaaktifdetail/'+item.id"
                             ghost
                          >
                          <Icon
                            type="ios-book-outline"
                            size="24"
                            color="error"
                          />
                          </Button>

                            <Button
                            type="error"
                            @click="deleteUser(item, i)"
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
        dataYear:[],
        dataProdi:[],
        pageInfo:null,
        total:15,
        index :-1,
        tahun:'',
        prodi:'',
        tmp:[],
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
        `/api/activeparticipantspasca?page=${page}&total=${this.total}`
      );
      if (res.status) {
        this.data = res.data.data;
        this.tmp = res.data.data;
        this.pageInfo = res.data;
      }
    },
    async activateParticipant(item, i){
      this.form.activated = '1';
      this.form.id_select_user = item.id
       const res = await this.apiRequest('put', '/api/activeparticipant', this.form);
       if(res.status == 200){
         this.getParticipant()
          this.notif("Diaktifkan!", "Status peserta berhasil diubah.", "success");
       }
    },
    async getYear(){
      const res = await this.apiRequest('get', '/api/year');
      this.dataYear = res.data.tahun
    },

    async getProdi(){
      const res = await this.apiRequest('get', '/api/prodi');
      this.dataProdi = res.data.prodi
    },

    change(){
      if(this.tahun === 0 ){
        this.data = this.tmp;
        return;
      }
       this.data = this.tmp.filter(data=> data.year === this.tahun);
    },

    changeProdi(){
      if(this.prodi == null){
          this.data = this.tmp;
          return;
      }

        this.data = this.tmp.filter(data=>data.prodi.id === this.prodi);
    },

    filter(){
        let filterYear = this.tahun;
        let filterProdi = this.prodi;


        this.data = this.tmp.filter(item=>{
          let filtered = true;
          if(filtered){
            if(filterYear!=0){
                filtered = item.year == filterYear;
            }
          }

          if(filtered){
            if(filterProdi!=0){
              filtered = item.prodi.id==filterProdi
            }
          }

          return filtered;
        })
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
      this.getParticipant();
      this.getYear();
      this.getProdi();
  },

  mounted(){
    this.filter()
  }
};
</script>