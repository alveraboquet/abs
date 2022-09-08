<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { Inertia } from "@inertiajs/inertia";
import { getActiveLanguage } from "laravel-vue-i18n";

const curUser = computed(() => usePage().props.value.auth.user);

const logout = () => {
    Inertia.post(route("logout"));
};
</script>
<template>
    <AppLayoutNew :title="$t('public.profile')">
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
                                {{ curUser.username }}
                            </p>
                            <p>
                                {{
                                    $t("public.agency_level", {
                                        level: curUser.user_ranking[
                                            `name_${getActiveLanguage()}`
                                        ],
                                    })
                                }}
                            </p>
                        </div>
                        <hr class="my-4" />
                        <div class="grid grid-cols-3">
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>
                                    {{ $t("public.agency_total_invest") }}
                                </p>
                                <p class="text-primary font-bold">
                                    ${{ curUser.group_sales }}
                                </p>
                            </div>
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>
                                    {{ $t("public.agency_total_sharing") }}
                                </p>
                                <p class="text-primary font-bold">
                                    ${{ curUser.total_sharing.toFixed(4) }}
                                </p>
                            </div>
                            <div class="col-span-3 md:col-span-1 text-center">
                                <i class="pi pi-money-bill"></i>
                                <p>
                                    {{ $t("public.agency_weekly_sharing") }}
                                </p>
                                <p class="text-primary font-bold">
                                    ${{ curUser.weekly_sharing.toFixed(4) }}
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
                                    <p>{{ $t("public.usdt_assets") }}</p>
                                    <i class="pi pi-angle-right"></i>
                                </div>
                                <p class="font-bold">
                                    ${{ curUser.usdt_wallet }}
                                </p>
                            </Link>
                            <Link
                                :href="route('roi.asset')"
                                class="text-center"
                            >
                                <div class="flex items-center">
                                    <p>{{ $t("public.usdt_assets") }}</p>
                                    <i class="pi pi-angle-right"></i>
                                </div>
                                <p class="font-bold">
                                    ${{ curUser.roi_wallet }}
                                </p>
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
                                    <span class="font-bold">
                                        {{ $t("public.topup_now") }}</span
                                    >
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
                                            {{
                                                $t("public.auto_receipt_record")
                                            }}
                                        </p>
                                        <p>
                                            {{
                                                $t(
                                                    "public.weekly_auto_distribution"
                                                )
                                            }}
                                        </p>
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
                            <span class="font-bold">{{
                                $t("public.my_agency")
                            }}</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('notifications')"
                            :active="route().current('notifications')"
                        >
                            <i class="pi pi-bell mr-3"></i>
                            <span class="font-bold">{{
                                $t("public.notification")
                            }}</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('kyc')"
                            :active="route().current('kyc')"
                        >
                            <i class="pi pi-user-edit mr-3"></i>
                            <span class="font-bold">{{
                                $t("public.kyc")
                            }}</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('feedback-center')"
                            :active="route().current('feedback-center')"
                        >
                            <i class="pi pi-question-circle mr-3"></i>
                            <span class="font-bold">{{
                                $t("public.feedback_center")
                            }}</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('invitation')"
                            :active="route().current('invitation')"
                        >
                            <i class="pi pi-share-alt mr-3"></i>
                            <span class="font-bold">{{
                                $t("public.invitation")
                            }}</span>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('settings')"
                            :active="route().current('settings')"
                        >
                            <i class="pi pi-cog mr-3"></i>
                            <span class="font-bold">{{
                                $t("public.settings")
                            }}</span>
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

                                    <span class="align-middle">{{
                                        $t("public.logout")
                                    }}</span>
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
