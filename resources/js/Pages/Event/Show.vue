
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
defineProps({event:Object,});
</script>
<template>
    <AppLayout title="Show">
        <template #header>
            <h2 class="text-danger-emphasis">Show</h2>
        </template>

        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h1>{{ event.title }}</h1>
                                <p>{{ event.start_date }}</p>
                                <p>{{ event.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


