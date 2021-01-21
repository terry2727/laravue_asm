<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav" v-if="isLoggedIn">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/appusers" class="nav-link">AppUsers</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/devices" class="nav-link">Devices</router-link>
        </li>
        <li class="nav-item">
          <a @click="logout" class="nav-link">Logout</a>
        </li>        
      </ul>
      <ul class="navbar-nav"  v-else>        
        <li class="nav-item">
          <router-link to="/login" class="nav-link" style="float:right">Login</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/register" class="nav-link" style="float:right">Register</router-link>
        </li>
      </ul>
    </nav>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>

<script>
export default {
  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isLoggedIn;
    },
  },
  methods: {
    logout: function () {
      this.$store.dispatch("logout").then(() => {
        this.$router.push("/login");
      });
    },
  },
  created: function () {
    this.$http.interceptors.response.use(undefined, function (err) {
      return new Promise(function (resolve, reject) {
        if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
          this.$store.dispatch(logout);
        }
        throw err;
      });
    });
  },
};
</script>