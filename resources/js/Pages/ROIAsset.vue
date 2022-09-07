<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
import { computed, ref, watch } from "vue";
const props = defineProps({
    lists: Array,
    filters: Object,
});

const curUser = computed(() => usePage().props.value.auth.user);
const selectionModal = ref(false);

const openModal = () => {
    selectionModal.value = true;
};
const closeModal = () => {
    selectionModal.value = false;
    changeSelection(selected.value);
};
const selection = [
    { name_en: "All", name_cn: "全部", value: "all" },
    { name_en: "ROI Bonus", name_cn: "奖金", value: "roi_bonus" },
    { name_en: "Profit Sharing", name_cn: "盈利分配", value: "profit_sharing" },
    { name_en: "Team Sharing", name_cn: "团队分配", value: "team_sharing" },
    {
        name_en: "Same Ranking Sharing",
        name_cn: "同级分配",
        value: "same_ranking_sharing",
    },
    { name_en: "Withdrawal", name_cn: "提现", value: "withdrawal" },
    {
        name_en: "Withdrawal Refund",
        name_cn: "提现退款",
        value: "withdrawal_refund",
    },
    {
        name_en: "Advisor Services",
        name_cn: "顾问服务费",
        value: "advisor_services",
    },
];

const currentItem = ref(props.filters.type);
watch(currentItem, function (newValue) {
    //console.log(newValue);
    Inertia.post(
        route("roi.asset"),
        { type: newValue },
        { preserveState: true }
    );
});

const selected = ref(currentItem.value);

const changeSelection = function (l) {
    currentItem.value = l;
};

const typeLabel = (v) => {
    return selection.find((s) => s.value == v)[`name_${getActiveLanguage()}`];
};
</script>
<template>
    <AppLayoutNew :title="$t('public.roi_assets')">
        <div class="m-8">
            <div class="flex justify-between">
                <div>
                    <h1>{{ $t("public.roi_assets") }}</h1>
                    <p>{{ $t("public.roi_assets_message") }}</p>
                </div>
                <Button
                    icon="pi pi-filter"
                    class="p-button-rounded p-button-text p-button-plain"
                    @click="openModal"
                />
            </div>

            <Card class="drop-shadow-lg mt-5">
                <template #content>
                    <div class="text-center">
                        <p>{{ $t("public.amount") }}</p>
                        <p>${{ curUser.roi_wallet }}</p>
                    </div>
                </template>
            </Card>
            <div class="mt-8">
                <div v-for="item in lists" v-if="lists.length">
                    <div class="p-8">
                        <div class="flex justify-between">
                            <p>{{ typeLabel(item.type) }}</p>
                            <p>{{ item.amount.toFixed(4) }}</p>
                        </div>
                        <p>{{ new Date(item.created_at) }}</p>
                    </div>
                    <hr />
                </div>
                <Empty v-else />
            </div>
            <!-- <div class="mt-8">
                <div v-for="item in lists" v-if="lists.length">
                    <div class="p-8">
                        <div class="flex justify-between">
                            <p>Bonus Type: {{ item.bonus_type }}</p>
                        </div>
                        <p>Order ID: {{ item.order_id }}</p>
                        <p>Amount: {{ item.amount }}</p>
                        <p>Bonus percentage: {{ item.bonus_percentage }}</p>
                        <p>Net Bonus: {{ item.net_bonus }}</p>
                        <p>{{ new Date(item.date_entitle) }}</p>
                    </div>
                    <hr />
                </div>
                <Empty v-else />
            </div> -->
        </div>
    </AppLayoutNew>

    <Teleport to="body">
        <Dialog
            :header="$t('public.filter')"
            v-model:visible="selectionModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <Listbox
                v-model="selected"
                :options="selection"
                :optionLabel="`name_${getActiveLanguage()}`"
                optionValue="value"
            ></Listbox>
            <template #footer>
                <div class="text-center">
                    <Button
                        :label="$t('public.confirm')"
                        @click="closeModal"
                        autofocus
                    />
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
<style scope currentItem="css"></style>
