<template>
<div>
  <div class="navbar">
      <div class="container-login">
         <h1 class="logo-login"><a href="/"><img
            :src="'/images/logo.png'"
            height="43px"
          /><span style="font-size: 19px"> PMB IAKN TARUTUNG</span></a></h1>
      </div>
    </div>
  <div  class="box">
    <div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" v-model="data.username" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" v-model="data.password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" @click.prevent="login" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
        <div class="row">
          <div class="col-12 question">
            <p>Belum punya akun ? <a href="/daftar" >Daftar</a></p>
          </div>
        </div>
    </div>
  </div>
</div>
  </div>
</div>
</template>

<script>
export default {
    data(){
      return {
        data :{
          username:'',
          password:''
        },
        isLoggin : false
      }
    },
    methods:{
      async login(){
        if(this.data.username.trim()=='' || this.data.password.trim()=='') return this.notif("Gagal", "Pastikan username dan password telah diisi", "error")
        const res = await this.apiRequest('post', '/login/', this.data)
        if(res.status == 200){
          this.notif('success', res.data.msg, 'success');
          this.isLoggin = true
          if(res.data.user.role == 'admin'){
            window.location = '/admin/dashboard';
          }else{
            window.location = '/user/dashboard';
          }
        }else{
          this.notif('error', 'Username atau password tidak cocok', 'error');
        }
      }
    }
}
</script>

<style scoped>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&display=swap');
  .navbar, .box{
    font-family: 'Poppins', sans-serif;
  }
  .login-box-msg{
    color: #3490dc;
    font-weight: bold;
    text-align: left;
    margin-left: -1.1em;
  }

  .navbar{
    display: flex;
    align-content: center;
    justify-content: center;
    padding: 1em;
    height: 4.5em;
    background-color: #3490dc;
  }

  .container-login span{
    color: white;
  }

  .box{
    display: flex;
    justify-content: center;
    margin-top: 3.2em;
    height: 100vh;
  }
  
  .login-box{
    padding:1em;
    margin: 2em auto;
  }

  .card{
    border: 1px solid rgba(0,0,0,.125);
  }

  .col-12.question{
    display: flex;
    justify-content: center;
    margin: 1em auto;
  }

</style>