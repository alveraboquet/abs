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
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
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

const openModal = () => {
    displayModal.value = true;
};
const closeModal = () => {
    displayModal.value = false;
};
</script>

<template>
    <Head title="Log in" />

    <div class="h-screen">
        <div class="main-con login-con">
            <Toolbar>
                <template #start>
                    <Image
                        alt="logo"
                        src="/images/logo/logo-01.png"
                        imageStyle="width: 84px"
                    />
                </template>

                <template #end>
                    <Button
                        label="Show"
                        icon="pi pi-external-link"
                        @click="openModal"
                    />
                </template>
            </Toolbar>

            <div class="mt-8 pt-8">
                <div class="grid mx-auto">
                    <div class="md:col-4 flex align-items-center">
                        <Image alt="logo" src="/images/logo/logo-01.png" />
                    </div>
                    <div class="md:col-8 flex flex-column">
                        <ValidationErrors />
                        <div class="text-center">
                            <h1>Login</h1>
                            <p>Please login to continue</p>
                        </div>
                        <form @submit.prevent="submit" class="flex-grow-1">
                            <h5 class="text-primary">Username</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                v-model="form.email"
                                placeholder="Type Username"
                            />

                            <h5 class="text-primary">Password</h5>
                            <Password
                                class="w-full"
                                v-model="form.password"
                                toggleMask
                                :feedback="false"
                                placeholder="Type Password"
                            />

                            <div class="text-right">
                                <Link href="forgot-password"
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
                                <Link href="register">Register Now</Link>
                            </p>
                            <p>&#169;2021.ABS.All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Dialog
            header="Header"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <p>English</p>
            <p>简体中文</p>
            <template #footer>
                <div class="text-center">
                    <Button label="Confirm" @click="closeModal" autofocus />
                </div>
            </template>
        </Dialog>
    </div>
</template>
<style scoped lang="css">
.main-con.login-con {
    background-image: url(/images/BG-14.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 100% 40%;
    padding: 10px 15% 50px;
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
        padding: 15px 20px 50px;
    }
}
.p-toolbar {
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
::v-deep(.p-password input) {
    width: 100%;
}
</style>
