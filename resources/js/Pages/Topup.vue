<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
const address = "TRzE5nJuoi4Y5cwaJHpikLaKQZYNyNRKE8";
import QrcodeVue from "qrcode.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
const label = ref("Copy");
const onCopySuccess = () => {
    label.value = "Copied";
    console.log("success");
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
    <AppLayoutNew title="Topup">
        <div class="container p-8">
            <Card>
                <template #content>
                    <div class="flex flex-col items-center justify-between">
                        <div>Chain Type: USDT(TRC20)</div>
                        <div>
                            <QrcodeVue :value="address" :size="138"></QrcodeVue>
                        </div>
                        <div>USDT Address</div>
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
                        Success
                    </Message>
                    <ValidationErrors />
                    <form
                        @submit.prevent="submit"
                        class="flex-grow-1 space-y-4"
                    >
                        <div>
                            <h5 class="text-primary">Amount</h5>
                            <InputNumber
                                v-model="form.amount"
                                mode="currency"
                                currency="USD"
                                locale="en-US"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">TxID</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                v-model="form.TxID"
                                placeholder="Type TxID"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Receipt</h5>
                            <FileUpload
                                ref="fileUp"
                                name="demo[]"
                                mode="basic"
                                accept="image/*"
                                custom-upload
                                @select="testUpload($event)"
                            ></FileUpload>
                        </div>

                        <div class="text-center">
                            <Button
                                class="mt-5"
                                :type="submit"
                                :disabled="form.processing"
                                >Submit</Button
                            >
                        </div>
                    </form>
                </template>
            </Card>
            <ul class="list-disc list-inside text-sm text-slate-400 mt-5">
                <li>
                    Do not deposit any non-USDT(TRC20) assets to the above
                    address, otherwise the assets will not be retrieved.
                </li>
                <li>
                    After you recharge to the above address, you need to confirm
                    the entire network node, and it will be credited after 3
                    network confirmations.
                </li>
                <li>
                    Minimum deposit amount: 0.1 USDT (TRC20), deposits less than
                    the minimum amount will not be credited to the account and
                    cannot be refunded.
                </li>
            </ul>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
