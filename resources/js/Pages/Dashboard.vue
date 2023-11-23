<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import JobCard from '../Components/JobCard.vue';

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="text-primary">
                Dashboard
            </h2>
        </template>
        
    <div class="container">
        <div class="row text-center">
            <JobCard></JobCard>
            <JobCard></JobCard>
            <JobCard></JobCard>
        </div>
    </div>
    </AppLayout>
</template>

