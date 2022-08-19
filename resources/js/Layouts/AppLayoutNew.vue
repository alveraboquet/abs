<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import JetApplicationMark from "@/Components/ApplicationMark.vue";
import JetBanner from "@/Components/Banner.vue";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import JetNavLink from "@/Components/NavLink.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { getActiveLanguage } from "laravel-vue-i18n";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    Inertia.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <div class="h-screen flex flex-col">
            <Toolbar>
                <template #start>
                    <Image
                        alt="logo"
                        src="/images/logo/logo-01.png"
                        style="width: 84px"
                    />

                    <p class="ml-5">
                        Welcome, {{ usePage().props.value.user.full_name }}
                    </p>
                </template>
                <template #end>
                    <Link as="button" class="mr-2">
                        <i class="pi pi-bell text-primary"></i> Notification
                    </Link>

                    <form @submit.prevent="logout">
                        <button type="submit">
                            <i class="pi pi-sign-out text-red-600"></i> Log Out
                        </button>
                    </form>
                </template>
            </Toolbar>

            <div class="flex flex-row flex-1 overflow-hidden">
                <div class="hidden lg:flex">
                    <div class="w-60 shadow-md bg-white h-full">
                        <ul class="relative px-1 divide-solid divide-y">
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="home"
                                >
                                    <i class="pi pi-home mr-3"></i>
                                    <span>Home</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="projects"
                                >
                                    <i class="pi pi-chart-bar mr-3"></i>
                                    <span>Project</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="#!"
                                >
                                    <i class="pi pi-dollar mr-3"></i>
                                    <span>Staking</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="#!"
                                >
                                    <i class="pi pi-info-circle mr-3"></i>
                                    <span>About ABS</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="my-team"
                                >
                                    <i class="pi pi-users mr-3"></i>
                                    <span>My Agency</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="#!"
                                >
                                    <i class="pi pi-user-edit mr-3"></i>
                                    <span>KYC</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="#!"
                                >
                                    <i class="pi pi-question-circle mr-3"></i>
                                    <span>Feedback Center</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out disabled:bg-red-500"
                                    href="invitation"
                                >
                                    <i class="pi pi-share-alt mr-3"></i>
                                    <span>Invitation</span>
                                </Link>
                            </li>
                            <li class="relative">
                                <Link
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="#!"
                                >
                                    <i class="pi pi-cog mr-3"></i>
                                    <span>Settings</span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-1 flex-grow overflow-y-scroll no-scrollbar">
                    <slot />
                </div>
                <div class="bg-yellow-500 hidden lg:flex">
                    <div class="hidden lg:flex">
                        <div class="w-60 shadow-md bg-white h-full">
                            <div class="pt-4 pb-2 px-6">
                                <div class="w-10 mx-auto">
                                    <Avatar
                                        image="/images/ranking/07.png"
                                        size="large"
                                        shape="circle"
                                    />
                                </div>

                                <div class="flex items-center justify-center">
                                    <b
                                        >{{
                                            usePage().props.value.user.full_name
                                        }}
                                    </b>
                                    <Avatar image="/images/ranking/01.png" />
                                </div>
                                <p class="text-xs text-center">
                                    Agency Level: Agency Manager
                                </p>
                            </div>
                            <ul class="relative px-1 divide-solid divide-y">
                                <li class="relative">
                                    <Link
                                        class="flex justify-between text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                        href="home"
                                    >
                                        <div>USDT Assets</div>
                                        <div>$00000.0000</div>
                                    </Link>
                                </li>
                                <li class="relative">
                                    <Link
                                        class="flex justify-between text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                        href="home"
                                    >
                                        <div>ROI Assets</div>
                                        <div>$00000.0000</div>
                                    </Link>
                                </li>
                            </ul>
                            <hr class="border-t-solid border-t-4" />
                            <ul class="relative px-1 divide-solid divide-y">
                                <li class="relative">
                                    <Link
                                        class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                        href="home"
                                    >
                                        <i class="pi pi-money-bill mr-3"></i>
                                        <span>Topup Now</span>
                                    </Link>
                                </li>
                            </ul>
                            <hr class="border-t-solid border-t-4" />
                            <ul class="relative px-1 divide-solid divide-y">
                                <li class="relative">
                                    <Link
                                        class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                        href="home"
                                    >
                                        <i class="pi pi-book mr-3"></i>
                                        <span
                                            ><p>Auto Receipt Record</p>
                                            <p>
                                                Weekly Auto Distribution
                                            </p></span
                                        >
                                    </Link>
                                </li>
                            </ul>
                            <hr class="border-t-solid border-t-4" />
                            <ul class="relative px-1 divide-solid divide-y">
                                <li class="relative">
                                    <div
                                        class="flex justify-between py-4 px-6 h-12 text-sm items-center"
                                    >
                                        <i class="pi pi-money-bill mr-3"></i>
                                        <span>Agency Total Invest</span>

                                        <span>$475,000.0000</span>
                                    </div>
                                </li>
                                <li class="relative">
                                    <div
                                        class="flex justify-between py-4 px-6 h-12 text-sm items-center"
                                    >
                                        <i class="pi pi-money-bill mr-3"></i>
                                        <span>Agency Total Sharing</span>

                                        <span>$475,000.0000</span>
                                    </div>
                                </li>
                                <li class="relative">
                                    <div
                                        class="flex justify-between py-4 px-6 h-12 text-sm items-center"
                                    >
                                        <i class="pi pi-money-bill mr-3"></i>
                                        <span>Agency Weekly Sharing</span>
                                        <span>$475,000.0000</span>
                                    </div>
                                </li>
                            </ul>
                            <!--   <hr class="my-2" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
