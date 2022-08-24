<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/reactivity";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";

const curUser = computed(() => usePage().props.value.auth.user);
const resetPasswordForm = useForm({
    current_password: "",
    new_password: "",
    new_password_confirmation: "",
});

const editProfileForm = useForm({
    full_name: curUser.value.full_name,
    username: curUser.value.username,
    phone: curUser.value.phone,
    email: curUser.value.email,
    invite_code: curUser.value.invite_code,
});

const submit = () => {};
</script>
<template>
    <div class="h-full">
        <AppLayoutNew title="Setting">
            <TabView>
                <TabPanel header="Edit Personal">
                    <form
                        @submit.prevent="submit"
                        class="flex-grow-1 space-y-4"
                    >
                        <h3>Personal Details</h3>
                        <div>
                            <h5 class="text-primary">Full Name</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.full_name"
                                placeholder="Type Full Name"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Username</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.username"
                                placeholder="Type Username"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Phone No.</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.phone"
                                placeholder="Type phone"
                            />
                        </div>
                        <div>
                            <h5 class="text-primary">Email</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.email"
                                placeholder="Type Email"
                            />
                        </div>
                        <h3>Invitation</h3>
                        <div>
                            <h5 class="text-primary">Invitation Code</h5>
                            <InputText
                                class="w-full"
                                type="text"
                                readonly
                                v-model="editProfileForm.invite_code"
                                placeholder="Type Invitation code"
                            />
                        </div>
                        <div class="text-center">
                            <Button
                                class="mt-5"
                                :type="submit"
                                :disabled="editProfileForm.processing"
                                >Confirm</Button
                            >
                        </div>
                    </form>
                </TabPanel>
                <TabPanel header="Password Setting">
                    <TabView>
                        <TabPanel header="Login Password">
                            <form
                                @submit.prevent="submit"
                                class="flex-grow-1 space-y-4"
                            >
                                <div>
                                    <h5 class="text-primary">
                                        Current Password
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.current_password
                                        "
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Type Current Password"
                                    />
                                </div>

                                <div>
                                    <h5 class="text-primary">New Password</h5>
                                    <Password
                                        class="w-full"
                                        v-model="resetPasswordForm.new_password"
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Type New Password"
                                    />
                                </div>

                                <div>
                                    <h5 class="text-primary">
                                        Confirm Password
                                    </h5>
                                    <Password
                                        class="w-full"
                                        v-model="
                                            resetPasswordForm.new_password_confirmation
                                        "
                                        toggleMask
                                        :feedback="false"
                                        placeholder="Type New Password"
                                    />
                                </div>
                                <div class="text-center">
                                    <Button
                                        class="mt-5"
                                        :type="submit"
                                        :disabled="resetPasswordForm.processing"
                                        >Confirm</Button
                                    >
                                </div>
                            </form>
                        </TabPanel>
                    </TabView>
                </TabPanel>
                <TabPanel header="Language Setting">
                    <h1>Select Language</h1>
                    <p>English</p>
                    <p>简体中文</p>
                    <Button>Confirm</Button>
                </TabPanel>
            </TabView>
        </AppLayoutNew>
    </div>
</template>
<style scope lang="css"></style>
