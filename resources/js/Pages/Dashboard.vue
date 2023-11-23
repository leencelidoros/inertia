<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JobCard from '@/Components/JobCard.vue';

const fetchData = async () => {
  try {
    const res = await fetch("jobs.json");
    const val = await res.json();
    jobs.value = val;
    console.log(val);
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

const jobs = ref([]);

onMounted(() => {
  fetchData();
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
        <JobCard v-for="job in jobs" :key="job.id" name="job.name"></JobCard>
      </div>
    </div>
  </AppLayout>
</template>
