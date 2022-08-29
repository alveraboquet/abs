<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { onMounted, reactive, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import QrcodeVue from "qrcode.vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
const qrCode = usePage().props.value.user.invite_code;
const qrValue = {
    value: route("register", { invite: qrCode }),
    size: 138,
};

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
    <AppLayoutNew title="Invitation">
        <div class="md:m-8 main-con">
            <h1>Invitation</h1>

            <div class="layout_con_1">
                <div class="logo_wrap">
                    <Image src="/images/logo/logo-01.png" />
                </div>
                <div class="qrcode_wrap">
                    <Link :href="qrValue.value">
                        <QrcodeVue
                            :value="qrValue.value"
                            :size="qrValue.size"
                        ></QrcodeVue>
                    </Link>
                </div>
                <div class="note_text">Scan this QR code to join ABS now!</div>
                <div class="invite_code">
                    <span> Invite Code</span>
                    <div>{{ qrCode }}</div>
                </div>
            </div>
            <div class="text-center mt-5">
                <Button
                    :label="label"
                    v-clipboard:copy="qrValue.value"
                    v-clipboard:success="onCopySuccess"
                    v-clipboard:error="onCopyError"
                />
            </div>
        </div>
    </AppLayoutNew>
</template>

<style scoped lang="css">
.main-title {
    position: absolute;
    top: 150px;
    font-size: 24px;
    font-weight: 700;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000;
}
.p-tabview-nav {
    justify-content: center !important;
}
@media screen and (max-width: 768px) {
    .layout_con_1 {
        all: unset;
    }
    .main-con {
        background-image: url(/images/BG-13.png);
        background-repeat: no-repeat;
        background-size: 100%;
    }
}
.layout_con_1 {
    background-image: url(/images/BG-13.png);
    background-repeat: no-repeat;
    background-size: 100% 800px;
    background-position: 100% 50%;
    width: 375px;
    height: 500px;
    margin: 20px auto 0;
    padding-top: 20px;
    border-radius: 10px;
}

.logo_wrap {
    text-align: center;
    width: 169px;
    margin: 45px auto 55px;
}
.qrcode_wrap {
    text-align: center;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    padding: 11px;
    margin: 55px auto 16px;
    border-radius: 6px;
    box-shadow: 0 5px 10px 0rgba (0, 0, 0, 0.1);
    background-color: #fff;
}
.note_text {
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #fff;
    margin-bottom: 20px;
}

.invite_code {
    text-align: center;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: normal;
}
.invite_code span {
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    text-align: center;
    color: #fff;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: normal;
}
.invite_code div {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 6.25px;
    margin-top: 5px;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    text-align: center;
    color: #fff;
}
</style>
