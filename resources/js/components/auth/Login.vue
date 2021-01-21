<template>
  <div>
    <form class="login" @submit.prevent="login">
      <h1>Sign in</h1>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email:</label>
            <input
              type="email"
              placeholder="Enter your email"
              class="form-control"
              v-model="email"
              required
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Password:</label>
            <input
              type="password"
              placeholder="Password"
              class="form-control"
              v-model="password"
              required
            />
          </div>
        </div>
      </div>
      <hr />
      <div class="form-group">
        <button class="btn btn-primary" style="color:white" type="submit">Login</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login: function () {
      let email = this.email;
      let password = this.password;
      this.$store
        .dispatch("login", { email, password })
        .then(() => this.$router.push("/"))
        .catch((err) => console.log(err));
    },
  },
};
</script>