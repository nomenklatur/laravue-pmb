import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        user:false
    },

    mutations:{
        updateUser(state, data){
            state.user = data
        }
    }
})