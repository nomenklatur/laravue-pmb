<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Hasil Ujian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Hasil Ujian</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="info-box">
              <div class="info-box-content" v-if="form1.length">
                <table>
                    <tr>
                        <td width="50%" align="center" >Nama Peserta : </td>
                        <td width="50%" align="left" >{{this.userData.name}}</td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="info-box">
              <div class="info-box-content" v-if="form1.length">
                <table>
                    <tr>
                        <td width="50%" align="center" >Jawaban dipilih</td>
                        <td width="50%" align="center" >Kunci Jawaban</td>
                    </tr>
                    <tr>
                        <td width="50%" align="center"><h3>{{form1[index].answer}}</h3></td>
                        <td width="50%" align="center"><h3>{{form1[index].key_answer}}</h3></td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="info-box">
              <div class="info-box-content" v-if="form1.length">
                <table>
                    <tr>
                        <td width="50%" align="center" >Jawaban Benar</td>
                        <td width="50%" align="center" >Jawaban Salah</td>
                    </tr>
                    <tr>
                        <td width="50%" align="center" ><h3  class="btn btn-block btn-outline-success m-2">{{benar}}</h3></td>
                        <td width="50%" align="center" ><h3  class="btn btn-block btn-outline-danger m-2">{{salah}}</h3></td>
                    </tr>
                </table>
                 <table>
                    <tr>
                        <td width="50%" align="center" >Tidak dijawab</td>
                        <td width="50%" align="center" >Total Soal</td>
                    </tr>
                    <tr>
                        <td width="50%" align="center" ><h3  class="btn btn-block btn-outline-warning m-2">{{kosong}}</h3></td>
                        <td width="50%" align="center"><h3  class="btn btn-block btn-outline-primary m-2">{{total}}</h3></td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="info-box">
              <div class="info-box-content center" v-if="form1.length">
                <p class="f-style-s" v-if="graduated">LULUS</p>
                <p class="f-style-f" v-else>TIDAK LULUS</p>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2 p-1" v-for="(item, i) in form1" :key="i">
                    <button
                      type="button"
                      class="btn btn-block btn-success"
                      @click="current(i)"
                      v-if="i == index && item.key_answer!=null  && item.key_answer == item.answer"
                    >
                      {{ i + 1 }}
                    </button>
                     <button
                      type="button"
                      class="btn btn-block btn-outline-success"
                      @click="current(i)"
                      v-if="i != index && item.key_answer!=null && item.key_answer == item.answer "
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-outline-danger"
                      @click="current(i)"
                      v-if="i != index && item.key_answer != item.answer && item.answer !=null"
                    >
                      {{ i + 1 }}
                    </button>
                     <button
                      type="button"
                      class="btn btn-block btn-danger"
                      @click="current(i)"
                      v-if="i == index && item.key_answer != item.answer && item.answer !=null"
                    >
                      {{ i + 1 }}
                    </button>

                    <button
                      type="button"
                      class="btn btn-block btn-warning"
                      @click="current(i)"
                      v-if="i == index && item.answer==null"
                    >
                      {{ i + 1 }}
                    </button>

                    <button
                      type="button"
                      class="btn btn-block btn-outline-warning"
                      @click="current(i)"
                      v-if="i != index && item.answer==null"
                    >
                      {{ i + 1 }}
                    </button>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Soal</h3>
              </div>
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <div v-html="data[index].question" v-if="data.length"></div>
                  </div>
                  <div class="form-group">
                    <p>Pilih jawaban</p>
                  </div>
                  <div class="form-group" for="customRadio1">
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio">
                        <input
                          class="custom-control-input"
                          v-model="form1[index].answer"
                          type="radio"
                          id="customRadio1"
                          name="customRadio"
                          v-bind:value="'A'"
                        />
                        <label
                          for="customRadio1"
                          v-if="data.length"
                          class="custom-control-label"
                          ><span style="font-weight: thin"
                            >A. {{ data[index].pil_a }}</span
                          ></label
                        >
                      </div>
                    </div>
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio">
                        <input
                          class="custom-control-input"
                          v-model="form1[index].answer"
                          type="radio"
                          id="customRadio2"
                          name="customRadio"
                          v-bind:value="'B'"
                        />
                        <label
                          for="customRadio2"
                          v-if="data.length"
                          class="custom-control-label"
                          >B. {{ data[index].pil_b }}</label
                        >
                      </div>
                    </div>
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio">
                        <input
                          class="custom-control-input"
                          v-model="form1[index].answer"
                          type="radio"
                          id="customRadio3"
                          name="customRadio"
                          v-bind:value="'C'"
                        />
                        <label
                          for="customRadio3"
                          v-if="data.length"
                          class="custom-control-label"
                          >C. {{ data[index].pil_c }}</label
                        >
                      </div>
                    </div>
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio">
                        <input
                          class="custom-control-input"
                          v-model="form1[index].answer"
                          type="radio"
                          id="customRadio4"
                          name="customRadio"
                          v-bind:value="'D'"
                        />
                        <label
                          for="customRadio4"
                          v-if="data.length"
                          class="custom-control-label"
                          >D. {{ data[index].pil_d }}</label
                        >
                      </div>
                    </div>
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio">
                        <input
                          class="custom-control-input"
                          v-model="form1[index].answer"
                          type="radio"
                          id="customRadio5"
                          name="customRadio"
                          v-bind:value="'E'"
                        />
                        <label
                          for="customRadio5"
                          v-if="data.length"
                          class="custom-control-label"
                          >E. {{ data[index].pil_e }}</label
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="d-flex justify-content-between m-2"
                  v-if="form1.length"
                >
                  <button
                    type="submit"
                    @click.prevent="previous()"
                    class="btn btn-primary"
                  >
                    <i class="fas fa-angle-double-left"></i> Sebelumnya
                  </button>
                  
                  <button
                    type="submit"
                    @click.prevent="next()"
                    class="btn btn-success"
                  >
                    {{ finish ? "Kirim jawaban" : "Selanjutnya" }}
                    <i class="fas fa-angle-double-right"></i>
                  </button>
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
  props:['id'],
  data() {
    return {
      data: [],
      form: {
        question_id: null,
        user_id: null,
        key_answer: "",
        answer: "",
        doubt: false,
        finish: false,
      },
      form1: [],
      index: 0,
      finish: false,
      displayDays: 0,
      displayHours: 0,
      displayMinutes: 0,
      displaySeconds: 0,
      user_id: this.id,
      benar:0,
      salah:0,
      kosong:0,
      total:0,
      now: 0,
      end: 0,
      distance: 0,
      graduated : false,
      userData:null
    };
  },
  computed: {
    _seconds: () => 1000,
    _minutes() {
      return this._seconds * 60;
    },
    _hours() {
      return this._minutes * 60;
    },
    _days() {
      return this._hours * 24;
    },
  },
  mounted() {
  },
  methods: {
    async getSoal() {
      this.index = 0;
      const res = await this.apiRequest("get", "/api/ujian");
      if (res.status == 200) {
        this.data = res.data;
      }
    },

    next() {
    //   if (
    //     this.form1[this.index].finish == false &&
    //     this.form1[this.index].answer != ""
    //   ) {
    //     this.form1[this.index].finish = true;
    //   }
    //   if(this.form1[this.index].doubt==0){
    //     this.form1[this.index].doubt = null
    //   }
    //   this.form1[this.index] = {
    //     question_id: this.data[this.index].id,
    //     user_id: this.$store.state.user.id,
    //     answer: this.form1[this.index].answer,
    //     doubt: this.form1[this.index].doubt,
    //     key_answer: this.data[this.index].key_answer,
    //     finish: this.form1[this.index].finish,
    //     index: this.index,
    //   };
    //   this.form.doubt = false;
    //   this.form.answer = "";
    //   if (this.index + 1 >= this.data.length - 1) {
    //     this.finish = true;
    //   }
      return (this.index = this.index + 1);
    },

    previous() {
      return (this.index = this.index - 1);
    },

    current(i) {
      if (i >= this.data.length - 1) {
        this.finish = true;
      } else {
        this.finish = false;
      }
      return (this.index = i);
    },

    formatNumber: (num) => (num < 10 ? "0" + num : num),

    async addArray(data) {
      const res = await this.apiRequest("post", "/api/data", data);
      if (res.status == 200) {
        this.form1 = res.data.data;
      }
    },

    async getForm() {
      const res = await this.apiRequest("get", `/api/admin/data/${this.user_id}` );
      console.log(res);
      if (res.status == 200) {
          this.benar = res.data.benar
          this.salah = res.data.salah
          this.kosong = res.data.kosong
          this.total = res.data.total
          this.userData = res.data.user
        if(+this.benar >= 25){this.graduated = true}
        if (res.data.length <=0) {
          for (let i = 0; i < this.data.length; i++) {
            this.form1.push({
              index: i,
              question_id: "",
              user_id: this.$store.state.user.id,
              answer: "",
              key_answer: "",
              doubt: null,
              finish: false,
            });
          }
        }
        this.form1 = res.data.data
      }
    },
  },
  async created() {
    this.getSoal();
    this.getForm();
  },
};
</script>

<style scoped>
  .center{
    text-align: center;
  }

  .f-style-s{
    font-size: 20px;
    color: green;
    font-weight: bold;
    letter-spacing: 5px;
  }

  .f-style-f{
    
    font-size: 20px;
    color: red;
    font-weight: bold;
    letter-spacing: 5px;
  }
</style>