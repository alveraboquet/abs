<script setup>
import { computed, ref, watch } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const show = ref(true);
const style = computed(
    () => usePage().props.value.jetstream.flash?.bannerStyle || "success"
);
const message = computed(
    () => usePage().props.value.jetstream.flash?.banner || ""
);

watch(message, async () => {
    show.value = true;
});
</script>

<template>
    <Message
        v-if="show && message"
        :severity="style == 'danger' ? 'error' : style"
        :closable="false"
        >{{ message }}</Message
    >
</template>
