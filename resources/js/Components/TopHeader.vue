<script>
import DropdownLink from '@/Components/DropdownLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

export default {
    components:{ SecondaryButton,Dropdown,DropdownLink},
  props: {
    jobs: Array,
    displayJobs: Array,
    currentPage: Number,
  },
  data() {
    return {
      searchQuery: '',
      searchResults: [],
    };
  },
  methods: {
    handleSearch() {
  const query = this.searchQuery.trim().toLowerCase();

  if (query === '') {
    this.displayJobs = this.jobs;
    this.currentPage = 1;
    return;
  }

  this.displayJobs = this.jobs.filter(job => job.name.toLowerCase().includes(query));
  this.currentPage = 1;
},

  },
};
</script>
<template>
<div class="container">    
<nav class="navbar bg-primary" data-bs-theme="light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
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
      </ul>
      <form class="d-flex" @submit.prevent="handleSearch" role="search">
            <input v-model="searchQuery" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <SecondaryButton type="submit">Search</SecondaryButton>
        </form>
      
      <ul>
      <Dropdown align="right" width="">
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
                </ul>
    </div>
  </div>
</nav>
</div>
</template>