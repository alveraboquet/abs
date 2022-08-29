<script setup>
import { ref } from "vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    username: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
    /* form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    }); */
};

const displayModal = ref(false);
</script>

<template>
    <AuthLayout title="Login">
        <div class="main-con login-con h-full">
            <div class="w-3/4 mx-auto mt-24">
                <div class="grid grid-cols-12 mx-auto">
                    <div
                        class="col-span-12 md:col-span-6 flex items-center px-5"
                    >
                        <Image
                            alt="logo"
                            src="/images/logo/logo-01.png"
                            class="w-3/4 mx-auto m-8"
                        />
                    </div>
                    <div
                        class="col-span-12 md:col-span-6 flex flex-col space-y-5"
                    >
                        <ValidationErrors />
                        <div class="text-center">
                            <h1 class="hidden md:block">Login</h1>
                            <p>Please login to continue</p>
                        </div>
                        <form
                            @submit.prevent="submit"
                            class="flex-grow-1 space-y-4"
                        >
                            <div>
                                <h5 class="text-primary">Username</h5>
                                <InputText
                                    class="w-full"
                                    type="text"
                                    v-model="form.username"
                                    placeholder="Type Username"
                                />
                            </div>
                            <div>
                                <h5 class="text-primary">Password</h5>
                                <Password
                                    class="w-full"
                                    v-model="form.password"
                                    toggleMask
                                    :feedback="false"
                                    placeholder="Type Password"
                                />
                            </div>
                            <div class="text-right">
                                <Link :href="route('password.request')"
                                    >Forget Password</Link
                                >
                            </div>

                            <div class="text-center">
                                <Button
                                    class="mt-5"
                                    :type="submit"
                                    :disabled="form.processing"
                                    >Login Now</Button
                                >
                            </div>
                        </form>
                        <div class="text-center">
                            <p>
                                Don't have an account?
                                <Link :href="route('register')"
                                    >Register Now</Link
                                >
                            </p>
                            <p>&#169;2021.ABS.All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
<style scoped lang="css">
.main-con.login-con {
    background-image: url(/images/BG-14.png);
    background-repeat: no-repeat;
    background-size: 100%;
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

/*
.main-con {
   min-height: 100%;
   padding: 40px 12% 10%;
    background-color: #fff;
}*/

.login-layout {
    display: flex;
    align-items: center;
    justify-content: space-between;
    /*padding: 23vh 5% 0 0;*/
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
