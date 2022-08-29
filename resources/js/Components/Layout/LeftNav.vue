<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { Inertia } from "@inertiajs/inertia";
const curUser = computed(() => usePage().props.value.auth.user);

const displayModal = ref(false);

const openModal = (event) => {
    if (!curUser.value) {
        event.preventDefault();
        event.stopPropagation();
        displayModal.value = true;
    }
};

const openModal2 = (event) => {
    if (!curUser.value) {
        event.preventDefault();
        event.stopPropagation();
        displayModal.value = true;
    }

    if (curUser.value && curUser.value.kyc_status != "Approved") {
        event.preventDefault();
        event.stopPropagation();
        displayModal.value = true;
    }
};
const closeModal = () => {
    //displayModal.value = false;
    if (!curUser.value) {
        Inertia.visit(route("login"));
    }
    if (curUser.value && curUser.value.kyc_status != "Approved") {
        Inertia.visit(route("kyc"));
    }
};
</script>
<template>
    <div class="hidden md:flex">
        <div class="w-60 shadow-md bg-white h-full">
            <ul
                class="relative px-1 divide-solid divide-y text-sm"
                v-if="curUser && curUser.role == 'admin'"
            >
                <li class="relative">
                    <NavLink
                        :href="route('home')"
                        :active="route().current('home')"
                    >
                        <i class="pi pi-home mr-3"></i>
                        <span class="font-bold">Home</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('projects')"
                        :active="route().current('projects')"
                    >
                        <i class="pi pi-chart-bar mr-3"></i>
                        <span class="font-bold">Project</span>
                    </NavLink>
                </li>

                <li class="relative">
                    <NavLink
                        :href="route('abs')"
                        :active="route().current('abs')"
                    >
                        <i class="pi pi-info-circle mr-3"></i>
                        <span class="font-bold">About ABS</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('my-team')"
                        :active="route().current('my-team')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">My Agency</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('admin.manage-member')"
                        :active="route().current('admin.manage-member')"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">Manage Member</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('admin.manage-topup')"
                        :active="route().current('admin.manage-topup')"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">Manage Topup</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('admin.manage-order')"
                        :active="route().current('admin.manage-order')"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">Manage Order</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('admin.manage-notification')"
                        :active="route().current('admin.manage-notification')"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">Manage Notification</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('settings')"
                        :active="route().current('settings')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-cog mr-3"></i>
                        <span class="font-bold">Settings</span>
                    </NavLink>
                </li>
            </ul>
            <ul class="relative px-1 divide-solid divide-y text-sm" v-else>
                <li class="relative">
                    <NavLink
                        :href="route('home')"
                        :active="route().current('home')"
                    >
                        <i class="pi pi-home mr-3"></i>
                        <span class="font-bold">Home</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('projects')"
                        :active="route().current('projects')"
                    >
                        <i class="pi pi-chart-bar mr-3"></i>
                        <span class="font-bold">Project</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('staking')"
                        :active="route().current('staking')"
                        :disabled="!curUser || curUser.kyc_status != 'Approved'"
                        @click.native.capture="openModal2"
                    >
                        <i class="pi pi-dollar mr-3"></i>
                        <span class="font-bold">Staking</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('abs')"
                        :active="route().current('abs')"
                    >
                        <i class="pi pi-info-circle mr-3"></i>
                        <span class="font-bold">About ABS</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('my-team')"
                        :active="route().current('my-team')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-users mr-3"></i>
                        <span class="font-bold">My Agency</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('kyc')"
                        :active="route().current('kyc')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-user-edit mr-3"></i>
                        <span class="font-bold">KYC</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('feedback-center')"
                        :active="route().current('feedback-center')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-question-circle mr-3"></i>
                        <span class="font-bold">Feedback Center</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('invitation')"
                        :active="route().current('invitation')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-share-alt mr-3"></i>
                        <span class="font-bold">Invitation</span>
                    </NavLink>
                </li>
                <li class="relative">
                    <NavLink
                        :href="route('settings')"
                        :active="route().current('settings')"
                        :disabled="!curUser"
                        @click.native.capture="openModal"
                    >
                        <i class="pi pi-cog mr-3"></i>
                        <span class="font-bold">Settings</span>
                    </NavLink>
                </li>
            </ul>
        </div>
    </div>
    <Teleport to="body">
        <Dialog
            header="ABS"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <div v-if="!curUser">
                <h1>Login Now</h1>
                <p>Please login now for more action</p>
            </div>
            <div v-else-if="curUser.kyc_status != 'Approved'">
                <h1>Pending KYC</h1>
                <p>Please complete KYC for more action</p>
            </div>
            <template #footer>
                <div class="text-center">
                    <div v-if="!curUser">
                        <Button label="Login Now" @click="closeModal" />
                    </div>
                    <div v-else-if="curUser.kyc_status != 'Approved'">
                        <Button label="Proceed KYC" @click="closeModal" />
                    </div>
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
