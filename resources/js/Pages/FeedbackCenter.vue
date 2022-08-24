<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";

const submit = () => {};
const form = useForm({ phone: "", email: "", title: "", content: "" });
</script>
<template>
    <AppLayoutNew title="Feedback Center">
        <div class="h-full p-8">
            <h1>Feedback Center</h1>
            <form @submit.prevent="submit" class="flex-grow-1 space-y-4">
                <div>
                    <h5 class="text-primary">Phone No.</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.phone"
                        placeholder="Type Phone No."
                    />
                </div>
                <div>
                    <h5 class="text-primary">Email</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.email"
                        placeholder="Type Email"
                    />
                </div>
                <div>
                    <h5 class="text-primary">Title</h5>
                    <InputText
                        class="w-full"
                        type="text"
                        v-model="form.title"
                        placeholder="Type Title"
                    />
                </div>
                <div>
                    <Textarea v-model="form.content" rows="5" class="w-full" />
                </div>
                <div class="text-center">
                    <Button
                        class="mt-5"
                        :type="submit"
                        :disabled="form.processing"
                        >Submit</Button
                    >
                </div>
            </form>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
