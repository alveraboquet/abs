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
        ? "py-4 px-2 h-12 flex items-center justify-between overflow-hidden text-primary text-ellipsis whitespace-nowrap rounded transition duration-300 ease-in-out bg-primary/10"
        : props.disabled
        ? "py-4 px-2 h-12 flex items-center justify-between overflow-hidden text-primary/40 text-ellipsis whitespace-nowrap rounded bg-slate-100"
        : "py-4 px-2 h-12 flex items-center justify-between overflow-hidden text-primary text-ellipsis whitespace-nowrap rounded  hover:bg-primary/10 transition duration-300 ease-in-out";
});
</script>

<template>
    <Link :class="classes" :href="href">
        <div class="flex items-center"><slot /></div>

        <div class="flex items-center">
            <slot name="right"></slot>
            <div v-if="!disabled">
                <i class="pi pi-angle-right"> </i>
            </div>
        </div>
    </Link>
</template>
