<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetLabel from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <AuthLayout title="Reset Password">
        <div class="w-3/4 mx-auto space-y-4 m-8">
            <h1>Reset Password</h1>

            <ValidationErrors />
            <form @submit.prevent="submit" class="space-y-4">
                <div class="field">
                    <h5 class="text-primary">Email</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.email"
                        placeholder="Type Email"
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
                <div>
                    <h5 class="text-primary">Confirm Password</h5>
                    <Password
                        class="w-full"
                        v-model="form.password_confirmation"
                        toggleMask
                        :feedback="false"
                        placeholder="Confirm Password"
                    />
                </div>
                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                    >
                        Email Password Reset Link</Button
                    >
                </div>
            </form>
        </div>
    </AuthLayout>
</template>
