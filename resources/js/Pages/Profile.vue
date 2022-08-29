<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { Inertia } from "@inertiajs/inertia";

const curUser = computed(() => usePage().props.value.auth.user);

const logout = () => {
    Inertia.post(route("logout"));
};
</script>
<template>
    <AppLayoutNew title="Profile">
        <div class="bg-[url('/images/BG-02.png')] bg-no-repeat bg-auto">
            <div class="py-20 px-8 md:p-20">
                <Card class="!text-xs">
                    <template #header>
                        <div class="text-center">
                            <Avatar
                                image="/images/BG-10.png"
                                size="xlarge"
                                shape="circle"
                                class="-mt-8 border-4 border-white"
                            />
                        </div>
                    </template>
                    <template #content>
                        <div class="text-center">
                            <p class="font-bold">
                                {{ curUser.full_name }}
                            </p>
                            <p>
                                Agency Level: {{ curUser.user_ranking.name_en }}
                            </p>
                        </div>
                        <hr class="my-4" />
                        <div class="grid grid-cols-3">
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>Agency Total Invest</p>
                                <p class="text-primary font-bold">
                                    $497,000.0000
                                </p>
                            </div>
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>Agency Total Invest</p>
                                <p class="text-primary font-bold">
                                    $497,000.0000
                                </p>
                            </div>
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>Agency Total Invest</p>
                                <p class="text-primary font-bold">
                                    $497,000.0000
                                </p>
                            </div>
                        </div>
                    </template>
                </Card>

                <Card class="mt-4 !bg-transparent">
                    <template #content>
                        <div
                            class="flex justify-around items-center text-primary"
                        >
                            <Link
                                :href="route('usdt.asset')"
                                class="text-center"
                            >
                                <div class="flex items-center">
                                    <p>USDT Assets</p>
                                    <i class="pi pi-angle-right"></i>
                                </div>
                                <p class="font-bold">$497,000.0000</p>
                            </Link>
                            <Link
                                :href="route('roi.asset')"
                                class="text-center"
                            >
                                <div class="flex items-center">
                                    <p>ROI Assets</p>
                                    <i class="pi pi-angle-right"></i>
                                </div>
                                <p class="font-bold">$497,000.0000</p>
                            </Link>
                        </div>

                        <hr class="my-4" />
                        <ul class="relative px-1 divide-solid divide-y text-sm">
                            <li class="relative">
                                <NavLink
                                    :href="route('usdt.topup')"
                                    :active="route().current('usdt.topup')"
                                >
                                    <i class="pi pi-money-bill mr-3"></i>
                                    <span class="font-bold">Topup Now</span>
                                </NavLink>
                            </li>
                            <li class="relative">
                                <NavLink
                                    :href="route('roi.withdrawal-history')"
                                    :active="
                                        route().current(
                                            'roi.withdrawal-history'
                                        )
                                    "
                                >
                                    <i class="pi pi-book mr-3"></i>
                                    <span>
                                        <p class="font-bold">
                                            Auto Receipt Record
                                        </p>
                                        <p>Weekly Auto Distribution</p>
                                    </span>
                                </NavLink>
                            </li>
                        </ul>
                    </template>
                </Card>

                <ul class="relative px-1 divide-solid divide-y">
                    <li class="relative">
                        <NavLink
                            :href="route('my-team')"
                            :active="route().current('my-team')"
                        >
                            <i class="pi pi-users mr-3"></i>
                            <span class="font-bold">My Agency</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('notifications')"
                            :active="route().current('notifications')"
                        >
                            <i class="pi pi-bell mr-3"></i>
                            <span class="font-bold">Notifications</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('kyc')"
                            :active="route().current('kyc')"
                        >
                            <i class="pi pi-user-edit mr-3"></i>
                            <span class="font-bold">KYC</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('feedback-center')"
                            :active="route().current('feedback-center')"
                        >
                            <i class="pi pi-question-circle mr-3"></i>
                            <span class="font-bold">Feedback Center</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('invitation')"
                            :active="route().current('invitation')"
                        >
                            <i class="pi pi-share-alt mr-3"></i>
                            <span class="font-bold">Invitation</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('settings')"
                            :active="route().current('settings')"
                        >
                            <i class="pi pi-cog mr-3"></i>
                            <span class="font-bold">Settings</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <form @submit.prevent="logout">
                            <button
                                class="w-full py-4 px-2 h-12 flex items-center justify-between overflow-hidden text-red-500 text-ellipsis whitespace-nowrap rounded transition duration-300 ease-in-out"
                                type="submit"
                            >
                                <div class="flex items-center">
                                    <i
                                        class="pi pi-sign-out mr-3 text-red-600 align-middle"
                                    ></i>

                                    <span class="align-middle">Logout</span>
                                </div>

                                <div class="flex items-center">
                                    <div>
                                        <i class="pi pi-angle-right"> </i>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
