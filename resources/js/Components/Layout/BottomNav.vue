<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { eventNames } from "process";
import { computed, ref } from "vue";
import BottomNavLink from "../BottomNavLink.vue";
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
    <section
        id="bottom-navigation"
        class="md:hidden block inset-x-0 bottom-0 z-10 bg-[#00178a]"
    >
        <div id="tabs" class="flex justify-between">
            <BottomNavLink
                :href="route('home')"
                :active="route().current('home')"
            >
                <i class="pi pi-home inline-block mb-1 !text-xl"></i>
                <span class="block text-xs">{{ $t("public.home") }}</span>
            </BottomNavLink>
            <BottomNavLink
                :href="route('projects')"
                :active="route().current('projects')"
            >
                <i class="pi pi-chart-bar inline-block mb-1 !text-xl"></i>
                <span class="block text-xs">{{ $t("public.projects") }}</span>
            </BottomNavLink>
            <BottomNavLink
                :href="route('staking')"
                :active="route().current('staking')"
                :disabled="!curUser || curUser.kyc_status != 'Approved'"
                @click.native.capture="openModal2"
            >
                <i class="pi pi-dollar inline-block mb-1 !text-xl"></i>
                <span class="block text-xs">{{ $t("public.staking") }}</span>
            </BottomNavLink>
            <BottomNavLink
                :href="route('abs')"
                :active="route().current('abs')"
            >
                <i class="pi pi-info-circle inline-block mb-1 !text-xl"></i>
                <span class="block text-xs">{{ $t("public.about_ABS") }}</span>
            </BottomNavLink>

            <BottomNavLink
                :href="route('profile')"
                :active="route().current('profile')"
                :disabled="!curUser"
                @click.native.capture="openModal"
            >
                <i class="pi pi-user inline-block mb-1 !text-xl"></i>
                <span class="block text-xs">{{ $t("public.personal") }}</span>
            </BottomNavLink>
        </div>
    </section>

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
                <h1>{{ $t("public.login_now") }}</h1>
                <p>{{ $t("public.login_action") }}</p>
            </div>
            <div v-else-if="curUser.kyc_status != 'Approved'">
                <h1>{{ $t("public.pending_kyc") }}</h1>
                <p>{{ $t("public.kyc_action") }}</p>
            </div>
            <template #footer>
                <div class="text-center">
                    <div v-if="!curUser">
                        <Button
                            :label="$t('public.login_now')"
                            @click="closeModal"
                        />
                    </div>
                    <div v-else-if="curUser.kyc_status != 'Approved'">
                        <Button :label="$t('public.kyc')" @click="closeModal" />
                    </div>
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
