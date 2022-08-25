<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";
import { ref } from "vue";
const curUser = computed(() => usePage().props.value.auth.user);
const form = useForm({
    id_type: "ic",
    id_no: "",
    full_name: curUser.full_name,
    usdt_address: curUser.usdt_address,
});

const id_text = computed(() =>
    form.id_type == "ic" ? "Identification Card" : "Passport"
);
const displayModal = ref(false);

const openModal = () => {
    displayModal.value = true;
};
const closeModal = () => {
    displayModal.value = false;
};
const modalContent = [
    {
        image: "images/BG-11.jpg",
        text: `Upload Identification Card (Front)`,
    },
    {
        image: "images/BG-12.jpg",
        text: `Upload Identification Card (Back)`,
    },
    {
        image: "images/BG-23.png",
        text: `Upload holding Identification Card (ID must be clear)`,
    },
    {
        image: "images/BG-22.png",
        text: `Upload Utilities Bill (Name must same as ID / Passport)`,
    },
    {
        image: "images/BG-21.png",
        text: `Upload Passport`,
    },
    {
        image: "images/BG-24.png",
        text: `Upload holding Passport (Passport  must be clear)`,
    },
    {
        image: "images/BG-22.png",
        text: `Upload Utilities Bill (Name must same as ID / Passport)`,
    },
];

const submit = () => {};
</script>
<template>
    <AppLayoutNew title="KYC">
        <div class="h-screen m-8">
            <div class="flex items-center justify-between">
                <h1>KYC</h1>

                <div>KYC Status <Tag severity="danger">Rejected</Tag></div>
            </div>
            <p class="text-sm my-4">
                Reminder: If you wish to mo dify your KYC & wallet address,
                kindly submit to support@abs.agency, estimate 5-7 working days.
            </p>

            <Card class="!shadow-lg shadow-black/50 my-5">
                <template #content>
                    <div class="text-red-500">
                        <i class="pi pi-times"></i>
                        Testing
                    </div>
                </template>
            </Card>
            <div></div>
            <form @submit.prevent="submit" class="flex-grow-1 space-y-4">
                <h3>Personal Details</h3>
                <div class="field-radiobutton flex space-x-4">
                    <div class="flex items-center">
                        <RadioButton
                            class="mr-4"
                            inputId="idType1"
                            name="idType"
                            value="ic"
                            v-model="form.id_type"
                        />
                        <label for="idType1">Identification Card Number</label>
                    </div>
                    <div class="flex items-center">
                        <RadioButton
                            class="mr-4"
                            inputId="idType2"
                            name="idType"
                            value="passport"
                            v-model="form.id_type"
                        />
                        <label for="idType2">Passport</label>
                    </div>
                </div>

                <div>
                    <h5 class="text-primary">ID Name</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.id_name"
                        placeholder="Type ID Name"
                    />
                </div>
                <div>
                    <h5 class="text-primary">{{ id_text }} Number</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.id_no"
                        placeholder="Type ID No."
                    />
                </div>

                <div>
                    <h5 class="text-primary">Wallet Address TRC20</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.wallet_address"
                        placeholder="Type Address"
                    />
                </div>

                <div class="grid md:grid-cols-2">
                    <div class="m-8 cursor-pointer">
                        <p class="text-bold">
                            Upload Identification Card (Front)
                        </p>
                        <div
                            class="bg-slate-200 text-center p-8"
                            @click="openModal"
                        >
                            <div class="my-auto">
                                <i class="pi pi-upload"></i>
                                <p class="text-xs">
                                    Browse File ( JPEG/PNG/PDF, max 5MB)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="m-8 cursor-pointer">
                        <p class="text-bold">
                            Upload Identification Card (Front)
                        </p>
                        <div
                            class="bg-slate-200 text-center p-8"
                            @click="openModal"
                        >
                            <div class="my-auto">
                                <i class="pi pi-upload"></i>
                                <p class="text-xs">
                                    Browse File ( JPEG/PNG/PDF, max 5MB)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="m-8 cursor-pointer">
                        <p class="text-bold">
                            Upload Identification Card (Front)
                        </p>
                        <div
                            class="bg-slate-200 text-center p-8"
                            @click="openModal"
                        >
                            <div class="my-auto">
                                <i class="pi pi-upload"></i>
                                <p class="text-xs">
                                    Browse File ( JPEG/PNG/PDF, max 5MB)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="m-8 cursor-pointer">
                        <p class="text-bold">
                            Upload Identification Card (Front)
                        </p>
                        <div
                            class="bg-slate-200 text-center p-8"
                            @click="openModal"
                        >
                            <div class="my-auto">
                                <i class="pi pi-upload"></i>
                                <p class="text-xs">
                                    Browse File ( JPEG/PNG/PDF, max 5MB)
                                </p>
                            </div>
                        </div>
                    </div>
                    <FileUpload mode="basic" name="demo[]"></FileUpload>
                </div>

                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                        >Confirm</Button
                    >
                </div>
            </form>
        </div>

        <Dialog
            header="Header"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            test
            <template #footer>
                <div class="text-center">
                    <Button label="Confirm" @click="closeModal" autofocus />
                </div>
            </template>
        </Dialog>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
