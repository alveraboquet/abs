<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";

import QrcodeVue from "qrcode.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { getActiveLanguage } from "laravel-vue-i18n";

const address = "TWCd1YieHXotjsBsVb4qi1KSCwvbHt7cDh";
const copyStatuses = {
    copy: { en: "Copy", cn: "复制地址" },
    copied: { en: "Copied", cn: "已复制" },
};

const label = ref(copyStatuses["copy"][getActiveLanguage()]);

const onCopySuccess = () => {
    label.value = copyStatuses["copied"][getActiveLanguage()];
};

const onCopyError = () => {
    console.log("error");
};
const fileUp = ref(null);

const form = useForm({ amount: 0, TxID: "" });
const submit = () => {
    form.transform((data) => ({
        ...data,
        receipt: receipt.value,
    })).post(route("deposit"), {
        onSuccess: () => {
            fileUp.value.clear();
            form.reset();
        },
    });
};

const receipt = ref(null);
const testUpload = (e) => {
    receipt.value = e.files[0];
};
</script>
<template>
    <AppLayoutNew :title="$t('public.topup_now')">
        <div class="container p-8">
            <div class="flex justify-between">
                <h1>{{ $t("public.topup_now") }}</h1>
                <Link :href="route('usdt.topup-history')">{{
                    $t("public.topup_history")
                }}</Link>
            </div>

            <Card>
                <template #content>
                    <div class="flex flex-col items-center justify-between">
                        <div>{{ $t("public.chain_type") }}: USDT(TRC20)</div>
                        <div>
                            <QrcodeVue :value="address" :size="138"></QrcodeVue>
                        </div>
                        <div>{{ $t("public.usdt_address") }}</div>
                        <div>{{ address }}</div>
                        <div>
                            <Button
                                :label="label"
                                v-clipboard:copy="address"
                                v-clipboard:success="onCopySuccess"
                                v-clipboard:error="onCopyError"
                            />
                        </div>
                    </div>
                </template>
            </Card>
            <hr />
            <Card>
                <template #content>
                    <Message v-if="form.wasSuccessful" severity="success">
                        {{ $t("public.success") }}
                    </Message>
                    <ValidationErrors />
                    <form
                        @submit.prevent="submit"
                        class="flex-grow-1 space-y-4"
                    >
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.amount") }}
                            </h5>
                            <InputNumber
                                v-model="form.amount"
                                mode="currency"
                                currency="USD"
                                locale="en-US"
                                :minFractionDigits="4"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.TxID") }}
                            </h5>
                            <InputText
                                class="w-full"
                                type="text"
                                v-model="form.TxID"
                                :placeholder="
                                    $t('public.placeholder', {
                                        attribute: $t('public.TxID'),
                                    })
                                "
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">
                                {{ $t("public.receipt") }}
                            </h5>
                            <FileUpload
                                ref="fileUp"
                                name="demo[]"
                                mode="basic"
                                accept="image/*"
                                custom-upload
                                @select="testUpload($event)"
                                :choose-label="$t('public.choose')"
                            ></FileUpload>
                        </div>

                        <div class="text-center">
                            <Button
                                class="mt-5"
                                :type="submit"
                                :disabled="form.processing"
                                >{{ $t("public.submit") }}</Button
                            >
                        </div>
                    </form>
                </template>
            </Card>
            <ul class="list-disc list-inside text-sm text-slate-400 mt-5">
                <li>
                    {{ $t("public.topup_note-1") }}
                </li>
                <li>
                    {{ $t("public.topup_note-2") }}
                </li>
                <li>
                    {{ $t("public.topup_note-3-1") }}
                </li>
            </ul>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
