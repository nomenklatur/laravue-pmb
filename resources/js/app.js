

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router';
import routes from './router/index';
import store from './store';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import general from './general';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import CKeditor from 'ckeditor4-vue';


Vue.mixin(general)
Vue.component('home-app', require('./views/home/index').default);
Vue.component('main-app', require('./components/main').default)
Vue.use(VueSweetalert2);
Vue.use(CKeditor);
Vue.use(VueRouter);
Vue.use(ViewUI);;


const router = new VueRouter(routes)




const app = new Vue({
    el: '#app',
    router,
    store
});


router.beforeEach((to, from, next) => {
    
    if(to.matched.some(record => record.meta.isAdmin)){
        if(store.state.user.role=='admin'){
            if(to.path!==""){
                next()
            }else{
                next("auth")
            }
        }else{
            next('/auth')
        }
        
    }else
    {
      
        next();
    }
})

