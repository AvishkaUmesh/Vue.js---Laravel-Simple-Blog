<template>
  <the-nav></the-nav>

  <div class="py-4"></div>
  <br /><br /><br />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <form @submit.prevent>
          <h2>Login</h2>

          <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k">
              <p v-for="error in v" :key="error">
                {{ error }}
              </p>
            </div>
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
              v-model="email"
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
              v-model="password"
              required
            />
          </div>

          <button
            type="submit"
            class="btn btn-primary"
            :disabled="loading"
            @click="login"
          >
            Login
          </button>

          <hr />
          <div>
            No account? <router-link to="/auth/register">Register</router-link>
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
      email: null,
      password: null,
      loading: false,
      errors: null,
    }
  },

  methods: {

    async login() {
      this.loading = true;

      try {
        await this.$axios.get('/sanctum/csrf-cookie');
        await this.$axios.post('/login', {
          email: this.email,
          password: this.password,
        });

        login();
        this.$store.dispatch('loadUser');
        this.$router.push('/');

      } catch (error) {
        this.errors = error.response.data.errors;
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
