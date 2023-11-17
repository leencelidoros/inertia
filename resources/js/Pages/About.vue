
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
                <div class="col">
                            <div>
                               <p class="h1 text-xxl-center text-success-emphasis ">Have unforgettable experiences</p>

                                With its unique cuisine, rich culture, some of the most beautiful beaches in the world, breathtaking waterfalls, and adventure for everyone’s liking, all you have to do is choose the perfect type of tourism for you and be amazed by the wonders of Brazil.
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="/public/images/bling.png" class="rounded float-start" alt="...">
                    <img src="/public/images/rhino.PNG" class="rounded float-end" alt="...">
                </div>
            </div>
        </div>
    </AppLayout>
</template>


