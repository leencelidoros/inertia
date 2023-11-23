<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-outline-success ">
        <slot />
    </button>
</template>


