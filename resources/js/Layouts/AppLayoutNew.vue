<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetApplicationMark from "@/Components/ApplicationMark.vue";
import JetBanner from "@/Components/Banner.vue";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import JetNavLink from "@/Components/NavLink.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

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
            <!-- <div class="w-3/4 mx-auto">
        
        </div> -->
            <div class="flex flex-row flex-1 overflow-hidden">
                <div class="bg-red-500 hidden lg:flex">
                    <div class="w-60 flex-auto shadow-md bg-white px-1">
                        <ul class="relative">
                            <li class="relative">
                                <Link
                                    href="home"
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    >Home</Link
                                >
                            </li>
                            <li class="relative">
                                <Link
                                    href="my-team"
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    >My Agency</Link
                                >
                            </li>
                            <li class="relative">
                                <Link
                                    href="invitation"
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    >Invitation</Link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-1 flex-grow overflow-y-scroll no-scrollbar">
                    <slot />
                </div>
                <div class="bg-yellow-500 hidden lg:flex">
                    <div class="bg-red-500 hidden lg:flex">
                        <div class="w-60 flex-auto shadow-md bg-white px-1">
                            <!--  <ul class="relative">
                                <li class="relative">
                                    <a
                                        class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                        href="#!"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="dark"
                                        >Sidenav link 1</a
                                    >
                                </li>
                                <li class="relative">
                                    <a
                                        class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                        href="#!"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="dark"
                                        >Sidenav link 2</a
                                    >
                                </li>
                                <li class="relative">
                                    <a
                                        class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                        href="#!"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="dark"
                                        >Sidenav link 2</a
                                    >
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
