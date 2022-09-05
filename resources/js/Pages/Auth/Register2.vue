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
    phonePrefix: "",
    // password_confirmation: "",
    //terms: false,
});

const countries = [
    { name: "Malaysia", code: 1, mobile: "60" },
    { name: "Japan", code: 2, mobile: "81" },
    { name: "China", code: 3, mobile: "86" },
    { name: "Taiwan", code: 4, mobile: "886" },
    { name: "Singapore", code: 5, mobile: "65" },
    { name: "Thailand", code: 6, mobile: "66" },
    { name: "Indonesia", code: 7, mobile: "62" },
    { name: "Vietnam", code: 8, mobile: "84" },
    { name: "Korea", code: 9, mobile: "82" },
    { name: "United States", code: 10, mobile: "1" },
    { name: "Hong Kong", code: 1, mobile: "852" },
    { name: "United Kingdom", code: 12, mobile: "44" },
    { name: "Myanmar (Burma)", code: 13, mobile: "95" },
    { name: "Philippines", code: 14, mobile: "63" },
    { name: "Cambodia", code: 15, mobile: "855" },
    { name: "India", code: 16, mobile: "62" },
    { name: "Australia", code: 17, mobile: "61" },
    { name: "Brunei", code: 18, mobile: "673" },
    { name: "Sri Lanka", code: 19, mobile: "95" },
    { name: "Maldives", code: 20, mobile: "960" },
    { name: "Laos", code: 21, mobile: "856" },
    { name: "Kazakhstan", code: 22, mobile: "7" },
    { name: "Russia", code: 23, mobile: "7" },
    { name: "Canada", code: 24, mobile: "1" },
];

const provinces = [
    { name: "Johor", code: 1, country: 1 },
    { name: "Kedah", code: 2, country: 1 },
    { name: "Kelantan", code: 3, country: 1 },
    { name: "Malacca", code: 4, country: 1 },
    { name: "Negeri Sembilan", code: 5, country: 1 },
    { name: "Pahang", code: 6, country: 1 },
    { name: "Penang", code: 7, country: 1 },
    { name: "Perak", code: 8, country: 1 },
    { name: "Perlis", code: 9, country: 1 },
    { name: "Kuala Lumpur", code: 10, country: 1 },
    { name: "Selangor", code: 11, country: 1 },
    { name: "Terengganu", code: 12, country: 1 },
    { name: "Sabah", code: 13, country: 1 },
    { name: "Sarawak", code: 14, country: 1 },
    { name: "Labuan", code: 15, country: 1 },
    { name: "Beijing/BJ", code: 16, country: 3 },
    { name: "Shanghai/SH", code: 17, country: 3 },
    { name: "Tianjing/TJ", code: 18, country: 3 },
    { name: "Chongqing/CQ", code: 19, country: 3 },
    { name: "Heilongjiang/HL", code: 20, country: 3 },
    { name: "Liaoning/LN", code: 21, country: 3 },
    { name: "Jilin/JL", code: 22, country: 3 },
    { name: "Hebei/HB", code: 23, country: 3 },
    { name: "Henan/HN", code: 24, country: 3 },
    { name: "Hubei/HB2", code: 25, country: 3 },
    { name: "Hunan/HN", code: 26, country: 3 },
    { name: "Shandong/SD", code: 27, country: 3 },
    { name: "Shanxi/SX", code: 28, country: 3 },
    { name: "Shaanxi/SN", code: 29, country: 3 },
    { name: "Anhui/AH", code: 30, country: 3 },
    { name: "Zhejiang/ZJ", code: 31, country: 3 },
    { name: "Jiangsu/JS", code: 32, country: 3 },
    { name: "Fujian/FJ", code: 33, country: 3 },
    { name: "Guangdong/GD", code: 34, country: 3 },
    { name: "Hainan/HN", code: 35, country: 3 },
    { name: "Sichuan/SC", code: 36, country: 3 },
    { name: "Yunnan/YN", code: 37, country: 3 },
    { name: "Guizhou/GZ", code: 38, country: 3 },
    { name: "Qinghai/QH", code: 39, country: 3 },
    { name: "Gansui/GS", code: 40, country: 3 },
    { name: "Jiangxi/KX", code: 41, country: 3 },
    { name: "Taiwan/TW", code: 42, country: 3 },
    { name: "Inner Mongolia/IM/NM", code: 43, country: 3 },
    { name: "Ningxia/NX", code: 44, country: 3 },
    { name: "Xinjiang/XJ", code: 45, country: 3 },
    { name: "Tibet/XZ", code: 46, country: 3 },
    { name: "Guangxi/GX", code: 47, country: 3 },
    { name: "Hong Kong/HK", code: 48, country: 3 },
    { name: "Macao/MO", code: 49, country: 3 },
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
    })).post("/internal-register", {
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
/* const validateNumbers = (event) => {
    //console.log(event);
    if (!/[0-9]/.test(event.key)) {
        //console.log("here");
        event.preventDefault();
    }
}; */
</script>

<template>
    <AuthLayout title="Register">
        <div class="w-3/4 mx-auto space-y-4 m-8 p-8">
            <h1>Register</h1>
            <p class="text-sm">
                Please insert personal details to create an account
            </p>
            <Banner />
            <ValidationErrors />
            <form @submit.prevent="submit" class="space-y-4">
                <div class="field">
                    <h5 class="text-primary">Country</h5>
                    <Dropdown
                        class="w-full"
                        v-model="form.country"
                        :options="countries"
                        optionLabel="name"
                        optionValue="code"
                        placeholder="Select a Country"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Provinces</h5>
                    <Dropdown
                        class="w-full"
                        v-model="form.province"
                        :options="filteredProvinces"
                        optionLabel="name"
                        optionValue="code"
                        placeholder="Select a Province"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Full Name</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.full_name"
                        placeholder="Type Full Name"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Phone Number</h5>
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            +{{ phonePrefix }}
                        </span>
                        <InputText
                            v-model="form.phone"
                            placeholder="Type Phone Number"
                        />
                    </div>
                </div>
                <div class="field">
                    <h5 class="text-primary">Username</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.username"
                        placeholder="Type Username"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Invitation Code</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.invite_code"
                        placeholder="Type Invitation"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Password</h5>
                    <Password
                        class="w-full"
                        v-model="form.password"
                        toggleMask
                        :feedback="false"
                        placeholder="Type Password"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Security Pin</h5>
                    <Password
                        class="w-full"
                        v-model="form.security_pin"
                        toggleMask
                        :feedback="false"
                        placeholder="At least 6 digit Security PIN"
                    />
                </div>
                <div class="field">
                    <h5 class="text-primary">Email</h5>
                    <InputText
                        class="w-full"
                        type="email"
                        v-model="form.email"
                        placeholder="Type Email"
                    />
                </div>

                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                        >Register</Button
                    >
                </div>
            </form>
            <div class="text-center">
                <p>
                    I have an account.
                    <Link :href="route('login')">Login Now</Link>
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
