<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="btn btn-danger">
            <slot />
        </button>

        <a v-else-if="as =='a'" class="">
            <slot />
        </a>

        <Link v-else :href="href" class="">
            <slot />
        </Link>
    </div>
</template>
