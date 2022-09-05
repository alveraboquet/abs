<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";
import { ref, watch } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Banner from "@/Components/Banner.vue";
import { getActiveLanguage, wTrans } from "laravel-vue-i18n";
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

const id_type = ref(curUser.value.id_type ?? "ic");

const idTypes = {
    ic: { en: "Identification ", cn: "身份证" },
    passport: { en: "Passport ", cn: "护照" },
};

const id_text = ref(idTypes[id_type.value][getActiveLanguage()]);

watch(id_type, (value) => {
    id_text.value = idTypes[id_type.value][getActiveLanguage()];
    if (value == "ic") {
        form.reset("passport_img", "hold_img", "utils_img");
        uploadedImg.value = {
            front_img: null,
            back_img: null,
            hold_img: null,
            utils_img: null,
            passport_img: null,
        };
    } else if (value == "passport") {
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

const modalContent = computed(() => [
    {
        image: "/images/BG-11.jpg",
        text: wTrans("public.upload-front").value,
        target: "front_img",
    },
    {
        image: "/images/BG-12.jpg",
        text: wTrans("public.upload-back").value,
        target: "back_img",
    },
    {
        image: "/images/BG-23.png",
        text: wTrans("public.upload-hold").value,
        target: "hold_img",
    },
    {
        image: "/images/BG-22.png",
        text: wTrans("public.upload-utils").value,
        target: "utils_img",
    },
    {
        image: "/images/BG-21.png",
        text: wTrans("public.upload-passport").value,
        target: "passport_img",
    },
    {
        image: "/images/BG-24.png",
        text: wTrans("public.upload-hold-passport").value,
        target: "hold_img",
    },
    {
        image: "/images/BG-22.png",
        text: wTrans("public.upload-utils").value,
        target: "utils_img",
    },
]);

const displayModal = ref(false);
const content = ref(null);
const openModal = (id) => {
    displayModal.value = true;
    content.value = modalContent["value"][id - 1];
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
            //form.reset();
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
const kycStatuses = {
    None: { en: "None", cn: "无" },
    Pending: { en: "Pending", cn: "等待审核" },
    Rejected: { en: "Rejected", cn: "已拒绝" },
    Approved: { en: "Approved", cn: "已通过" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.kyc')">
        <div class="m-8">
            <div class="flex items-center justify-between">
                <h1>{{ $t("public.kyc") }}</h1>

                <div>
                    {{ $t("public.kyc_status") }}
                    <Tag
                        severity="info"
                        v-if="
                            curUser.kyc_status == 'Pending' ||
                            curUser.kyc_status == 'None'
                        "
                        >{{
                            kycStatuses[curUser.kyc_status][getActiveLanguage()]
                        }}</Tag
                    >
                    <Tag
                        severity="danger"
                        v-else-if="curUser.kyc_status == 'Rejected'"
                        >{{
                            kycStatuses[curUser.kyc_status][getActiveLanguage()]
                        }}</Tag
                    >
                    <Tag
                        severity="success"
                        v-else-if="curUser.kyc_status == 'Approved'"
                        >{{
                            kycStatuses[curUser.kyc_status][getActiveLanguage()]
                        }}</Tag
                    >
                </div>
            </div>
            <p class="text-sm my-4" v-html="$t('public.kyc_reminder')"></p>

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
                        Rejected
                    </div>

                    <div
                        class="text-green-500"
                        v-if="curUser.kyc_status == 'Approved'"
                    >
                        <i class="pi pi-check"></i>
                        Real Name Authentication Has Been Authorised
                    </div>
                </template>
            </Card>

            <form @submit.prevent="submit" class="flex-grow-1 space-y-4">
                <h3>{{ $t("public.personal_details") }}</h3>
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

                        <label for="idType1">{{ $t("public.id") }}</label>
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
                        <label for="idType2">{{ $t("public.passport") }}</label>
                    </div>
                </div>

                <div>
                    <h5 class="text-primary">{{ $t("public.id_name") }}</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.full_name"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.id_name'),
                            })
                        "
                        :disabled="disableInput"
                    />
                </div>
                <div>
                    <h5 class="text-primary">
                        {{ id_text }}{{ $t("public.card_number") }}
                    </h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.id_no"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.id_no'),
                            })
                        "
                        :disabled="disableInput"
                    />
                </div>

                <div>
                    <h5 class="text-primary">
                        {{ $t("public.wallet_address_trc20") }}
                    </h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.usdt_address"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.address'),
                            })
                        "
                        :disabled="disableInput"
                    />
                </div>

                <div class="grid md:grid-cols-2 gap-8" v-if="id_type == 'ic'">
                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-front") }}
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
                                        {{ $t("public.browse_note") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-back") }}
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
                                        {{ $t("public.browse_note") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-hold") }}
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
                                        {{ $t("public.browse_note") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-utils") }}
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
                                        {{ $t("public.browse_note") }}
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
                        <p class="text-bold">
                            {{ $t("public.upload-passport") }}
                        </p>
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
                                        {{ $t("public.browse_note") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-hold-passport") }}
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
                                        {{ $t("public.browse_note") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-bold">
                            {{ $t("public.upload-utils") }}
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
                                        {{ $t("public.browse_note") }}
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
                        >{{ $t("public.submit") }}</Button
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
                    {{ $t("public.upload_confirm") }}
                </p>
            </div>
            <template #footer>
                <div class="text-center mt-4">
                    <FileUpload
                        @select="testUpload($event, content.target)"
                        mode="basic"
                        name="demo[]"
                        :choose-label="$t('public.proceed')"
                        upload-icon="false"
                        accept="image/*"
                    ></FileUpload>
                </div>
            </template>
        </Dialog>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
