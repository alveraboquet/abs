<script setup>
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { ref, computed } from "vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { getActiveLanguage } from "laravel-vue-i18n";

const form = useForm({
    country: 1,
    province: 1,
    full_name: "",
    phone: "",
    username: "",
    invite_code: route().params.invite
        ? route().params.invite.toUpperCase()
        : "",
    password: "",
    security_pin: "",
    email: "",
    verification_code: "",
    phonePrefix: "",
    // password_confirmation: "",
    //terms: false,
});

const countries = [
    { name_en: "Malaysia", name_cn: "马来西亚", code: 1, mobile: "60" },
    { name_en: "Japan", name_cn: "日本", code: 2, mobile: "81" },
    { name_en: "China", name_cn: "中国", code: 3, mobile: "86" },
    { name_en: "Taiwan", name_cn: "台湾", code: 4, mobile: "886" },
    { name_en: "Singapore", name_cn: "新加坡", code: 5, mobile: "65" },
    { name_en: "Thailand", name_cn: "泰国", code: 6, mobile: "66" },
    { name_en: "Indonesia", name_cn: "印尼", code: 7, mobile: "62" },
    { name_en: "Vietnam", name_cn: "越南", code: 8, mobile: "84" },
    { name_en: "Korea", name_cn: "韩国", code: 9, mobile: "82" },
    { name_en: "United States", name_cn: "美国", code: 10, mobile: "1" },
    { name_en: "Hong Kong", name_cn: "香港", code: 1, mobile: "852" },
    { name_en: "United Kingdom", name_cn: "英国", code: 12, mobile: "44" },
    { name_en: "Myanmar (Burma)", name_cn: "缅甸", code: 13, mobile: "95" },
    { name_en: "Philippines", name_cn: "菲利宾", code: 14, mobile: "63" },
    { name_en: "Cambodia", name_cn: "柬埔寨", code: 15, mobile: "855" },
    { name_en: "India", name_cn: "印度", code: 16, mobile: "62" },
    { name_en: "Australia", name_cn: "澳大利亚", code: 17, mobile: "61" },
    { name_en: "Brunei", name_cn: "汶莱", code: 18, mobile: "673" },
    { name_en: "Sri Lanka", name_cn: "斯里兰卡", code: 19, mobile: "95" },
    { name_en: "Maldives", name_cn: "马尔代夫", code: 20, mobile: "960" },
    { name_en: "Laos", name_cn: "老挝", code: 21, mobile: "856" },
    { name_en: "Kazakhstan", name_cn: "哈萨克斯坦", code: 22, mobile: "7" },
    { name_en: "Russia", name_cn: "俄罗斯", code: 23, mobile: "7" },
    { name_en: "Canada", name_cn: "加拿大", code: 24, mobile: "1" },
];

