<template>
  <article class="card mb-4">
    <div class="post-slider">
      <img
        :src="'/images/posts/' + this.image"
        class="card-img-top"
        alt="post-thumb"
      />
    </div>
    <div class="card-body">
      <h3 class="mb-3">
        <router-link
          class="post-title"
          :to="{ name: 'single-post', params: { id: id } }"
          >{{ title }}</router-link
        >
      </h3>
      <ul class="card-meta list-inline">
        <li class="list-inline-item"><i class="ti-calendar"></i>{{ date }}</li>
        <li class="list-inline-item">
          <ul class="card-meta-tag list-inline">
            <li class="list-inline-item">
              <a href="tags.html">Decorate</a>
            </li>
            <li class="list-inline-item">
              <a href="tags.html">Creative</a>
            </li>
          </ul>
        </li>
      </ul>
      <p>
        {{ shoredBody }}
      </p>
      <router-link
        class="btn btn-outline-primary"
        :to="{ name: 'single-post', params: { id: id } }"
        >Read More</router-link
      >
    </div>
  </article>
</template>

<script>
export default {
  props: ['id', 'title', 'body', 'date', 'image'],
  computed: {
    shoredBody() {
      return this.body.substr(0, 250)
    },
  }
}
</script>
