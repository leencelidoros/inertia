<script setup>
import { ref } from 'vue';

import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

</script>



<template>
    <div>
        <Head :title="title" />
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <!-- Navigation Links -->
                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="me-3">
                        Dashboard
                    </NavLink>
                    <NavLink :href="route('features')" :active="route().current('features')" class="me-3">
                        Features
                    </NavLink>
                    <NavLink :href="route('pricing')" :active="route().current('pricing')" class="me-3">
                        Pricing
                    </NavLink>
                    <Dropdown align="right" width="">
                        <template #trigger>
                            <span  class="inline-flex rounded-md">
                            <button class="btn btn secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Select
                            </button>
                            </span>
                        </template>
                        <template #content>
                            <ul>
                            <li><DropdownLink>Action</DropdownLink></li>
                            <li><DropdownLink>Another action</DropdownLink></li>
                            <li><DropdownLink>Something else here</DropdownLink></li>
                            </ul>
                        </template>
                    </Dropdown>

                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button v-if="$page.props.jetstream.managesProfilePhotos" class="btn btn-secondary">
                                <img class="rounded float-start" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </button>

                            <span v-else class="inline-flex rounded-md">
                                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $page.props.auth.user.name }}
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="container text-center">
                                Manage Account

                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>

                            <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                API Tokens
                            </DropdownLink>

                            <div class="border-t border-gray-200" />

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                            </div>
                        </template>
                    </Dropdown>
                </div>

            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>


