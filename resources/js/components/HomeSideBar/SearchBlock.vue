<template>
  <!-- Search -->
  <div class="widget">
    <h4 class="widget-title"><span>Search</span></h4>
    <form @submit.prevent="search" class="widget-search">
      <input
        class="mb-3"
        id="search-query"
        v-model.trim="searchQuery"
        type="search"
        placeholder="Type &amp; Hit Enter..."
      />
      <i class="ti-search"></i>
      <button type="submit" class="btn btn-primary btn-block">Search</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchQuery: ''
    }
  },
  methods: {
    search() {
      if (!(this.searchQuery === '')) {
        this.$router.push({ name: 'search', query: { searchTerm: this.searchQuery } })
      }
    }
  }
}
</script>
