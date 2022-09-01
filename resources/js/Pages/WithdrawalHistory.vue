<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
</script>
<template>
    <AppLayoutNew :title="$t('public.auto_receipt_record')">
        <div class="m-8">
            <h1>{{ $t("public.auto_receipt_record") }}</h1>
            <Empty />
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
