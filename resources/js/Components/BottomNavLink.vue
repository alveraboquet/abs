<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    active: Boolean,
    disabled: Boolean,
});

const classes = computed(() => {
    return props.active
        ? "w-full text-white justify-center inline-block text-center pt-2 pb-1"
        : props.disabled
        ? "w-full text-[#b5b5c3]/20 focus:text-white hover:text-white justify-center inline-block text-center pt-2 pb-1"
        : "w-full text-[#5363af] focus:text-white hover:text-white justify-center inline-block text-center pt-2 pb-1";
});
</script>

<template>
    <Link :class="classes" :href="href">
        <slot />
    </Link>
</template>
