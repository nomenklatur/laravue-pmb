<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hasil Ujian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hasil Ujian</li>
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
                      <th style="width: 20%; text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i">
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.username }}</td>
                      <td align="center">
                        <!-- <Button
                          type="primary"
                          @click="showDetail(item, i)"
                          ghost
                        >
                          <Icon
                            type="ios-eye"
                            size="24"
                            color="primary"
                          />
                        </Button> -->
                        <router-link :to="{name:'hasil_user', params:{id:item.id}}"><Icon
                            type="ios-eye"
                            size="24"
                            color="primary"
                          /></router-link>
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
        index :-1
    };
  },

  methods: {
    async getParticipant(page = 1) {
      const res = await this.apiRequest(
        "get",
        `/api/participant?page=${page}&total=${this.total}`
      );
      if (res.status) {
        this.data = res.data.data;
        this.pageInfo = res.data;
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