<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
defineProps({
    lists: Array,
});

const geti18nName = (name) => {
    return `${name}_${getActiveLanguage()}`;
};
</script>
<template>
    <AppLayoutNew :title="$t('public.notification')">
        <div class="m-8 md:mx-20">
            <h1>{{ $t("public.notification") }}</h1>
            <div class="my-8 divide-y">
                <div class="py-4" v-for="item in lists">
                    <Link :href="route('notifications.view', { id: item.id })">
                        <h3>{{ item[`title_${getActiveLanguage()}`] }}</h3>
                        <div
                            class="prose prose-sm max-w-none line-clamp-2"
                            v-html="item[`content_${getActiveLanguage()}`]"
                        ></div>
                        <div>{{ item.created_at }}</div>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