const provinces = [
    { name_en: "Johor", name_cn: "柔佛", code: 1, country: 1 },
    { name_en: "Kedah", name_cn: "吉打", code: 2, country: 1 },
    { name_en: "Kelantan", name_cn: "吉兰丹", code: 3, country: 1 },
    { name_en: "Malacca", name_cn: "马六甲", code: 4, country: 1 },
    { name_en: "Negeri Sembilan", name_cn: "森美兰", code: 5, country: 1 },
    { name_en: "Pahang", name_cn: "彭亨", code: 6, country: 1 },
    { name_en: "Penang", name_cn: "槟城", code: 7, country: 1 },
    { name_en: "Perak", name_cn: "霹雳", code: 8, country: 1 },
    { name_en: "Perlis", name_cn: "玻璃市", code: 9, country: 1 },
    { name_en: "Kuala Lumpur", name_cn: "吉隆坡", code: 10, country: 1 },
    { name_en: "Selangor", name_cn: "雪兰莪", code: 11, country: 1 },
    { name_en: "Terengganu", name_cn: "登嘉楼", code: 12, country: 1 },
    { name_en: "Sabah", name_cn: "沙巴", code: 13, country: 1 },
    { name_en: "Sarawak", name_cn: "砂拉越", code: 14, country: 1 },
    { name_en: "Labuan", name_cn: "纳闽", code: 15, country: 1 },
    { name_en: "Beijing/BJ", name_cn: "北京市", code: 16, country: 3 },
    { name_en: "Shanghai/SH", name_cn: "上海市", code: 17, country: 3 },
    { name_en: "Tianjing/TJ", name_cn: "天津市", code: 18, country: 3 },
    { name_en: "Chongqing/CQ", name_cn: "重庆市", code: 19, country: 3 },
    { name_en: "Heilongjiang/HL", name_cn: "黑龙江省", code: 20, country: 3 },
    { name_en: "Liaoning/LN", name_cn: "辽宁省", code: 21, country: 3 },
    { name_en: "Jilin/JL", name_cn: "吉林省", code: 22, country: 3 },
    { name_en: "Hebei/HB", name_cn: "河北省", code: 23, country: 3 },
    { name_en: "Henan/HN", name_cn: "河南省", code: 24, country: 3 },
    { name_en: "Hubei/HB2", name_cn: "湖北省", code: 25, country: 3 },
    { name_en: "Hunan/HN", name_cn: "湖南省", code: 26, country: 3 },
    { name_en: "Shandong/SD", name_cn: "山东省", code: 27, country: 3 },
    { name_en: "Shanxi/SX", name_cn: "山西省", code: 28, country: 3 },
    { name_en: "Shaanxi/SN", name_cn: "陕西省", code: 29, country: 3 },
    { name_en: "Anhui/AH", name_cn: "安徽省", code: 30, country: 3 },
    { name_en: "Zhejiang/ZJ", name_cn: "浙江省", code: 31, country: 3 },
    { name_en: "Jiangsu/JS", name_cn: "江苏省", code: 32, country: 3 },
    { name_en: "Fujian/FJ", name_cn: "福建省", code: 33, country: 3 },
    { name_en: "Guangdong/GD", name_cn: "广东省", code: 34, country: 3 },
    { name_en: "Hainan/HN", name_cn: "海南省", code: 35, country: 3 },
    { name_en: "Sichuan/SC", name_cn: "四川省", code: 36, country: 3 },
    { name_en: "Yunnan/YN", name_cn: "云南省", code: 37, country: 3 },
    { name_en: "Guizhou/GZ", name_cn: "贵州省", code: 38, country: 3 },
    { name_en: "Qinghai/QH", name_cn: "青海省", code: 39, country: 3 },
    { name_en: "Gansui/GS", name_cn: "甘肃省", code: 40, country: 3 },
    { name_en: "Jiangxi/KX", name_cn: "江西省", code: 41, country: 3 },
    { name_en: "Taiwan/TW", name_cn: "台湾省", code: 42, country: 3 },
    {
        name_en: "Inner Mongolia/IM/NM",
        name_cn: "内蒙古自治区",
        code: 43,
        country: 3,
    },
    { name_en: "Ningxia/NX", name_cn: "宁夏回族自治区", code: 44, country: 3 },
    {
        name_en: "Xinjiang/XJ",
        name_cn: "新疆维吾尔自治区",
        code: 45,
        country: 3,
    },
    { name_en: "Tibet/XZ", name_cn: "西藏自治区", code: 46, country: 3 },
    { name_en: "Guangxi/GX", name_cn: "广西壮族自治区", code: 47, country: 3 },
    {
        name_en: "Hong Kong/HK",
        name_cn: "香港特别行政区",
        code: 48,
        country: 3,
    },
    { name_en: "Macao/MO", name_cn: "澳门特别行政区", code: 49, country: 3 },
];

const filteredProvinces = computed(() =>
    provinces.filter((p) => p.country == form.country)
);
const phonePrefix = computed(
    () => countries.find((c) => c.code == form.country)?.mobile
);
const submit = () => {
    form.transform((data) => ({
        ...data,
        phonePrefix: phonePrefix.value,
    })).post(route("register"), {
        onFinish: () => form.reset("password"),
    });
};

const displayModal = ref(false);

