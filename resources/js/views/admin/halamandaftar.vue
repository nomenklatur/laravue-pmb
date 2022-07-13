<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Daftar</h1>
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
                      <th>Status</th>
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{item.activated}}</td>
                      <td align="center">
                        <Button
                          type="error"
                          ghost
                          @click="activatePage(item, i)"
                          v-if="item.activated=='active'"
                        >
                          Non-Aktifkan
                        </Button>
                        <Button
                          type="primary"
                          ghost
                          @click="activatePage(item, i)"
                          v-else="item.activated=='nonactive'"
                        >
                          Aktifkan
                        </Button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
        data:{
            activated:''
        },
        form :{
          activated:'',
          id_page : null
        },
        
    };
  },

  methods: {
    async getPage(page = 1) {
      const res = await this.apiRequest(
        "get",
        `/api/page`
      );
      if (res.status) {
        this.data = res.data;
      }
    },

    async activatePage(item, i){
       
        if(item.activated =='active'){
            this.form.activated = 'nonaktive';
        }
        if(item.activated == 'nonaktive'){
            this.form.activated = 'active';
        }
      this.form.id_page = item.id
       const res = await this.apiRequest('put', '/api/page', this.form);
       if(res.status == 200){
           this.data = res.data.data
           if(this.data[0].activated == 'nonaktive'){
               return this.notif("Di non-aktifkan!", "Data berhasil di non-aktifkan.", "success");
           }
            return this.notif("Diaktifkan!", "Data berhasil diaktifkan.", "success");
       }
    },
  },

  async created(){
      this.getPage()
  }
};
</script>