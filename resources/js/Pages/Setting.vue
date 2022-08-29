<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";

import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { getActiveLanguage, loadLanguageAsync } from "laravel-vue-i18n";
import { ref, watch, computed } from "vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

const curUser = computed(() => usePage().props.value.auth.user);
const resetPasswordForm = useForm({
    current_password: "",
    new_password: "",
    new_password_confirmation: "",
});

const editProfileForm = useForm({
    full_name: curUser.value.full_name,
    username: curUser.value.username,
    phone: curUser.value.phone,
    email: curUser.value.email,
    invite_code: curUser.value.invite_code,
});

const submit = () => {};

const resetPasswordSubmit = () => {
    resetPasswordForm.post(route("change-password"), {
        onSuccess: () => {
            resetPasswordForm.reset();
        },
    });
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

const changeLang = function (l) {
    lang.value = l;
};
</script>
<template>
    <div class="h-full">
        <AppLayoutNew title="Setting">
            <TabView>
                <TabPanel header="Edit Personal">
                    <form
                        @submit.prevent="submit"
                        class="flex-grow-1 space-y-4"
                    >
                        <h3>Personal Details</h3>
                        <div>
                            <h5 class="text-primary">Full Name</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.full_name"
                                placeholder="Type Full Name"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Username</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.username"
                                placeholder="Type Username"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Phone No.</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.phone"
                                placeholder="Type phone"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Email</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.email"
                                placeholder="Type Email"
                            />
                        </div>
                        <h3>Invitation</h3>
                        <div>
                            <h5 class="text-primary">Invitation Code</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.invite_code"
                                placeholder="Type Invitation code"
                            />
                        </div>
                        <!-- <div class="text-center">
                            <Button
                                class="mt-5"
                                :type="submit"
                                :disabled="editProfileForm.processing"
                                >Confirm</Button
                            >
                        </div> -->
                    </form>
                </TabPanel>
                <TabPanel header="Password Setting">
                    <TabView>
                        <TabPanel header="Login Password">
                            <Banner />
                            <ValidationErrors />
                            <form
                                @submit.prevent="resetPasswordSubmit"
                                class="flex-grow-1 space-y-4"
                            >
                                <div>
                                    <h5 class="text-primary">
                                        Current Password
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.current_password
                                        "
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Type Current Password"
                                    />
                                </div>

                                <div>
                                    <h5 class="text-primary">New Password</h5>
                                    <Password
                                        class="w-full"
                                        v-model="resetPasswordForm.new_password"
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Type New Password"
                                    />
                                </div>
                                <div>
                                    <h5 class="text-primary">
                                        Confirm Password
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.new_password_confirmation
                                        "
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Confirm New Password"
                                    />
                                </div>

                                <div class="text-center">
                                    <Button
                                        class="mt-5"
                                        :type="submit"
                                        :disabled="resetPasswordForm.processing"
                                        >Confirm</Button
                                    >
                                </div>
                            </form>
                        </TabPanel>
                    </TabView>
                </TabPanel>
                <TabPanel header="Language Setting">
                    <h1>Select Language</h1>
                    <Listbox
                        v-model="selectedLang"
                        :options="languages"
                        optionLabel="name"
                        optionValue="value"
                    ></Listbox>
                    <div class="text-center mt-4">
                        <Button @click="changeLang(selectedLang)"
                            >Confirm</Button
                        >
                    </div>
                </TabPanel>
            </TabView>
        </AppLayoutNew>
    </div>
</template>
<style scope lang="css">
.p-password {
    width: 100% !important;
}
.p-inputtext {
    width: 100% !important;
}
</style>
