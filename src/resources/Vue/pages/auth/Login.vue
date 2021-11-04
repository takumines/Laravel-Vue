<template>
  <section class="row">
    <div class="offset-4 col-md-4">
      <br>
      <h2>ログイン</h2>
      <br>
      <form>
        <div class="form-group">
          <label>Email</label>
          <input
              type="text"
              class="form-control"
              v-model="loginForm.email"
          >
        </div>
        <div class="form-group">
          <label>パスワード</label>
          <input
              type="password"
              class="form-control"
              v-model="loginForm.password"
          >
        </div>
        <div class="form-group">
          <button
              type="button"
              class="btn btn-dark btn-block"
              @click="login"
          >ログイン</button>
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
    }
  },
  data() {
    return {
      loginForm: {
        email: '',
        password: ''
      },
    };
  },
  mounted() {
    this.loginForm.email = 'test';
    this.loginForm.password = this.password;
  },
  methods: {
    login() {
      let params = {
        _token:  this.csrfToken,
        email: this.loginForm.email,
        password: this.loginForm.password
      };
      axios.post('/login', params)
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