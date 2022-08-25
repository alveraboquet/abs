<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";
import { ref, watch } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Banner from "@/Components/Banner.vue";
const curUser = computed(() => usePage().props.value.auth.user);
const form = useForm({
    id_type: "",
    id_no: curUser.value.id_no,
    full_name: curUser.value.full_name,
    usdt_address: curUser.value.usdt_address,
    front_img: null,
    back_img: null,
    hold_img: null,
    utils_img: null,
    passport_img: null,
});

const id_type = ref("ic");

const id_text = ref("Identification Card");

watch(id_type, (value) => {
    if (value == "ic") {
        id_text.value = "Identification Card";
        form.reset("passport_img", "hold_img", "utils_img");
        uploadedImg.value = {
            front_img: null,
            back_img: null,
            hold_img: null,
            utils_img: null,
            passport_img: null,
        };
    } else if (value == "passport") {
        id_text.value = "Passport";
        form.reset("front_image", "back_image", "hold_img", "utils_img");
        uploadedImg.value = {
            front_img: null,
            back_img: null,
            hold_img: null,
            utils_img: null,
            passport_img: null,
        };
    }
});

const modalContent = [
    {
        image: "images/BG-11.jpg",
        text: `Upload Identification Card (Front)`,
        target: "front_img",
    },
    {
        image: "images/BG-12.jpg",
        text: `Upload Identification Card (Back)`,
        target: "back_img",
    },
    {
        image: "images/BG-23.png",
        text: `Upload holding Identification Card (ID must be clear)`,
        target: "hold_img",
    },
    {
        image: "images/BG-22.png",
        text: `Upload Utilities Bill (Name must same as ID / Passport)`,
        target: "utils_img",
    },
    {
        image: "images/BG-21.png",
        text: `Upload Passport`,
        target: "passport_img",
    },
    {
        image: "images/BG-24.png",
        text: `Upload holding Passport (Passport  must be clear)`,
        target: "hold_img",
    },
    {
        image: "images/BG-22.png",
        text: `Upload Utilities Bill (Name must same as ID / Passport)`,
        target: "utils_img",
    },
];

const displayModal = ref(false);
const content = ref(null);
const openModal = (id) => {
    displayModal.value = true;
    content.value = modalContent[id - 1];
};
const closeModal = () => {
    displayModal.value = false;
};
const submit = () => {
    form.transform((data) => ({
        ...data,
        id_type: id_type.value,
        // receipt: receipt.value,
    })).post(route("submit-kyc"), {
        onSuccess: () => {
            // fileUp.value.clear();
            form.reset();
        },
    });
};

const uploadedImg = ref({
    front_img: curUser.value.front_img,
    back_img: curUser.value.back_img,
    hold_img: curUser.value.hold_img,
    utils_img: curUser.value.utils_img,
    passport_img: curUser.value.passport_img,
});

const upload_id = ref(null);
const reader = new FileReader();
reader.onloadend = () => {
    //console.log(reader.result);
    uploadedImg["value"][upload_id.value] = reader.result;
};

const testUpload = (e, id) => {
    let file = e.files[0];
    closeModal();
    reader.readAsDataURL(file);
    form[id] = file;
    upload_id.value = id;
};

