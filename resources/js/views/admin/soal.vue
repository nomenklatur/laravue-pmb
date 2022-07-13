<template >
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Soal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Soal</li>
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
                <h3 class="card-title">
                  Tambah Soal
                  <Button type="info" ghost @click="showAddModal()">
                    <Icon type="md-create" size="24" color="primary" />
                  </Button>
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Mata Pelajaran</th>
                      <th>Soal</th>
                      <th>Kunci Jawaban</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody v-if="data.length">
                    <tr v-for="(item, i) in data" :key="i" >
                      <td>{{ orderNumber(i) }}</td>
                      <td>{{ item.subject.name }}</td>
                      <td><div v-html="item.question"></div></td>
                      <td align="center">{{ item.key_answer }}</td>
                      <td align="center">
                        <Button
                          type="primary"
                          @click="showEditModal(item, i)"
                          ghost
                        >
                          <Icon
                            type="ios-create-outline"
                            size="24"
                            color="primary"
                          />
                        </Button>
                        <Button
                          type="info"
                          @click="showDetailModal(item, i)"
                          ghost
                        >
                          <Icon type="md-eye" size="24" color="info" />
                        </Button>
                        <Button
                          type="error"
                          @click="deleteSubject(item, i)"
                          ghost
                        >
                          <Icon
                            type="ios-trash-outline"
                            size="24"
                            color="error"
                          />
                        </Button>
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
                    @on-change="getQuestion"
                    v-if="pageInfo"
                  />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- add question Modal -->
    <Modal
      v-model="isModal"
      title="Tambah Soal"
      width="820"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="inputMapel">Mata Pelajaran</label>
        <Select
          v-model="form.subject_id"
          placeholder="Pilih Mata Pelajaran"
          style="width: 200px"
        >
          <Option v-for="item in subjects" :value="item.id" :key="item.id">{{
            item.name
          }}</Option>
        </Select>
      </div>
      <div class="form-group">
        <label for="inputMapel">Soal</label>
        <ckeditor v-model="form.question"></ckeditor>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan A</label>
        <Input
          v-model="form.pil_a"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan B</label>
        <Input
          v-model="form.pil_b"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan C</label>
        <Input
          v-model="form.pil_c"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan D</label>
        <Input
          v-model="form.pil_d"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan E</label>
        <Input
          v-model="form.pil_e"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Kunci jawaban</label>
        <Select
          v-model="form.key_answer"
          placeholder="Pilih Mata Pelajaran"
          style="width: 200px"
        >
          <Option v-for="item in keyAnswer" :value="item" :key="item">{{
            item
          }}</Option>
        </Select>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal = false">Keluar</Button>
        <Button type="primary" @click="addQuestion" :disabled="isAdding">
          {{ isAdding ? "menambahkan..." : "Tambah" }}</Button
        >
      </div>
    </Modal>

    <!-- Edit question Modal -->
    <Modal
      v-model="isModal1"
      title="Tambah Soal"
      width="820"
      :mask-closable="false"
    >
      <div class="form-group">
        <label for="inputMapel">Mata Pelajaran</label>
        <Select
          v-model="editForm.subject_id"
          placeholder="Pilih Mata Pelajaran"
          style="width: 200px"
        >
          <Option v-for="item in subjects" :value="item.id" :key="item.id">{{
            item.name
          }}</Option>
        </Select>
      </div>
      <div class="form-group">
        <label for="inputMapel">Soal</label>
        <ckeditor v-model="editForm.question"></ckeditor>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan A</label>
        <Input
          v-model="editForm.pil_a"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan B</label>
        <Input
          v-model="editForm.pil_b"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan C</label>
        <Input
          v-model="editForm.pil_c"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan D</label>
        <Input
          v-model="editForm.pil_d"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Pilihan E</label>
        <Input
          v-model="editForm.pil_e"
          type="textarea"
          :autosize="{ minRows: 2, maxRows: 5 }"
          placeholder="Isi pilihan jawaban..."
        ></Input>
      </div>

      <div class="form-group">
        <label for="inputMapel">Kunci jawaban</label>
        <Select
          v-model="editForm.key_answer"
          placeholder="Pilih Mata Pelajaran"
          style="width: 200px"
        >
          <Option v-for="item in keyAnswer" :value="item" :key="item">{{
            item
          }}</Option>
        </Select>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal1 = false">Keluar</Button>
        <Button type="primary" @click="editQuestion" :disabled="isAdding">
          {{ isAdding ? "mengubah..." : "Ubah" }}</Button
        >
      </div>
    </Modal>

    <!-- Show question detail -->

    <Modal
      v-model="isModal2"
      title="Detail Soal"
      width="820"
      :mask-closable="false"
    >
      <div class="callout callout-info">
        <p>Mata Pelajaran</p>
        <h5>{{ showForm.subject }}</h5>
      </div>

       <div class="callout callout-info">
        <p>Soal</p>
        <h5 v-html="showForm.question"></h5>
      </div>

      <div class="callout callout-info">
        <p>Pilihan A</p>
        <h5>{{showForm.pil_a}}</h5>
      </div>

       <div class="callout callout-info">
        <p>Pilihan B</p>
        <h5>{{showForm.pil_b}}</h5>
      </div>

      <div class="callout callout-info">
        <p>Pilihan C</p>
        <h5>{{showForm.pil_c}}</h5>
      </div>

      <div class="callout callout-info">
        <p>Pilihan D</p>
        <h5>{{showForm.pil_d}}</h5>
      </div>

       <div class="callout callout-info">
        <p>Pilihan E</p>
        <h5>{{showForm.pil_e}}</h5>
      </div>

      <div class="callout callout-info">
        <p>Kunci Jawaban</p>
        <h5>{{showForm.key_answer}}</h5>
      </div>

      <div slot="footer">
        <Button type="default" @click="isModal2 = false">Keluar</Button>
      </div>
    </Modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      form: {
        subject_id: "",
        question: "",
        pil_a: "",
        pil_b: "",
        pil_c: "",
        pil_d: "",
        pil_e: "",
        key_answer: "",
      },
      editForm: [],
      showForm: [],
      subjects: [],
      isAdding: false,
      isModal: false,
      isModal1: false,
      isModal2: false,
      keyAnswer: ["A", "B", "C", "D", "E"],
      total: 15,
      pageInfo: null,
      index: -1,
    };
  },

  methods: {
    async getQuestion(page=1) {
      const res = await this.apiRequest("get", `/api/questions?page=${page}&total=${this.total}`);
      if (res.status === 200) {
        this.data = res.data.data;
        this.pageInfo = res.data;
      }
    },

    async addQuestion() {
      this.isAdding = true;
      const res = await this.apiRequest("post", "/api/question/", this.form);
      if (res.status === 200) {
        this.data = res.data.data;
        this.isAdding = false;
        this.isModal = false;
        this.notif("Berhasil", "Data berhasil ditambah", "success");
      }
    },

    async editQuestion() {
      this.isAdding = true;
      this.isModal1 = false;
      const res = await this.apiRequest("put", "/api/question/", this.editForm);
      if (res.status === 200) {
        this.data = res.data.data;
        this.notif("Berhasil", "Data berhasil diubah", "success");
        this.isAdding = false;
      } else {
        this.notif("Gagal", "Data tidak berhasil diubah", "error");
        this.isAdding = false;
      }
    },

    async getSubjects() {
      const res = await this.apiRequest("get", "/api/question/subjects");
      if (res.status === 200) {
        this.subjects = res.data;
      }
    },

    deleteSubject(item, i) {
      this.$swal({
        title: "Hapus Data",
        text: "Yakin ingin menghapus data?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, hapus data",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          this.apiRequest("delete", "/api/question/", item).then((res) => {
            if (res.status === 200) {
              this.data.splice(i, 1);
              this.notif("Terhapus!", "Data berhasil dihapus.", "success");
            } else {
              this.notif(
                "Tidak terhapus!",
                "Data tidak berhasil dihapus.",
                "error"
              );
            }
          });
        }
      });
    },

    showEditModal(item, i){
      let tmp = {
        id: item.id,
        subject_id: item.subject_id,
        question: item.question,
        pil_a: item.pil_a,
        pil_b: item.pil_b,
        pil_c: item.pil_c,
        pil_d: item.pil_d,
        pil_e: item.pil_e,
        key_answer: item.key_answer,
      };
      this.isModal1 = true;
      (this.editForm = tmp), (this.index = i);
    },

    showDetailModal(item, i) {
      let tmp = {
        id: item.id,
        subject_id: item.subject_id,
        question: item.question,
        pil_a: item.pil_a,
        pil_b: item.pil_b,
        pil_c: item.pil_c,
        pil_d: item.pil_d,
        pil_e: item.pil_e,
        key_answer: item.key_answer,
        subject: item.subject.name,
      };
      this.isModal2 = true;
      this.showForm = tmp;
    },
    showAddModal(){
      this.form.subject_id = ""
      this.form.question =""
      this.form.pil_a =""
      this.form.pil_b =""
      this.form.pil_c =""
      this.form.pil_d =""
      this.form.pil_e = ""
      this.form.key_answer =""
      this.isModal = true
    },
    orderNumber(index){
        return this.pageInfo.current_page * this.total - this.total + index + 1
    }
  },

  async created() {
    this.getSubjects();
    this.getQuestion();
  },
};
</script>