<script setup>
import { ref } from "vue";
import AppLayoutNew from "../Layouts/AppLayoutNew.vue";
const address = "TRzE5nJuoi4Y5cwaJHpikLaKQZYNyNRKE8";
import QrcodeVue from "qrcode.vue";
const label = ref("Copy");
const onCopySuccess = () => {
    label.value = "Copied";
    console.log("success");
};

const onCopyError = () => {
    console.log("error");
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
                            <QrcodeVue :value="address" size="138"></QrcodeVue>
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
