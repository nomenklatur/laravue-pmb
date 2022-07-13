<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Akun</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Akun</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="https://www.w3schools.com/w3images/avatar2.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{user.name}}</h3>

                <p class="text-muted text-center">{{user.role}}</p>
              </div>
            </div>

          </div>
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data diri</h3>
              </div>
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" v-model="user.name" >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" v-model="user.username" >
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" @click.prevent="changeAccount" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>

            <div class="card card-primary">
              <form role="form">
                <div class="card-body">
                  <div class="row">
                      <div class="form-group  col-md-5">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" v-model="user.password" placeholder="password">
                  </div>
                  <div class="form-group  col-md-5">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" class="form-control" v-model="user.konfirPassword" placeholder="Password">
                  </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" @click.prevent="changePassword" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data(){
    return{
      user:{
        id:'',
        name:'',
        username:'',
        password:'',
        role:'',
        konfirPassword:''
      },
    }
  },
  methods: {
    async changeAccount(){
        const res = await this.apiRequest('put', '/api/user', this.user)
    }, 

    async changePassword(){
      if(this.user.password == this.user.konfirPassword){
        const res = await this.apiRequest('put', '/api/user/password', this.user)
        if(res.status == 200){
          this.notif('success', 'Berhasil ubah Password', 'success');
        }
      }else{
        this.notif('error', 'Password tidak sama', 'error');
      }
    }

  },
  created(){
    this.user = this.$store.state.user
  }
}
</script>