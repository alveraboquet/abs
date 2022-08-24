<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetLabel from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <AuthLayout title="Forgot Password">
        <div class="w-3/4 mx-auto space-y-4 m-8">
            <h1>Forget Password</h1>
            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </div>
            <Message v-if="status" severity="success">
                {{ status }}
            </Message>
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
