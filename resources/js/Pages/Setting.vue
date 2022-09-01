<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";

import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { getActiveLanguage, loadLanguageAsync } from "laravel-vue-i18n";
import { ref, watch, computed } from "vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Inertia } from "@inertiajs/inertia";

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
    Inertia.visit(`/locale/${newLang}`, { preserveState: true });
    await loadLanguageAsync(newLang);
});

const selectedLang = ref(lang.value);

const changeLang = function (l) {
    lang.value = l;
};
</script>
<template>
    <div class="h-full">
        <AppLayoutNew :title="$t('public.settings')">
            <TabView>
                <TabPanel :header="$t('public.edit_personal')">
                    <form
                        @submit.prevent="submit"
                        class="flex-grow-1 space-y-4"
                    >
                        <h3>{{ $t("public.personal_details") }}</h3>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.full_name") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.full_name"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.full_name'),
                                    })
                                "
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.username") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.username"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.username'),
                                    })
                                "
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.phone_number") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.phone"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.phone_number'),
                                    })
                                "
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.email") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.email"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.email'),
                                    })
                                "
                            />
                        </div>
                        <h3>{{ $t("public.invitation") }}</h3>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.invitation_code") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.invite_code"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.invitation_code'),
                                    })
                                "
                            />
                        </div>
                        <!-- <div class="text-center">
                            <Button
                                class="mt-5"
                                :type="submit"
                                :disabled="editProfileForm.processing"
                                >{{$t('public.confirm')}}</Button
                            >
                        </div> -->
                    </form>
                </TabPanel>
                <TabPanel :header="$t('public.password_settings')">
                    <TabView>
                        <TabPanel :header="$t('public.login_password')">
                            <Banner />
                            <ValidationErrors />
                            <form
                                @submit.prevent="resetPasswordSubmit"
                                class="flex-grow-1 space-y-4"
                            >
                                <div>
                                    <h5 class="text-primary">
                                        {{ $t("public.current_password") }}
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.current_password
                                        "
                                        toggleMask
                                        :feedback="false"
                                        :placeholder="
                                            $t('public.placeholder', {
                                                attribute: $t(
                                                    'public.current_password'
                                                ),
                                            })
                                        "
                                    />
                                </div>

                                <div>
                                    <h5 class="text-primary">
                                        {{ $t("public.new_password") }}
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="resetPasswordForm.new_password"
                                        toggleMask
                                        :feedback="false"
                                        :placeholder="
                                            $t('public.placeholder', {
                                                attribute: $t(
                                                    'public.new_password'
                                                ),
                                            })
                                        "
                                    />
                                </div>
                                <div>
                                    <h5 class="text-primary">
                                        {{ $t("public.confirm_password") }}
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.new_password_confirmation
                                        "
                                        toggleMask
                                        :feedback="false"
                                        :placeholder="
                                            $t('public.placeholder', {
                                                attribute: $t(
                                                    'public.confirm_password'
                                                ),
                                            })
                                        "
                                    />
                                </div>

                                <div class="text-center">
                                    <Button
                                        class="mt-5"
                                        :type="submit"
                                        :disabled="resetPasswordForm.processing"
                                        >{{ $t("public.confirm") }}</Button
                                    >
                                </div>
                            </form>
                        </TabPanel>
                    </TabView>
                </TabPanel>
                <TabPanel :header="$t('public.language_settings')">
                    <h1>{{ $t("public.select_language") }}</h1>
                    <Listbox
                        v-model="selectedLang"
                        :options="languages"
                        optionLabel="name"
                        optionValue="value"
                    ></Listbox>
                    <div class="text-center mt-4">
                        <Button @click="changeLang(selectedLang)">{{
                            $t("public.confirm")
                        }}</Button>
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
