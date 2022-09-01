<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import NavLink from "@/Components/NavLink.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
const curUser = computed(() => usePage().props.value.auth.user);
</script>
<template>
    <div class="hidden md:flex" v-if="curUser">
        <div class="hidden md:flex">
            <div class="w-60 shadow-md bg-white h-full">
                <div class="pt-4 pb-2 px-2">
                    <div class="text-center">
                        <Avatar
                            image="/images/BG-10.png"
                            size="xlarge"
                            shape="circle"
                        />
                    </div>

                    <div class="flex items-center justify-center text-primary">
                        <b>{{ curUser.username }} </b>
                        <Avatar :image="curUser.user_ranking.image" />
                    </div>
                    <p class="text-xs text-center">
                        {{
                            $t("public.agency_level", {
                                level: curUser.user_ranking[
                                    `name_${getActiveLanguage()}`
                                ],
                            })
                        }}
                    </p>
                </div>
                <ul class="relative px-1 divide-solid divide-y text-xs">
                    <li class="relative">
                        <NavLink
                            :href="route('usdt.asset')"
                            :active="route().current('usdt.asset')"
                        >
                            <div>{{ $t("public.usdt_assets") }}</div>
                            <template #right>
                                <div>${{ curUser.usdt_wallet }}</div>
                            </template>
                        </NavLink>
                    </li>
                    <li class="relative">
                        <NavLink
                            :href="route('roi.asset')"
                            :active="route().current('roi.asset')"
                        >
                            <div>{{ $t("public.roi_assets") }}</div>
                            <template #right>
                                <div>${{ curUser.roi_wallet }}</div>
                            </template>
                        </NavLink>
                    </li>
                </ul>
                <hr class="border-t-solid border-t-4" />
                <ul class="relative px-1 divide-solid divide-y text-xs">
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
                </ul>
                <hr class="border-t-solid border-t-4" />
                <ul class="relative px-1 divide-solid divide-y text-xs">
                    <li class="relative">
                        <NavLink
                            :href="route('roi.withdrawal-history')"
                            :active="route().current('roi.withdrawal-history')"
                        >
                            <i class="pi pi-book mr-3"></i>
                            <span>
                                <p class="font-bold">
                                    {{ $t("public.auto_receipt_record") }}
                                </p>
                                <p>
                                    {{ $t("public.weekly_auto_distribution") }}
                                </p>
                            </span>
                        </NavLink>
                    </li>
                </ul>
                <hr class="border-t-solid border-t-4" />
                <ul class="relative px-1 divide-solid divide-y">
                    <li class="relative">
                        <div
                            class="flex justify-between py-4 px-2 h-12 items-center text-xs text-primary"
                        >
                            <i class="pi pi-money-bill mr-3"></i>
                            <span class="leading-none">
                                {{ $t("public.agency_total_invest") }}
                            </span>

                            <span class="font-bold">$475,000.0000</span>
                        </div>
                    </li>
                    <li class="relative">
                        <div
                            class="flex justify-between py-4 px-2 h-12 items-center text-xs text-primary"
                        >
                            <i class="pi pi-money-bill mr-3"></i>
                            <span class="leading-none">
                                {{ $t("public.agency_total_sharing") }}
                            </span>

                            <span class="font-bold">$475,000.0000</span>
                        </div>
                    </li>
                    <li class="relative">
                        <div
                            class="flex justify-between py-4 px-2 h-12 items-center text-xs text-primary"
                        >
                            <i class="pi pi-money-bill mr-3"></i>
                            <span class="leading-none">
                                {{ $t("public.agency_weekly_sharing") }}
                            </span>
                            <span class="font-bold">$475,000.0000</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
