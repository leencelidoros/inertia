<script setup>
import { ref, onMounted, computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JobCard from '@/Components/JobCard.vue';
import Pagination from '@/Components/Pagination.vue';

const fetchData = async () => {
  try {
    const res = await fetch("jobs.json");
    const data = await res.json();
    jobs.value = data.map(job => job.name);
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

const jobs = ref([]);
const currentPage = ref(1);
const rows = ref(1);
const perPage = ref(3);

onMounted(() => {
  fetchData();
});

const slicedJobs = computed(() => {
  const start = (currentPage.value - 1) * rows.value;
  const end = start + perPage.value;
  return jobs.value.slice(start, end);
});
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="text-primary">
        Dashboard
      </h2>
    </template>

    <div class="container">
      <div class="row text-center">
        <JobCard v-for="jobName in slicedJobs" :key="jobName" :name="jobName"></JobCard>
      </div>
      <Pagination :totalPages="Math.ceil(jobs.length / perPage)" :currentPage="currentPage" @pageChange="handlePageChange"></Pagination>
    </div>
  </AppLayout>
</template>

<script>
export default {
  methods: {
    handlePageChange(page) {
      currentPage.value = page;
    }
  }
};
</script>
