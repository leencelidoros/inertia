<script>
import SuccessButton from '../Components/SuccessButton.vue';
import DropdownLink from '../Components/DropdownLink.vue';
import Dropdown from '../Components/Dropdown.vue';

export default
  {
    components: { SuccessButton }
}
</script>
<template>
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
        <li>
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
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <SuccessButton>Search</SuccessButton>
      </form>
      <li>
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
                </li>
    </div>
  </div>
</nav>
</template>