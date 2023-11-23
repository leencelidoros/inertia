<!-- Dashboard.vue -->
<template>
    <AppLayout title="Dashboard">
      <template #header>
        <h2 class="text-primary">
          Dashboard
        </h2>
      </template>
  
      <div class="container">
        <div class="row text-center">
          <div v-for="(jobName, index) in slicedJobs" :key="index" class="col-md-4">
            <JobCard :name="jobName"></JobCard>
          </div>
        </div>
        <Pagination :totalPages="totalPages" :currentPage="currentPage" @pageChange="handlePageChange"></Pagination>
      </div>
    </AppLayout>
  </template>
  
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
      displayJobs.value = jobs.value;
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };
  
  const displayJobs = ref([]);
  const jobs = ref([]);
  const currentPage = ref(1);
  const rows = ref(1);
  const perPage = ref(3);
  
  onMounted(() => {
    fetchData();
  });
  
  const slicedJobs = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return displayJobs.value.slice(start, end);
  });
  
  const totalPages = computed(() => Math.ceil(jobs.value.length / perPage.value));
  
  const handlePageChange = (page) => {
    currentPage.value = page;
  };
  
  </script>
  