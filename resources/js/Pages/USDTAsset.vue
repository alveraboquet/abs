<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";
import { computed, ref, watch } from "vue";
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
    { name_en: "Topup", name_cn: "充值", value: "topup" },
    { name_en: "Staking", name_cn: "质押", value: "staking" },
    { name_en: "Staking Refund", name_cn: "质押退款", value: "staking_refund" },
];

const currentItem = ref("all");
watch(currentItem, function (newValue) {
    console.log(newValue);
});

const selected = ref(currentItem.value);

const changeSelection = function (l) {
    currentItem.value = l;
};
</script>
<template>
    <AppLayoutNew :title="$t('public.usdt_assets')">
        <div class="m-8">
            <div class="flex justify-between">
                <h1>{{ $t("public.usdt_assets") }}</h1>
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
                        <p>${{ curUser.usdt_wallet }}</p>
                    </div>
                </template>
            </Card>
            <Empty />
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
<style scope lang="css"></style>
