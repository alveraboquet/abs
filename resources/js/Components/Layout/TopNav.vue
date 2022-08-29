<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "vue";
defineProps({
    title: String,
});

const curUser = computed(() => usePage().props.value.auth.user);
const logout = () => {
    Inertia.post(route("logout"));
};
const back = () => {
    window.history.back();
};

const displayModal = ref(false);

const openModal = (event) => {
    if (!curUser.value) {
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
};
const routes = ["home", "projects", "staking", "abs", "profile"];
const showBack = computed(() => {
    return routes.every((e) => e != route().current());
});
</script>
<template>
    <!-- <Toolbar class="!bg-white !border-none">
            <template #start>
                <i class="pi pi-arrow-left text-primary" @click="back"></i>
                {{ title }}
            </template>
            <template #end>
                <Link class="mr-8" href="/notifications">
                    <i class="pi pi-bell text-primary"></i>
                </Link>
            </template>
        </Toolbar> -->
    <Toolbar
        class="!bg-white md:!bg-[#00178a] md:!border-none md:text-white h-16 !px-8"
    >
        <template #start>
            <Image
                alt="logo"
                src="/images/logo/logo-05.png"
                style="width: 84px"
                class="hidden md:block"
            />

            <p class="ml-5 hidden md:block" v-if="curUser">
                Welcome, {{ curUser.username }}
            </p>
            <i
                v-if="showBack"
                class="md:hidden mr-3 pi pi-arrow-left text-primary"
                @click="back"
            ></i>
            <p class="md:hidden">{{ title }}</p>
        </template>
        <template #end>
            <div v-if="curUser" class="flex items-center">
                <Link class="mr-8" :href="route('notifications')">
                    <i class="pi pi-bell text-sky-400 align-middle"></i>
                    <span class="hidden md:inline-block align-middle">
                        Notifications</span
                    >
                </Link>

                <form @submit.prevent="logout" class="mr-8 hidden md:block">
                    <button type="submit">
                        <i class="pi pi-sign-out text-red-600 align-middle"></i>
                        <span class="align-middle">Logout</span>
                    </button>
                </form>
            </div>
            <div v-else>
                <Link
                    class="mr-8 md:hidden"
                    :href="route('notifications')"
                    @click.native.capture="openModal"
                >
                    <i class="pi pi-bell text-sky-400"></i>
                </Link>
                <Link class="mr-8 hidden md:block" :href="route('login')">
                    <span> Login Now</span>
                </Link>
            </div>
        </template>
    </Toolbar>

    <Teleport to="body">
        <Dialog
            header="ABS"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <h1>Login Now</h1>
            <p>Please login now for more action</p>
            <template #footer>
                <div class="text-center">
                    <Button label="Login Now" @click="closeModal" />
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
