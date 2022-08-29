<script setup>
import { computed, ref, watch } from "vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { getActiveLanguage, loadLanguageAsync } from "laravel-vue-i18n";
defineProps({
    canResetPassword: Boolean,
    status: String,
    title: String,
});

const displayModal = ref(false);

const openModal = () => {
    displayModal.value = true;
};
const closeModal = () => {
    displayModal.value = false;
    changeLang(selectedLang.value);
};
const languages = [
    { name: "English", value: "en" },
    { name: "简体中文", value: "cn" },
];

const lang = ref(getActiveLanguage());
watch(lang, async function (newLang) {
    console.log(newLang);
    await loadLanguageAsync(newLang);
});

const selectedLang = ref(lang.value);
const langLabel = computed(
    () => languages.find((e) => e.value == lang.value).name
);

const changeLang = function (l) {
    lang.value = l;
};
</script>

<template>
    <Head :title="title" />

    <div class="h-screen flex flex-col">
        <Toolbar class="!bg-white !border-none shadow-md z-10">
            <template #start>
                <Image
                    alt="logo"
                    src="/images/logo/logo-01.png"
                    imageStyle="width: 84px"
                />
            </template>

            <template #end>
                <Button
                    :label="langLabel"
                    class="p-button-text"
                    icon="pi pi-angle-down"
                    iconPos="right"
                    @click="openModal"
                />
            </template>
        </Toolbar>
        <slot />
    </div>
    <Teleport to="body">
        <Dialog
            header="Filter"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <Listbox
                v-model="selectedLang"
                :options="languages"
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
<style scoped lang="css">
.main-con.login-con {
    background-image: url(/images/BG-14.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

    /*padding: 10px 15% 50px;*/
}

.pre-login-header {
    position: fixed;
    top: 0;
    justify-content: space-between;
    padding: 20px 8%;
    box-shadow: 0 2px 8px 0 rgb(0 0 0 / 10%);
    background-color: #fff;
    width: 100%;
    margin: 0 -15%;
    z-index: 11;
}

.main-con {
    min-height: 100%;
    padding: 40px 12% 10%;
    background-color: #fff;
}

.login-layout {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 23vh 5% 0 0;
}

@media only screen and (max-width: 768px) {
    .login_layout {
        display: block;
        padding: 0;
    }
    .main-con.login-con {
        background-image: url(/images/BG-01.png);
        background-repeat: no-repeat;
        background-size: cover;
        /* padding: 15px 20px 50px; */
    }
}

::v-deep(.p-password input) {
    width: 100%;
}
</style>
