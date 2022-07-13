<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" v-if="examStart && examFinish==false">Ujian</h1>
            <h1 class="m-0 text-dark" v-else-if="examFinish">Ujian Selesai</h1>
            <div class="before-start" v-else>
                <h3>Hitung Mundur Ujian</h3>
                <p>Ujian akan dimulai setelah hitung mundur selesai</p>
            </div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ujian</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content" v-if="examStart && examFinish==false">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"
                ><i class="fas fa-clock"></i
              ></span>

              <div class="info-box-content">
                <h2 class="info-box-text">
                  {{ displayHours }}:{{ displayMinutes }}:{{ displaySeconds }}
                </h2>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2 p-1" v-for="(item, i) in form1" :key="i">
                    <button
                      type="button"
                      class="btn btn-block btn-warning"
                      @click="current(i)"
                      v-if="i == index && item.doubt == 1"
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-primary"
                      @click="current(i)"
                      v-else-if="i == index && item.finish == false"
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-outline-warning"
                      @click="current(i)"
                      v-else-if="item.doubt == 1"
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-success"
                      @click="current(i)"
                      v-else-if="item.finish == true && i == index"
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-outline-success"
                      @click="current(i)"
                      v-else-if="item.finish == true"
                    >
                      {{ i + 1 }}
                    </button>
                    <button
                      type="button"
                      class="btn btn-block btn-outline-primary"
                      @click="current(i)"
                      v-else
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
                  <div class="form-group" v-if="data.length">
                    <div v-html="data[index].question" ></div>
                  </div>
                  <div class="form-group">
                    <p>Pilih jawaban </p>
                  </div>
                  <div class="form-group" for="customRadio1" >
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
                          class="custom-control-label"
                          ><span style="font-weight: thin"
                          v-if="data.length"
                            >A. {{data[index].pil_a}}</span
                          ></label
                        >
                      </div>
                    </div>
                    <div class="card p-2" v-if="form1.length">
                      <div class="custom-control custom-radio" >
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
                
                >
                  <button
                    type="submit"
                    @click.prevent="previous()"
                    class="btn btn-primary"
                  >
                    <i class="fas fa-angle-double-left"></i> Sebelumnya
                  </button>
                  <div
                    class="custom-control custom-checkbox btn btn-outline-warning" v-if="form1.length"
                  >
                    <input
                      class="custom-control-input p-2"
                      type="checkbox"
                      v-model="form1[index].doubt"
                      id="customCheckbox1"
                      v-bind:value="1"
                      style="background-color: yellow"
                      v-if="form1[index].doubt == 1"
                    />
                    <input
                      class="custom-control-input p-2"
                      type="checkbox"
                      v-model="form1[index].doubt"
                      id="customCheckbox1"
                      v-bind:value="1"
                      style="background-color: yellow"
                      v-else
                    />
                    <label
                      for="customCheckbox1"
                      style="color: black"
                      class="custom-control-label"
                      >Ragu-ragu
                    </label>
                  </div>
                  <button
                    type="submit"
                    @click.prevent="finish ? addAnswer() : next()"
                    class="btn btn-success"
                  >
                    {{ finish ? "Kirim dan Selesai" : "Kirim dan Lanjutakn"}}
                    <i class="fas fa-angle-double-right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section v-if="examStart == false && examFinish==false">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="card">
              <div class="card-body">
                <div class="view">
                  <h1>{{displayDays_}}</h1>
                  <p>Hari</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-1">
            <h1>:</h1>
          </div>
          <div class="col-md-2">
            <div class="card">
              <div class="card-body">
                 <div class="view">
                  <h1>{{displayHours_}}</h1>
                  <p>Jam</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-1">
            <h1>:</h1>
          </div>
          <div class="col-md-2">
            <div class="card">
              <div class="card-body">
                 <div class="view">
                  <h1>{{displayMinutes_}}</h1>
                  <p>Menit</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-1">
            <h1>:</h1>
          </div>
          <div class="col-md-2">
            <div class="card">
              <div class="card-body">
                 <div class="view">
                  <h1>{{displaySeconds_}}</h1>
                  <p>Detik</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section v-if="examFinish">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                 <div class="view">
                  <p>Terimakasih telah mengerjakan ujian, tunggu pengumuman untuk melihat hasil</p>
                </div>
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
      data: [],
      form: {
        question_id: null,
        user_id: null,
        key_answer: "",
        answer: "",
        doubt: false,
        finish: null,
      },
      form1: [],
      index: 0,
      finish: false,
      displayDays: 0,
      displayHours: 0,
      displayMinutes: 0,
      displaySeconds: 0,
      displayDays_: 0,
      displayHours_: 0,
      displayMinutes_: 0,
      displaySeconds_: 0,
      user_id: this.$store.state.user.id,
      now: 0,
      end: 0,
      examStart: false,
      examFinish: false,
      distance: 0,
      isAddAll: false
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
    // this.getSchedule_();
    this.showRemaining();
    this.showCountdown();
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
      if (
        this.form1[this.index].answer != "" &&
        this.form1[this.index].answer != null
      ) {
        this.form1[this.index].finish = true;
      }
      if (this.form1[this.index].doubt == 0) {
        this.form1[this.index].doubt = null;
      }
      this.form1[this.index] = {
        question_id: this.data[this.index].id,
        user_id: this.$store.state.user.id,
        answer: this.form1[this.index].answer,
        doubt: this.form1[this.index].doubt,
        key_answer: this.data[this.index].key_answer,
        finish: this.form1[this.index].finish,
        index: this.index,
      };
      
      const sendData ={
              question_id: this.data[this.index].id,
              user_id: this.$store.state.user.id,
              answer: this.form1[this.index].answer,
              doubt: this.form1[this.index].doubt,
              key_answer: this.data[this.index].key_answer,
              finish: this.form1[this.index].finish,
              index: this.index,
      }
     
     if(!this.isAddAll){ 
      this.addArray(this.form1);
     }else{
       this.postData(sendData)
     }
     
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

    addAnswer() {
      if (
        this.form1[this.index].answer != "" &&
        this.form1[this.index].answer != null &&
        this.form1[this.index].answer != 0
      ) {
        this.form1[this.index].finish = true;
      }
      if (this.index + 1 <= this.data.length) {
        this.form1[this.index] = {
          question_id: this.data[this.index].id,
          user_id: this.$store.state.user.id,
          answer: this.form1[this.index].answer,
          doubt: this.form1[this.index].doubt,
          key_answer: this.data[this.index].key_answer,
          finish: this.form1[this.index].finish,
          index: this.index,
        };
      }

      this.addArray(this.form1);

      this.notif("Berhasil", "Jawaban Anda telah disimpan", "success");
      
    },

    formatNumber: (num) => (num < 10 ? "0" + num : num),

    showCountdown() {
      const timer = setInterval(() => {
        if(this.end != 0){
          if (new Date() >= this.now) {
            this.now = new Date();
            this.distance = this.end - this.now.getTime();
            if (this.distance < 0) {
              this.examFinish = true
              clearInterval(timer);
              return;
            }

            const days = Math.floor(this.distance / this._days);
            const hours = Math.floor((this.distance % this._days) / this._hours);
            const minutes = Math.floor(
              (this.distance % this._hours) / this._minutes
            );
            const seconds = Math.floor(
              (this.distance % this._minutes) / this._seconds
            );
            this.displayHours = this.formatNumber(hours);
            this.displayMinutes = this.formatNumber(minutes);
            this.displaySeconds = this.formatNumber(seconds);
          }
        }
      }, 1000);
    },
    showRemaining() {
      const countdown = setInterval(() => {
        if(this.now!=0){
          const start = new Date();
            const finish =  this.now
            const distance =  finish.getTime() - start.getTime()

            if(distance < 0 ){
                this.examStart = true
                clearInterval(countdown)
                return;
            }
            const days = Math.floor(distance / this._days);
            const hours = Math.floor((distance % this._days) / this._hours);
            const minutes = Math.floor(
              (distance % this._hours) / this._minutes
            );
            const seconds = Math.floor(
              (distance % this._minutes) / this._seconds
            );
            this.displayDays_ = this.formatNumber(days);
            this.displayHours_ = this.formatNumber(hours);
            this.displayMinutes_ = this.formatNumber(minutes);
            this.displaySeconds_ = this.formatNumber(seconds);
          
          }

      }, 1000);
    },
    async getSchedule() {
      const res = await this.apiRequest("get", "/api/date");
      if (res.status == 200) {
        const year = res.data.date.split("-")[0];
        const month = res.data.date.split("-")[1];
        const date = res.data.date.split("-")[2];
        const start_hour = res.data.start_time.split(":")[0];
        const start_minute = res.data.start_time.split(":")[1];
        const start_second = res.data.start_time.split(":")[2];
        const end_hour = res.data.end_time.split(":")[0];
        const end_minute = res.data.end_time.split(":")[1];
        const end_second = res.data.end_time.split(":")[2];

        this.now = new Date(
          year,
          month - 1,
          date,
          start_hour,
          start_minute,
          start_second
        );

        this.end = new Date(
          year,
          month - 1,
          date,
          end_hour,
          end_minute,
          end_second
        );
      }
    },

    async getSchedule_() {
      const res = await this.apiRequest("get", `/api/date_/${this.user_id}`, );
      const dateTime = res.data[0].schedule;
      if (res.status == 200) {

        const year = dateTime.date.split("-")[0];
        const month = dateTime.date.split("-")[1];
        const date = dateTime.date.split("-")[2];
        const start_hour = dateTime.start_time.split(":")[0];
        const start_minute = dateTime.start_time.split(":")[1];
        const start_second = dateTime.start_time.split(":")[2];
        const end_hour = dateTime.end_time.split(":")[0];
        const end_minute = dateTime.end_time.split(":")[1];
        const end_second = dateTime.end_time.split(":")[2];

        this.now = new Date(
          year,
          month - 1,
          date,
          start_hour,
          start_minute,
          start_second
        );
        this.end = new Date(
          year,
          month - 1,
          date,
          end_hour,
          end_minute,
          end_second
        );
      }
    },

    async postData(data){
      const res = await this.apiRequest("post", "/api/dataone", data);
      if (res.status == 200) {
      }
    },

    async addArray(data) {
      const res = await this.apiRequest("post", "/api/data", data);
      if (res.status == 200) {
        this.isAddAll = true
      }
    },

    async getForm() {
      const res = await this.apiRequest("get", `/api/data/${this.user_id}`);
      if (res.status == 200) {
        if (res.data.length <= this.data.length) {
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
          for(let j = 0; j<res.data.length;j++){
            this.form1.splice(res.data[j].index, 1, res.data[j])
          }
      }
    },
  },
  async created() {
    this.getSchedule_();
    this.getSoal();
    this.getForm();
  },
};
</script>

<style scoped>
    .col-md-1{
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .view{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .view h1{
      font-size: 50px;
    }


</style>