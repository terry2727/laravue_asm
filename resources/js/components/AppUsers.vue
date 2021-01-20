<template>
  <div>
    <h3 class="text-center">All Posts</h3>
    <br />

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="appuser in appusers" :key="appuser.id">
          <td>{{ appuser.name }}</td>
          <td>{{ appuser.address }}</td>
          <td>{{ appuser.phonenumber }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit', params: { id: appuser.id } }"
                class="btn btn-primary"
                >Edit
              </router-link>
              <button class="btn btn-danger" @click="deleteAppUser(appuser.id)">
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      appusers: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/appusers").then((response) => {
      this.appusers = response.data;
    });
  },
  methods: {
    deleteAppUser(id) {
      this.axios
        .delete(`http://localhost:8000/api/appuser/delete/${id}`)
        .then((response) => {
          let i = this.appusers.map((item) => item.id).indexOf(id); // find index of your object
          this.appusers.splice(i, 1);
        });
    },
  },
};
</script>