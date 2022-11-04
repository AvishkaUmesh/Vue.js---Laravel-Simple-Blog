<template>
  <the-nav></the-nav>

  <div class="py-4"></div>
  <br /><br /><br />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <form @submit.prevent>
          <h2>Register</h2>
          <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k">
              <p v-for="error in v" :key="error">
                {{ error }}
              </p>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input
              type="text"
              class="form-control"
              placeholder="Enter name"
              name="name"
              v-model="user.name"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              name="email"
              v-model="user.email"
              required
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Password"
              name="password"
              v-model="user.password"
              required
            />
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Re-type Password</label>
            <input
              type="password"
              class="form-control"
              placeholder="Re-type Password"
              name="password_confirmation"
              v-model="user.password_confirmation"
              required
            />
          </div>

          <button
            type="submit"
            class="btn btn-primary"
            :disabled="loading"
            @click="register"
          >
            Register
          </button>

          <hr />
          <div>
            Already have an account?
            <router-link to="/auth/login">Login</router-link>
          </div>
        </form>
        <br /><br /><br />
      </div>
    </div>
  </div>
</template>


<script>

import { login } from '../util/auth';
export default {
  data() {
    return {
      user: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      loading: false,
      errors: null,
    }
  },

  methods: {

    async register() {
      this.loading = true;

      try {
        const response = await this.$axios.post('/register', this.user);

        if (201 == response.status) {
          login();
          this.$store.dispatch('loadUser');
          this.$router.push('/');
        }

      } catch (error) {
        this.errors = error.response.data.errors;
        console.log(this.errors);
      }

      this.loading = false;
    },

  }
}
</script>


<style scoped>
p {
  color: red;
}
</style>
