<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

</script>
<template>
    <AppLayout title="Features">
        <template #header>
            <h2 class="text-danger-emphasis">
                Features
            </h2>

        </template>
        <template>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <p>Hello {{$page.props.auth.user.name}}, welcome to our first Inertia app!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
