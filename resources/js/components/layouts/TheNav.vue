<template>
  <header class="navigation fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-white">
        <router-link class="navbar-brand order-1" to="/">
          <img
            class="img-fluid"
            src="@/assets/images/logo.png"
            alt="Reader | Hugo Personal Blog Template"
          />
        </router-link>
        <div
          class="
            collapse
            dont-collapse-sm
            navbar-collapse
            text-center
            order-lg-2 order-3
          "
          id="navigation"
        >
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <router-link
                class="nav-link"
                to="/"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                home <i class="ml-1"></i>
              </router-link>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Categories <i class="ti-angle-down ml-1"></i>
              </a>
              <div class="dropdown-menu">
                <router-link
                  v-for="cat in categories"
                  :key="cat.id"
                  class="dropdown-item"
                  :to="{ name: 'posts-by-category', params: { id: cat.id } }"
                  >{{ cat.name }}</router-link
                >
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

            <li class="nav-item dropdown" v-if="isLoggedIn">
              <a
                class="nav-link"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                >{{ user.name }} <i class="ti-angle-down ml-1"></i>
              </a>
              <div class="dropdown-menu">
                <a
                  v-if="user.isAdmin == 1"
                  class="dropdown-item"
                  href="/admin/dashboard"
                  >Admin Dashboard</a
                >

                <a v-if="user.isAdmin == 0" class="dropdown-item" href="#"
                  >User Profile</a
                >

                <a class="dropdown-item" href="#" @click.prevent="logout"
                  >Logout</a
                >
              </div>
            </li>

            <!-- <li class="nav-item" v-if="isLoggedIn">
              <a class="nav-link" href="shop.html">{{ user.name }}</a>
            </li>
            <li class="nav-item" v-if="isLoggedIn">
              <a class="nav-link" href="#" @click.prevent="logout">Logout</a>
            </li> -->
            <li class="nav-item" v-if="!isLoggedIn">
              <router-link class="nav-link" to="/auth/login">Login</router-link>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <router-link class="nav-link" to="/auth/register"
                >Register</router-link
              >
            </li>
          </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">
          <!-- search -->
          <form @submit.prevent="search" class="search-bar">
            <input
              id="search-query"
              v-model.trim="searchQuery"
              type="search"
              placeholder="Type &amp; Hit Enter..."
            />
          </form>

          <button
            class="navbar-toggler border-0 order-1"
            type="button"
            data-toggle="collapse"
            data-target="#navigation"
          >
            <i class="ti-menu"></i>
          </button>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      searchQuery: ''
    }
  },
  methods: {

    async logout() {
      try {
        this.$axios.post('/logout');
        this.$store.dispatch('logout');
      } catch (error) {
        this.$store.dispatch('logout');
      }
    },

    search() {
      if (!(this.searchQuery === '')) {
        this.$router.push({ name: 'search', query: { searchTerm: this.searchQuery } })
      }
    }
  },
  computed: {
    ...mapState({
      isLoggedIn: 'isLoggedIn',
      user: 'user',
    }),
    categories() {
      return this.$store.getters['categories/getCategories'];
    },

  },
}
</script>

<style scoped>
</style>
