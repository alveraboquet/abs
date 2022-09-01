<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
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
            <h1>{{ $t("public.forget_password") }}</h1>

            <Message v-if="status" severity="success">
                {{ status }}
            </Message>
            <ValidationErrors />
            <form @submit.prevent="submit" class="space-y-4">
                <div class="field">
                    <h5 class="text-primary">{{ $t("public.email") }}</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.email"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.email'),
                            })
                        "
                    />
                </div>
                <div class="text-center space-y-4">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                    >
                        {{ $t("public.submit") }}</Button
                    >
                    <p>
                        {{ $t("public.have_acc") }}
                        <Link :href="route('login')">{{
                            $t("public.login_now")
                        }}</Link>
                    </p>
                </div>
            </form>
        </div>
    </AuthLayout>
</template>
