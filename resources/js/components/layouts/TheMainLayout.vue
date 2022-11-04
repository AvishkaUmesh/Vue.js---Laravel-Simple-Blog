<template>
  <section class="section-sm">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <slot></slot>
        </div>
        <side-bar></side-bar>
        <!-- <the-pagination v-if="pagination"></the-pagination> -->
      </div>
    </div>
  </section>
</template>


<script>
import SideBar from '../Home/SideBar.vue';
export default {
  //   props: {
  //     pagination: {
  //       type: Boolean,
  //       required: false,
  //       default: true,
  //     }
  //   },
  components: {
    SideBar,
  }

}
</script>
