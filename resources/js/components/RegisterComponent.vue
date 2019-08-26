<template>
  <div @submit="registerUser" class="container mt-2">
    <form>
      <div class="form-group">
        <label for="exampleInputFirstName1">First Name</label>
        <input
          v-model="first_name"
          type="text"
          class="form-control"
          id="exampleInputFirstName1"
          placeholder="First Name"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputLastName1">Last Name</label>
        <input
          v-model="last_name"
          type="text"
          class="form-control"
          id="exampleInputLastName1"
          placeholder="Last Name"
        />
      </div>

      <div class="form-group">
        <label for="exampleInputUsername1">Username</label>
        <input
          v-model="username"
          type="text"
          class="form-control"
          id="exampleInputUsername1"
          placeholder="Username"
        />
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input
          v-model="email"
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter email"
        />
        <small
          id="emailHelp"
          class="form-text text-muted"
        >We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input
          v-model="password"
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="Password"
        />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      username: "",
      first_name: "",
      last_name: "",
      username: "",
      email: "",
      password: ""
    };
  },
  computed: mapGetters(["isAuthenticated"]),
  methods: {
    ...mapActions(["registerNewUser"]),
    async registerUser(e) {
      e.preventDefault();
      const newUser = {
        username: this.username,
        email: this.email,
        password: this.password,
        first_name: this.first_name,
        last_name: this.last_name
      };
      await this.registerNewUser(newUser);
      console.log(isAuthenticated());
    }
  }
};
</script>

<style>
</style>
