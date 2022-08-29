<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { usePage } from "@inertiajs/inertia-vue3";
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
    { name: "All", value: "all" },
    { name: "Topup", value: "topup" },
    { name: "Staking", value: "staking" },
    { name: "Staking Refund", value: "staking_refund" },
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
    <AppLayoutNew title="USDT Asset">
        <div class="m-8">
            <div class="flex justify-between">
                <h1>USDT Asset</h1>
                <Button
                    icon="pi pi-filter"
                    class="p-button-rounded p-button-text p-button-plain"
                    @click="openModal"
                />
            </div>

            <Card class="drop-shadow-lg mt-5">
                <template #content>
                    <div class="text-center">
                        <p>Amount</p>
                        <p>${{ curUser.usdt_wallet }}</p>
                    </div>
                </template>
            </Card>
            <Empty />
        </div>
    </AppLayoutNew>
    <Teleport to="body">
        <Dialog
            header="Filter"
            v-model:visible="selectionModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <Listbox
                v-model="selected"
                :options="selection"
                optionLabel="name"
                optionValue="value"
            ></Listbox>
            <template #footer>
                <div class="text-center">
                    <Button label="Confirm" @click="closeModal" autofocus />
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
<style scope lang="css"></style>
