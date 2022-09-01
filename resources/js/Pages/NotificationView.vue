<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
defineProps({
    notification: Object,
});
</script>
<template>
    <AppLayoutNew :title="$t('public.notification')">
        <div class="m-20">
            <h1>{{ $t("public.notification") }}</h1>
            <div class="my-8 space-y-8">
                <Image :src="notification.image" image-class="w-3/4 mx-auto" />
                <h3>{{ notification[`title_${getActiveLanguage()}`] }}</h3>
                <div
                    class="prose prose-sm w-full max-w-none"
                    v-html="notification[`content_${getActiveLanguage()}`]"
                ></div>
                <div>{{ notification.created_at }}</div>
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
