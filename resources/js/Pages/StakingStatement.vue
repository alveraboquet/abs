<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
defineProps({
    lists: Array,
});
const orderStatuses = {
    Pending: { en: "Pending", cn: "处理中" },
    Active: { en: "Active", cn: "活跃" },
    Cancelled: { en: "Cancelled", cn: "已取消" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.staking-statement')">
        <div class="m-8">
            <h1>{{ $t("public.staking-statement") }}</h1>

            <div class="flex items-stretch space-x-4 mt-4">
                <div>
                    <span>{{ $t("public.daily_profit") }}</span>

                    <div>$0.0000</div>
                </div>
                <div>
                    <span>{{ $t("public.total_profit") }}</span>
                    <div>$0.0000</div>
                </div>
            </div>

            <div v-for="item in lists" v-if="lists.length">
                <div class="p-8">
                    <div class="flex items-center">
                        <Avatar
                            image="/images/logo/logo-03.png"
                            size="xlarge"
                            class="mr-3"
                        />
                        <span class="flex-1"
                            >{{ $t("public.profit") }} : {{ item.amount }}</span
                        >

                        <span class="text-green-500">{{
                            item.bonus_percentage
                        }}</span>
                    </div>
                    <p>{{ item.created_at }}</p>
                </div>
                <hr />
            </div>
            <Empty v-else />
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
