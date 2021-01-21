<template>
  <div>
    <h4>Register</h4>
    <form class="login" @submit.prevent="register">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input
              type="email"
              placeholder="Enter your name"
              class="form-control"
              v-model="name"
              required
            />
          </div>
        </div>
      </div>

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
              placeholder="Enter your password"
              class="form-control"
              v-model="password"
              required
            />
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" style="color: white" type="submit">Register</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      is_admin: null,
    };
  },
  methods: {
    register: function () {
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        is_admin: this.is_admin,
      };
      this.$store
        .dispatch("register", data)
        .then(() => this.$router.push("/"))
        .catch((err) => console.log(err));
    },
  },
};
</script>
