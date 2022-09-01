<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
defineProps({
    lists: Array,
});

const topupStatuses = {
    Pending: { en: "Pending", cn: "等待审核" },
    Rejected: { en: "Rejected", cn: "已拒绝" },
    Approved: { en: "Approved", cn: "已通过" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.topup_history')">
        <div class="m-8">
            <h1>{{ $t("public.topup_history") }}</h1>
            <p>{{ $t("public.number_records", { number: lists.length }) }}</p>
            <div class="mt-8">
                <div v-for="item in lists" v-if="lists.length">
                    <div class="p-8">
                        <div class="flex justify-between">
                            <p>{{ $t("public.topup") }}</p>
                            <div>
                                <Tag
                                    severity="success"
                                    v-if="item.status == 'Approved'"
                                    >{{
                                        topupStatuses[item.status][
                                            getActiveLanguage()
                                        ]
                                    }}</Tag
                                >
                                <Tag
                                    severity="danger"
                                    v-else-if="item.status == 'Rejected'"
                                    >{{
                                        topupStatuses[item.status][
                                            getActiveLanguage()
                                        ]
                                    }}</Tag
                                >
                                <Tag severity="info" v-else>{{
                                    topupStatuses[item.status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag>
                            </div>
                        </div>
                        <p>+${{ item.original_amount }}</p>
                        <p>
                            {{ $t("public.service_charge") }}: ${{
                                item.processing_fee
                            }}
                        </p>
                        <p>
                            {{ $t("public.total_received") }}: ${{
                                item.actual_amount
                            }}
                        </p>
                        <p>{{ $t("public.TxID") }}: {{ item.TxID }}</p>

                        <p>{{ item.created_at }}</p>
                    </div>
                    <hr />
                </div>
                <Empty v-else />
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
