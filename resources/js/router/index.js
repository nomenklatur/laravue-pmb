import Dashboard from '../views/admin/dashboard';
import Account from '../views/admin/akun';
import Password from '../views/admin/password';
import Peserta from '../views/admin/peserta';
import Soal from '../views/admin/soal';
import Home from '../views/home/index';
import MataPelajaran from '../views/admin/matapelajaran';
import Jadwal from '../views/admin/jadwal';
import Pengumuman from '../views/admin/pengumuman';
import Alur from '../views/admin/alurpendaftaran';
import Uang from '../views/admin/uangkuliah';
import Studi from '../views/admin/programstudi';
import Admin from '../views/admin/manajemenadmin';
import Hasil from '../views/admin/hasil';
import Login from '../views/loginForm';
import Biodata from '../views/users/biodata';
import Ujian from '../views/users/ujian';
import HasilUser from '../views/admin/hasiluser';
import DashboardUser from '../views/users/dashboard'
import store from '../store';
import NotFound from '../views/notfound';
import Sejarah from '../views/admin/history';
import PesertaAktif from '../views/admin/pesertaaktif';
import PesertaPascaDaftar from '../views/admin/pesertapascadaftar';
import PesertaPascaAktif from '../views/admin/pesertapascaaktif'
import HalamanDaftar from '../views/admin/halamandaftar';
import PesertaPending from '../views/admin/pesertapending';
import PesertaTolak from '../views/admin/pesertatolak';
import Prodi from '../views/admin/prodi';
import uploadkip from '../views/users/uploadkip';
import pesertapascaaktifdetail from '../views/admin/pesertapascaaktifdetail';
import pesertaaktifdetail from '../views/admin/pesertaaktifdetail';

const role = store.state.user.role
const routes = [
    {path:'/admin', name:'admin', component:Dashboard, beforeEnter: (to, from, next) => {
        if(store.state.user.role =='admin'){
            next()
        }
        next(false)
    }},
    {path:'/admin/dashboard', name:'dashboard-admin', component:Dashboard, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    // {path:'notfoun', name:'notfoun', component:NotFound},
    {path:'/admin/akun', name:'akun-admin', component:Account , beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/user/akun', name:'akun-user', component:Account,
        beforeEeforeEnter: (to, from, next) => {
            if(store.state.user.role!='user'){
                next(false)
            }
            next()   
           }
    },
    {path:'/admin/password', name:'password', component:Password, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()   
       }
    },
    {path:'/admin/pesertapascadaftar', name:'pesertapascadaftar', component:PesertaPascaDaftar, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/peserta', name:'peserta', component:Peserta, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/pesertaaktif', name:'pesertaaktif', component:PesertaAktif, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/halamandaftar', name:'halamandaftar', component:HalamanDaftar, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/pesertapascaaktif', name:'pesertapascaaktif', component:PesertaPascaAktif, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/pending', name:'pending', component:PesertaPending, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/tolak', name:'tolak', component:PesertaTolak, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/soal', name:'soal', component:Soal, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/homea', name:'Homea', component:Home, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/mata-pelajaran', name:'matapelajaran', component:MataPelajaran, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/jadwal', name:'jadwal', component:Jadwal, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/prodi', name:'prodi', component:Prodi, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/pengumuman', name:'pengumuman', component:Pengumuman, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/alur', name:'alur', component:Alur, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/uang', name:'uang', component:Uang, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/studi', name:'studi', component:Studi, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/user', name:'user-admin', component:Admin, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/hasil', name:'hasil', component:Hasil, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/hasil/:id', name:'hasil_user', component:HasilUser, props:true, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/admin/sejarah', name:'sejarah', component:Sejarah, props:true, beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
    }},
    {path:'/auth', name:'auth', component:Login},
    {path:'/user/auth', name:'auth-user', component:Login},
    {path:'/user/dashboard', name:'user', component:DashboardUser, 
            beforeEnter: (to, from, next) => {
                if(store.state.user.role!='user'){
                    next(false)
                }
                next()   
        }
    },
    {path:'/user', name:'user-dashb', component:Dashboard},
    {path:'/user/biodata', name:'biodata', component:Biodata,
        beforeEnter: (to, from, next) => {
            if(store.state.user.role!='user' || store.state.user.activated=='0'){
                next(false)
            }
            next()   
       }
    },
    {path:'/user/ujian', name:'ujian', component:Ujian,
            beforeEnter: (to, from, next) => {
                if(store.state.user.role!='user' || store.state.user.activated=='0'){
                    next(false)
                }
                next()   
        }
    },
    {path:'/user/uploadkip', name:'uploadkip', component:uploadkip,
    beforeEnter: (to, from, next) => {
        if(store.state.user.role!='user' || store.state.user.activated=='0'){
            next(false)
        }
        next()   
     }
    },
    {path:'/admin/pesertapascaaktifdetail/:id', name:'pesertapascaaktifdetail', component:pesertapascaaktifdetail,
     beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
     }
    },
    {path:'/admin/pesertaaktifdetail/:id', name:'pesertaaktifdetail', component:pesertaaktifdetail, 
     beforeEnter: (to, from, next) => {
        if(store.state.user.role!='admin'){
            next(false)
        }
        next()
     }
    },
]

export default{
    mode:'history',
    linkActiveClass:'active',
    routes
}