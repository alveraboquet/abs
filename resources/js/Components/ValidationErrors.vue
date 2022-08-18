<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const errors = computed(() => usePage().props.value.errors);
let hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <Message v-if="hasErrors" severity="error" :closable="false">
        <p v-for="(error, key) in errors" :key="key">{{ error }}</p>
    </Message>

    <!-- <div v-if="hasErrors">
        <div class="font-medium text-red-600">
            Whoops! Something went wrong.
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">
                {{ error }}
            </li>
        </ul>
    </div> -->
</template>
