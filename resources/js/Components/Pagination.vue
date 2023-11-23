<!-- Pagination.vue -->
<template>
    <div class="row mt-5">
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
            <a class="page-link" @click="changePage(currentPage - 1)">Previous</a>
          </li>
          <li v-for="page in totalPages" :key="page" class="page-item" :class="{ 'active': currentPage === page }">
            <a class="page-link" @click="changePage(page)">{{ page }}</a>
          </li>
          <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
            <a class="page-link" @click="changePage(currentPage + 1)">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      totalPages: Number,
      name: String,
      currentPage: Number,
    },
    methods: {
      changePage(page) {
        if (page >= 1 && page <= this.totalPages) {
          this.$emit('pageChange', page);
        }
      },
    },
  };
  </script>
  