<script>
import SuccessButton from '../Components/SuccessButton.vue';
export default
  {
    components: { SuccessButton }
}
</script>
<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
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
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <SuccessButton>Search</SuccessButton>
      </form>
    </div>
  </div>
</nav>
</template>