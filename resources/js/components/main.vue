<template>
<div class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <Navbar v-if="$store.state.user" ></Navbar>
    <router-view></router-view>
    <Footer v-if="$store.state.user" ></Footer>
  </div>
</div>
</template>

<script>
import Navbar from '../components/layouts/navbar';
import Footer from '../components/layouts/footer';
export default {
  props:['user'],
  components:{Navbar, Footer},
  data(){
    return{
      isLoggin:false
    }
  },
  created(){
    this.$store.commit('updateUser', this.user)
  },
  beforeCreated(){
   
  },
};
</script>
