<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
import dayjs from "dayjs";
defineProps({
    lists: Array,
});
const orderStatuses = {
    Pending: { en: "Pending", cn: "处理中" },
    Active: { en: "Active", cn: "活跃" },
    Cancelled: { en: "Cancelled", cn: "已取消" },
};

const dateDiff = (item) => {
    if (dayjs().isBefore(dayjs(item.date_end))) {
        return item.duration - dayjs(item.date_end).diff(dayjs(), "days");
    }
    return item.duration;
};
</script>
<template>
    <AppLayoutNew :title="$t('public.staking')">
        <div class="m-8">
            <div class="flex items-center justify-between">
                <h1>{{ $t("public.staking") }}</h1>
                <Button>
                    <Link :href="route('staking.add')">
                        {{ $t("public.add_new_order") }}
                    </Link>
                </Button>
            </div>
            <p class="text-sm">{{ $t("public.staking_summary") }}</p>

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

            <Card
                class="drop-shadow-lg mt-5"
                v-for="item in lists"
                v-if="lists.length"
            >
                <template #header>
                    <div class="absolute top-0 right-0">
                        <Tag
                            severity="danger"
                            v-if="item.status == 'Cancelled'"
                            >{{
                                orderStatuses[item.status][getActiveLanguage()]
                            }}</Tag
                        >
                        <Tag
                            severity="success"
                            v-if="item.status == 'Active'"
                            >{{
                                orderStatuses[item.status][getActiveLanguage()]
                            }}</Tag
                        >
                        <Tag severity="info" v-if="item.status == 'Pending'">{{
                            orderStatuses[item.status][getActiveLanguage()]
                        }}</Tag>
                    </div>
                    <div class="p-4">
                        {{ $t("public.order_id") }}
                        <span class="font-bold">{{ item.order_id }}</span>
                    </div>
                </template>

                <template #content>
                    <div class="divide-y">
                        <div class="flex space-x-4 items-center py-8">
                            <Avatar
                                image="/images/logo/logo-03.png"
                                size="xlarge"
                            />
                            <div class="flex-1">
                                <h6>{{ $t("public.staking") }}</h6>
                                <p>$ {{ item.amount }}</p>
                                <p>&#x2248;$ {{ item.float_amount }}</p>
                            </div>
                            <div class="text-right">
                                <h6>{{ $t("public.profit_loss") }}</h6>
                                <p class="text-green-500">
                                    +{{ item.total_percentage }}%
                                </p>
                            </div>
                        </div>

                        <div class="py-8">
                            <div
                                class="flex justify-between items-center"
                                v-if="item.status != 'Pending'"
                            >
                                <div>{{ $t("public.accumulated_profit") }}</div>
                                <div>${{ item.total_profit }}</div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>{{ $t("public.date_apply") }}</div>
                                <div>{{ item.date_apply }}</div>
                            </div>
                            <div
                                class="flex justify-between items-center"
                                v-if="item.status != 'Pending'"
                            >
                                <div>{{ $t("public.date_activate") }}</div>
                                <div>{{ item.date_activate }}</div>
                            </div>
                            <div
                                class="flex justify-between items-center"
                                v-if="item.status == 'Cancelled'"
                            >
                                <div>{{ $t("public.date_cancel") }}</div>
                                <div>{{ item.date_cancel }}</div>
                            </div>
                        </div>
                        <div class="py-8" v-if="item.status == 'Active'">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <p>{{ $t("public.duration") }}</p>
                                    <p>
                                        {{
                                            $t("public.days", {
                                                day: item.duration,
                                            })
                                        }}
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <p>{{ $t("public.end_date") }}</p>
                                    <p>{{ item.date_end }}</p>
                                </div>
                                <div>
                                    <radial-progress-bar
                                        :diameter="75"
                                        :completed-steps="dateDiff(item)"
                                        :total-steps="item.duration"
                                        startColor="#95bbf7"
                                        stopColor="#95bbf7"
                                        innerStrokeColor="#f2f2f2"
                                        :strokeWidth="5"
                                        :innerStrokeWidth="5"
                                    >
                                        {{
                                            $t("public.days", {
                                                day: dateDiff(item),
                                            })
                                        }}
                                    </radial-progress-bar>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </Card>
            <Empty v-else />
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
