<template>
  <div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"
            ><i class="fas fa-bars"></i
          ></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
        <img
          :src="'/images/logo.png'"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">IAKN Tarutung</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              src="https://www.w3schools.com/w3images/avatar2.png"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ this.$store.state.user.name }}</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <div v-if="this.$store.state.user.role == 'admin'">
              <li class="nav-item menu-open">
                <router-link to="/admin/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </router-link>
              </li>
              <li
                class="nav-item menu-open"
                v-if="this.$store.state.user.degress == 'pascasarjana'"
              >

                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>
                    Peserta
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/admin/pesertapascadaftar" class="nav-link">
                      <i class="fa fa-book" aria-hidden="true"></i>
                      <p>Terdaftar</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/pending" class="nav-link">
                      <i class="fa fa-clock" aria-hidden="true"></i>
                      <p>Mengajukan Berkas</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/tolak" class="nav-link">
                      <i class="fa fa-ban" aria-hidden="true"></i>
                      <p>Ditolak</p>
                    </router-link>
                  </li>

               
                </ul>
           
               <li
                class="nav-item menu-open"
                v-if="this.$store.state.user.degress == 'pascasarjana'"
              >
                <router-link to="/admin/pesertapascaaktif" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Peserta Aktif </p>
                </router-link>
              </li>
              <li
                class="nav-item menu-open"
                v-if="this.$store.state.user.degress == 'sarjana'"
              >
                <router-link to="/admin/peserta" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Peserta Daftar</p>
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/pesertaaktif"
                  class="nav-link"
                  v-if="this.$store.state.user.degress == 'sarjana'"
                >
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Peserta Aktif</p>
                </router-link>
              </li>

              <!-- <li class="nav-item menu-open">
            <router-link to="/admin/soal" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Manajemen Soal
              </p>
            </router-link>
          </li> -->

              <li
                class="nav-item has-treeview menu-open"
                v-if="this.$store.state.user.degress == 'sarjana'"
              >
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Manajemen Soal
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul
                  class="nav nav-treeview"
                  v-if="this.$store.state.user.degress == 'sarjana'"
                >
                  <li class="nav-item">
                    <router-link
                      to="/admin/mata-pelajaran"
                      class="nav-link"
                      v-if="this.$store.state.user.degress == 'sarjana'"
                    >
                      <i class="fas fa-stopwatch"></i>
                      <p>Mata Pelajaran</p>
                    </router-link>
                  </li>
                  <li
                    class="nav-item"
                    v-if="this.$store.state.user.degress == 'sarjana'"
                  >
                    <router-link to="/admin/soal" class="nav-link">
                      <i class="fas fa-paste"></i>
                      <p>Soal</p>
                    </router-link>
                  </li>
                </ul>
              </li>

              <li
                class="nav-item has-treeview menu-open"
                v-if="this.$store.state.user.degress == 'sarjana'"
              >
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p>
                    Ujian
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/admin/jadwal" class="nav-link">
                      <i class="fas fa-stopwatch"></i>
                      <p>Jadwal Ujian</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link to="/admin/hasil" class="nav-link">
                      <i class="fas fa-paste"></i>
                      <p>Hasil Ujian</p>
                    </router-link>
                  </li>
                </ul>
              </li>

              <li
                class="nav-item has-treeview menu-open"
                v-if="this.$store.state.user.degress == 'sarjana'"
              >
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tv"></i>
                  <p>
                    Halaman Depan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/admin/pengumuman" class="nav-link">
                      <i class="fas fa-bullhorn"></i>
                      <p>Pengumuman</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/alur" class="nav-link">
                      <i class="fas fa-paste"></i>
                      <p>Alur Pendaftaran</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/uang" class="nav-link">
                      <i class="fas fa-dollar-sign"></i>
                      <p>Uang Kuliah</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/studi" class="nav-link">
                      <i class="fas fa-school"></i>
                      <p>Program Studi</p>
                    </router-link>
                  </li>
                </ul>
              </li>

              <!-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tv"></i>
                  <p>
                    Profil
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/admin/sejarah" class="nav-link">
                      <i class="fas fa-bullhorn"></i>
                      <p>Sejarah</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/visimis" class="nav-link">
                      <i class="fas fa-paste"></i>
                      <p>Visi & Misi</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/pimpinan" class="nav-link">
                      <i class="fas fa-history"></i>
                      <p>Pimpinan</p>
                    </router-link>
                  </li>

                </ul>
              </li> -->

              <!-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tv"></i>
                  <p>
                    Halaman Depan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link to="/admin/pengumuman" class="nav-link">
                      <i class="fas fa-bullhorn"></i>
                      <p>Pengumuman</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/alur" class="nav-link">
                      <i class="fas fa-paste"></i>
                      <p>Alur Pendaftaran</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/uang" class="nav-link">
                      <i class="fas fa-dollar-sign"></i>
                      <p>Uang Kuliah</p>
                    </router-link>
                  </li>

                  <li class="nav-item">
                    <router-link to="/admin/studi" class="nav-link">
                      <i class="fas fa-school"></i>
                      <p>Program Studi</p>
                    </router-link>
                  </li>
                </ul>
              </li> -->
               <li>
                <router-link
                  to="/admin/prodi"
                  class="nav-link"
                  v-if="this.$store.state.user.degress == 'sarjana'"
                >
                  <i class="fas fa-school"></i>
                  <p>Manajemen Prodi</p>
                </router-link>
              </li>
              <li>
                <router-link
                  to="/admin/halamandaftar"
                  class="nav-link"
                  v-if="this.$store.state.user.degress == 'sarjana'"
                >
                  <i class="fas fa-exclamation"></i>
                  <p>Halaman Daftar</p>
                </router-link>
              </li>
            </div>
            <div v-if="this.$store.state.user.role == 'user'">
              <li class="nav-item menu-open">
                <router-link to="/user/dashboard" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </router-link>
              </li>
              <li
                class="nav-item menu-open"
                v-if="this.$store.state.user.activated == '1'"
              >
                <router-link to="/user/biodata" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>Biodata</p>
                </router-link>
              </li>
              <li
                class="nav-item menu-open"
                v-if="
                  this.$store.state.user.activated == '1' &&
                  this.$store.state.user.degress == 'sarjana'
                "
              >
                <router-link to="/user/uploadkip" class="nav-link">
                 <i class="nav-icon far fa-plus-square"></i>
                  <p>Ruang Upload KIP</p>
                </router-link>
              </li>
              <li
                class="nav-item menu-open"
                v-if="
                  this.$store.state.user.activated == '1' &&
                  this.$store.state.user.degress == 'sarjana'
                "
              >
                <router-link to="/user/ujian" class="nav-link">
                  <i class="nav-icon fas fa-pen-alt"></i>
                  <p>Ujian</p>
                </router-link>
              </li>
            </div>
            <li class="nav-header">AKUN</li>

            <li
              class="nav-item menu-open"
              v-if="this.$store.state.user.role == 'admin'"
            >
              <router-link to="/admin/akun" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>Akun</p>
              </router-link>
            </li>

            <li
              class="nav-item menu-open"
              v-if="this.$store.state.user.role == 'user'"
            >
              <router-link to="/user/akun" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>Akun</p>
              </router-link>
            </li>

            <li
              class="nav-item menu-open"
              v-if="this.$store.state.user.role == 'admin'"
            >
              <router-link to="/admin/user" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>Manajemen Admin</p>
              </router-link>
            </li>

            <li class="nav-item menu-open">
              <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLoggin: false,
    };
  },
};
</script>