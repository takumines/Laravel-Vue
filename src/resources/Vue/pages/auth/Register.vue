<template>
  <section class="row">
    <div class="offset-4 col-md-4">
      <br>
      <h2>新規登録</h2>
      <br>
      <form>
        <div class="form-group">
          <label>Email</label>
          <input
              type="text"
              class="form-control"
              v-model="registerForm.email"
          >
        </div>
        <div class="form-group">
          <label>パスワード</label>
          <input
              type="password"
              class="form-control"
              v-model="registerForm.password"
          >
        </div>
        <div class="form-group">
          <label>パスワード（確認）</label>
          <input
              type="password"
              class="form-control"
              v-model="registerForm.confirmPassword"
          >
        </div>
        <div class="form-group">
          <button
              type="button"
              class="btn btn-dark btn-block"
              @click="register"
          >新規登録</button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    csrfToken: {
      type: String,
      required: true,
    },
    email: {
      type: String,
      required: false,
      default: '',
    },
    password: {
      type: String,
      required: false,
      default: '',
    },
    confirmPassword: {
      type: String,
      required: false,
      default: '',
    }
  },
  data() {
    return {
      registerForm: {
        email: '',
        password: '',
        confirmPassword: '',
      },
    };
  },
  methods: {
    register() {
      let params = {
        _token:  this.csrfToken,
        email: this.registerForm.email,
        password: this.registerForm.password,
        confirm_password: this.registerForm.confirmPassword,
      };
      axios.post('/register', params)
          .then(function (response) {
            return response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
    },
  }
}
</script>

<style scoped>

</style>