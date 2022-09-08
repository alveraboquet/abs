<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
defineProps({
    pending_kyc: Number,
    pending_topup: Number,
});
const orderStatuses = {
    Pending: { en: "Pending", cn: "处理中" },
    Active: { en: "Active", cn: "活跃" },
    Cancelled: { en: "Cancelled", cn: "已取消" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.dashboard')">
        <div class="m-8 space-y-8">
            <h1>{{ $t("public.dashboard") }}</h1>

            <Card>
                <template #content>
                    {{ $t("public.pending_kyc") }}:{{ pending_kyc }}
                </template>
            </Card>

            <Card>
                <template #content>
                    {{ $t("public.pending_topup") }} :{{ pending_topup }}
                </template>
            </Card>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
