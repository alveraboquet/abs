<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Banner from "@/Components/Banner.vue";
const form = useForm({ phone: "", email: "", title: "", content: "" });

const submit = () => {
    form.post(route("submit-feedback"), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>
<template>
    <AppLayoutNew :title="$t('public.feedback_center')">
        <div class="h-full p-8">
            <h1>{{ $t("public.feedback_center") }}</h1>
            <Banner />
            <ValidationErrors />
            <form @submit.prevent="submit" class="flex-grow-1 space-y-4">
                <div>
                    <h5 class="text-primary">
                        {{ $t("public.phone_number") }}
                    </h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.phone"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.phone_number'),
                            })
                        "
                    />
                </div>
                <div>
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
                <div>
                    <h5 class="text-primary">{{ $t("public.title") }}</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.title"
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.title'),
                            })
                        "
                    />
                </div>
                <div>
                    <Textarea
                        v-model="form.content"
                        rows="5"
                        class="w-full"
                        :placeholder="
                            $t('public.placeholder_here', {
                                attribute: $t('public.content'),
                            })
                        "
                    />
                </div>
                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                        >{{ $t("public.submit") }}</Button
                    >
                </div>
            </form>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
