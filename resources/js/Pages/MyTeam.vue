<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { onMounted, reactive, ref, watch } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { computed } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { getActiveLanguage } from "laravel-vue-i18n";
const props = defineProps({
    users: Array,
    directUsers: Array,
    filters: Object,
});

const form = useForm({
    search: "",
});

const treeUsers = computed(() => props.users.map((u) => renderUser(u, 0)));
const renderUser = (user, level) => {
    return {
        key: user.id,
        label: user.username,
        /* icon: "pi pi-fw pi-star-fill", */
        data: user.invite_code,
        //leaf: user.children ? true : false,
        level: level,
        personal_sales: user.personal_sales,
        direct_sales: user.direct_sales,
        group_sales: user.group_sales,
        ranking_en: user.user_ranking?.name_en,
        ranking_cn: user.user_ranking?.name_cn,
        ranking_image: user.user_ranking?.image,
        children: user.children?.map((c) => renderUser(c, level + 1)),
    };
};

const search = ref(props.filters.search);
watch(
    search,
    debounce(function (value) {
        Inertia.get(
            route("my-team"),
            { search: value },
            { preserveState: true }
        );
    }, 300)
);
const curUser = computed(() => usePage().props.value.auth.user);
const statuses = {
    1: { en: "Active", cn: "活跃" },
    2: { en: "Inactive", cn: "不活跃" },
};
</script>

<template>
    <AppLayoutNew :title="$t('public.my_agency')">
        <div class="m-8">
            <h1>{{ $t("public.my_agency") }}</h1>
            <Card class="drop-shadow-lg mt-5">
                <template #content>
                    <div class="grid grid-cols-12 text-center gap-4">
                        <div class="col-span-6">
                            <p>{{ $t("public.total_agent") }}</p>
                            <p>{{ curUser.total_group }}</p>
                        </div>
                        <div class="col-span-6">
                            <p>{{ $t("public.direct_agent") }}</p>
                            <p>{{ curUser.total_direct }}</p>
                        </div>
                        <div class="col-span-6">
                            <p>{{ $t("public.group_sales") }}</p>
                            <p>${{ curUser.group_sales }}</p>
                        </div>
                        <div class="col-span-6">
                            <p>{{ $t("public.personal_sales") }}</p>
                            <p>${{ curUser.personal_sales }}</p>
                        </div>
                    </div>
                </template>
            </Card>

            <TabView class="mt-5">
                <TabPanel :header="$t('public.agent_structure')">
                    <span class="p-input-icon-left w-full mb-5">
                        <i class="pi pi-search text-primary" />
                        <InputText
                            class="w-full"
                            type="text"
                            v-model="search"
                            :placeholder="
                                $t('public.search', {
                                    attribute: $t('public.username'),
                                })
                            "
                        />
                    </span>
                    <Tree :value="treeUsers">
                        <template #default="slotProps">
                            <div class="flex items-center justify-between">
                                <div>
                                    <b>{{ slotProps.node.label }} </b>
                                    <Avatar
                                        :image="slotProps.node.ranking_image"
                                    />
                                </div>
                                <div v-if="slotProps.node.level > 0">
                                    {{
                                        $t("public.level", {
                                            level: slotProps.node.level,
                                        })
                                    }}
                                </div>
                            </div>
                            <div>
                                <p>
                                    {{
                                        $t("public.agency_level", {
                                            level: slotProps.node[
                                                `ranking_${getActiveLanguage()}`
                                            ],
                                        })
                                    }}
                                </p>
                            </div>
                            <div class="flex items-stretch space-x-5">
                                <div>
                                    <p>{{ $t("public.personal_invest") }}</p>
                                    <p>${{ slotProps.node.personal_sales }}</p>
                                </div>
                                <div>
                                    <p>{{ $t("public.personal_sales") }}</p>
                                    <p>${{ slotProps.node.direct_sales }}</p>
                                </div>
                                <div>
                                    <p>{{ $t("public.group_sales") }}</p>
                                    <p>${{ slotProps.node.group_sales }}</p>
                                </div>
                            </div>
                        </template>
                    </Tree>
                    <!--  <div class="w-full">
                        <span class="p-input-icon-left w-full">
                            <i class="pi pi-search text-primary" />
                            <InputText
                                class="w-full"
                                type="text"
                                v-model="form.search"
                                placeholder="Search Username"
                            />
                        </span>
                        <Divider class="border-t-2" />
                        <div class="bg-gray-300 p-5">
                            <div class="flex justify-between">
                                <div class="flex align-items-center">
                                    <p>Name</p>
                                    <Avatar image="/images/ranking/01.png" />
                                </div>
                                <div><i class="pi pi-caret-down"></i></div>
                            </div>
                            <div>
                                <p>Agency Level: Agency Manager</p>
                            </div>
                            <div class="flex align-items-stretch space-x-5">
                                <div>
                                    <p>Personal Invest</p>
                                    <p>$0.0000</p>
                                </div>
                                <div>
                                    <p>Personal Sales</p>
                                    <p>$0.0000</p>
                                </div>
                                <div>
                                    <p>Personal Sales</p>
                                    <p>$0.0000</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </TabPanel>
                <TabPanel :header="$t('public.direct_agent')">
                    <div v-for="dUser in directUsers">
                        <div class="flex justify-between">
                            <p>{{ dUser.username }}</p>
                            <p>
                                <Tag
                                    v-if="dUser.status == 1"
                                    :value="statuses['1'][getActiveLanguage()]"
                                    severity="success"
                                />
                                <Tag
                                    v-else-if="dUser.status == 0"
                                    :value="statuses['2'][getActiveLanguage()]"
                                    severity="error"
                                />
                                <Tag v-else value="Unknown" severity="info" />
                            </p>
                        </div>

                        <div class="flex align-items-stretch space-x-5">
                            <div>
                                <p>{{ $t("public.personal_invest") }}</p>
                                <p>${{ dUser.personal_sales }}</p>
                            </div>
                            <div>
                                <p>{{ $t("public.personal_sales") }}</p>
                                <p>${{ dUser.direct_sales }}</p>
                            </div>
                            <div>
                                <p>{{ $t("public.group_sales") }}</p>
                                <p>${{ dUser.group_sales }}</p>
                            </div>
                        </div>
                        <Divider class="border-t-2" />
                    </div>
                </TabPanel>
            </TabView>
        </div>
    </AppLayoutNew>
</template>

<style scoped lang="css">
.main-con {
    background-image: url(/images/BG-15-new.png);
    background-repeat: no-repeat;
    background-size: contain;
}
.main-title {
    position: absolute;
    top: 150px;
    font-size: 24px;
    font-weight: 700;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000;
}
::v-deep(.p-tabview-nav) {
    justify-content: center !important;
}
</style>