const openModal = () => {
    displayModal.value = true;
};
const closeModal = () => {
    displayModal.value = false;
};
const validateNumbers = (event) => {
    console.log(event);
    if (!/[0-9]/.test(event.key)) {
        console.log("here");
        event.preventDefault();
    }
};
const verifyEmailSent = ref(false);
const sendVerifyEmail = () => {
    verifyEmailSent.value = false;
    if (!form.email) {
        form.setError("email", "error");
        return;
    } else {
        form.clearErrors();
        Inertia.post(
            "/email/verify",
            { email: form.email },
            {
                onSuccess: () => {
                    if (
                        usePage().props.value.jetstream.flash?.bannerStyle ==
                        "success"
                    ) {
                        verifyEmailSent.value = true;
                    }
                },
            }
        );
    }
};
</script>

<template>
    <AuthLayout :title="$t('public.register')">
        <div class="w-3/4 mx-auto space-y-4 m-8 p-8">
            <h1>{{ $t("public.register") }}</h1>
            <p class="text-sm">
                {{ $t("public.input_personal_detail") }}
            </p>
            <Banner />
            <ValidationErrors />
            <form @submit.prevent="submit" class="space-y-4">
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.country") }}</h5>
                    <Dropdown
                        class="w-full"
                        v-model="form.country"
                        :options="countries"
                        :optionLabel="`name_${getActiveLanguage()}`"
                        optionValue="code"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.province") }}</h5>
                    <Dropdown
                        class="w-full"
                        v-model="form.province"
                        :options="filteredProvinces"
                        :optionLabel="`name_${getActiveLanguage()}`"
                        optionValue="code"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.full_name") }}</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.full_name"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.full_name'),
                            })
                        "
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">
                        {{ $t("public.phone_number") }}
                    </h5>
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            +{{ phonePrefix }}
                        </span>
                        <InputText
                            v-model="form.phone"
                            @keydown="validateNumbers"
                            :placeholder="
                                $t('public.placeholder', {
                                    attribute: $t('public.phone_number'),
                                })
                            "
                        />
                    </div>
                </div>
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.username") }}</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.username"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.username'),
                            })
                        "
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">
                        {{ $t("public.invitation_code") }}
                    </h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.invite_code"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.invitation_code'),
                            })
                        "
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.password") }}</h5>
                    <Password
                        class="w-full"
                        v-model="form.password"
                        toggleMask
                        :feedback="false"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.password'),
                            })
                        "
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">
                        {{ $t("public.security_pin") }}
                    </h5>
                    <Password
                        class="w-full"
                        v-model="form.security_pin"
                        toggleMask
                        :feedback="false"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.security_pin'),
                            })
                        "
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.email") }}</h5>
                    <div class="p-inputgroup">
                        <InputText
                            class="w-full"
                            :class="{ 'p-invalid': form.errors.email }"
                            type="email"
                            v-model="form.email"
                            :placeholder="
                                $t('public.placeholder', {
                                    attribute: $t('public.email'),
                                })
                            "
                        />

                        <Button
                            :label="$t('public.send_now')"
                            @click="sendVerifyEmail"
                            :disabled="false"
                        />
                        <!-- verifyEmailSent -->
                    </div>
                    <small class="p-error" v-if="form.errors.email"
                        >Email is required.
                    </small>
                </div>

                <div class="field">
                    <h5 class="text-primary">
                        {{ $t("public.verification_code") }}
                    </h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.verification_code"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.verification_code'),
                            })
                        "
                        :disabled="!verifyEmailSent"
                    />
                </div>
                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="!form.verification_code || form.processing"
                        >{{ $t("public.register") }}</Button
                    >
                </div>
            </form>
            <div class="text-center">
                <p>
                    {{ $t("public.have_acc") }}
                    <Link :href="route('login')">{{
                        $t("public.login_now")
                    }}</Link>
                </p>
            </div>
        </div>
    </AuthLayout>
</template>

<style scoped lang="css">
::v-deep(.p-password input) {
    width: 100%;
}
</style>