const removeImage = (id) => {
    form;
    uploadedImg.value[id] = null;
};
const disableInput = computed(
    () =>
        curUser.value.kyc_status == "Pending" ||
        curUser.value.kyc_status == "Approved"
);
</script>
<template>
    <AppLayoutNew title="KYC">
        <div class="h-screen m-8">
            <div class="flex items-center justify-between">
                <h1>KYC</h1>

                <div>
                    KYC Status
                    <Tag
                        severity="info"
                        v-if="
                            curUser.kyc_status == 'Pending' ||
                            curUser.kyc_status == 'None'
                        "
                        >{{ curUser.kyc_status }}</Tag
                    >
                    <Tag
                        severity="danger"
                        v-if="curUser.kyc_status == 'Rejected'"
                        >{{ curUser.kyc_status }}</Tag
                    >
                    <Tag
                        severity="success"
                        v-if="curUser.kyc_status == 'Approved'"
                        >{{ curUser.kyc_status }}</Tag
                    >
                </div>
            </div>
            <p class="text-sm my-4">
                Reminder: If you wish to mo dify your KYC & wallet address,
                kindly submit to support@abs.agency, estimate 5-7 working days.
            </p>

            <Card
                class="!shadow-lg shadow-black/50 my-5"
                v-if="
                    curUser.kyc_status != 'None' &&
                    curUser.kyc_status != 'Pending'
                "
            >
                <template #content>
                    <div
                        class="text-red-500"
                        v-if="curUser.kyc_status == 'Rejected'"
                    >
                        <i class="pi pi-times"></i>
                        {{ curUser.kyc_reason }}
                    </div>

                    <div
                        class="text-green-500"
                        v-if="curUser.kyc_status == 'Rejected'"
                    >
                        <i class="pi pi-check"></i>
                        {{ curUser.kyc_reason }}
                    </div>
                </template>
            </Card>
            <div></div>
            <form @submit.prevent="submit" class="flex-grow-1 space-y-4">
                <h3>Personal Details</h3>
                <ValidationErrors />
                <Banner />
                <div class="field-radiobutton md:flex md:space-x-4">
                    <div class="flex items-center mb-4">
                        <RadioButton
                            class="mr-4"
                            inputId="idType1"
                            name="idType"
                            value="ic"
                            v-model="id_type"
                            :disabled="disableInput"
                        />

                        <label for="idType1">Identification Card Number</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <RadioButton
                            class="mr-4"
                            inputId="idType2"
                            name="idType"
                            value="passport"
                            v-model="id_type"
                            :disabled="disableInput"
                        />
                        <label for="idType2">Passport</label>
                    </div>
                </div>

                <div>
                    <h5 class="text-primary">ID Name</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.full_name"
                        placeholder="Type ID Name"
                        :disabled="disableInput"
                    />
                </div>
                <div>
                    <h5 class="text-primary">{{ id_text }} Number</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.id_no"
                        placeholder="Type ID No."
                        :disabled="disableInput"
                    />
                </div>

                <div>
                    <h5 class="text-primary">Wallet Address TRC20</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.usdt_address"
                        placeholder="Type Address"
                        :disabled="disableInput"
                    />
                </div>

                <div class="grid md:grid-cols-2 gap-8" v-if="id_type == 'ic'">
                    <div>
                        <p class="text-bold">
                            Upload Identification Card (Front)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.front_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('front_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.front_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(1)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            Upload Identification Card (Back)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.back_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('back_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.back_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(2)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            Upload holding Identification Card (ID must be
                            clear)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.hold_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('hold_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.hold_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(3)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="text-bold">
                            Upload Utilities Bill (Name must same as ID /
                            Passport)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.utils_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('utils_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.utils_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(4)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="grid md:grid-cols-2 gap-8"
                    v-else-if="id_type == 'passport'"
                >
                    <div>
                        <p class="text-bold">Upload Passport</p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.passport_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('passport_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.passport_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(5)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            Upload holding Passport (Passport must be clear)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.hold_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('hold_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.hold_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(6)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            Upload Utilities Bill (Name must same as ID /
                            Passport)
                        </p>
                        <div class="cursor-pointer">
                            <div v-if="uploadedImg.utils_img">
                                <div
                                    class="text-right text-red-600 p-8"
                                    v-if="!disableInput"
                                >
                                    <i
                                        class="pi pi-trash"
                                        @click="removeImage('utils_img')"
                                    ></i>
                                </div>
                                <Image
                                    :src="uploadedImg.utils_img"
                                    image-class="object-scale-down mx-auto"
                                ></Image>
                            </div>
                            <div
                                v-else
                                class="bg-slate-200 text-center p-8"
                                @click="openModal(7)"
                            >
                                <div class="my-auto">
                                    <i class="pi pi-upload"></i>
                                    <p class="text-xs">
                                        Browse File ( JPEG/PNG/PDF, max 5MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="disableInput || form.processing"
                        >Submit</Button
                    >
                </div>
            </form>
        </div>

        <Dialog
            v-if="displayModal"
            :header="content.text"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <div class="text-center">
                <Image
                    :src="content.image"
                    image-class="h-40  mx-auto m-4"
                ></Image>
                <p class="text-sm text-slate-400">
                    Make sure you upload a right image, attachment require as (
                    JPEG/PNG/PDF, max 5MB)
                </p>
            </div>
            <template #footer>
                <div class="text-center mt-4">
                    <FileUpload
                        @select="testUpload($event, content.target)"
                        mode="basic"
                        name="demo[]"
                        choose-label="Proceed"
                        upload-icon="false"
                        accept="image/*"
                    ></FileUpload>
                </div>
            </template>
        </Dialog>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
