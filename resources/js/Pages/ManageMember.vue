<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

const props = defineProps({
    users: Array,
    ranking: Array,
});

const viewDialog = ref(false);
const editKYCDialog = ref(false);
const createAdminDialog = ref(false);
const item = ref({});
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    kyc_status: {
        operator: FilterOperator.OR,
        constraints: [{ value: null, matchMode: FilterMatchMode.EQUALS }],
    },
});
const dt = ref(null);

function openNew() {
    item.value = {};
    viewDialog.value = true;
}
function hideDialog() {
    viewDialog.value = false;
}
function saveItem() {
    Inertia.post(route("admin.update-user"), item.value, {
        onSuccess: () => {
            viewDialog.value = false;
            item.value = {};
        },
        onError: (e) => {
            console.log(e);
        },
    });
    //update or add
}
function editItem(p) {
    item.value = { ...p };
    viewDialog.value = true;
}
function saveKYC(status) {
    Inertia.post(
        route("admin.update-kyc"),
        { id: item.value.id, status: status },
        {
            onSuccess: () => {
                editKYCDialog.value = false;
                item.value = {};
            },
            onError: (e) => {
                console.log(e);
            },
        }
    );
    //update or add
}

function editKYC(p) {
    item.value = { ...p };
    editKYCDialog.value = true;
}
function hideKYC() {
    editKYCDialog.value = false;
}

function exportCSV() {
    dt.value.exportCSV();
}

function openCreateAdmin() {
    item.value = {};
    createAdminDialog.value = true;
}
function hideCreateAdmin() {
    createAdminDialog.value = false;
}
function saveCreateAdmin() {
    Inertia.post(route("admin.create-admin"), item.value, {
        onSuccess: () => {
            createAdminDialog.value = false;
            item.value = {};
        },
        onError: (e) => {
            console.log(e);
        },
    });
    //update or add
}
const kycStatusesOption = [
    { value: "None", en: "None", cn: "无" },
    { value: "Pending", en: "Pending", cn: "等待审核" },
    { value: "Rejected", en: "Rejected", cn: "已拒绝" },
    { value: "Approved", en: "Approved", cn: "已通过" },
];
const kycStatuses = {
    None: { en: "None", cn: "无" },
    Pending: { en: "Pending", cn: "等待审核" },
    Rejected: { en: "Rejected", cn: "已拒绝" },
    Approved: { en: "Approved", cn: "已通过" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.manage', { name: $t('public.member') })">
        <div class="h-full p-8">
            <Banner />
            <ValidationErrors />
            <div class="card">
                <Toolbar class="mb-4">
                    <template #start>
                        <Button
                            :label="$t('public.new')"
                            icon="pi pi-plus"
                            class="p-button-success mr-2"
                            @click="openCreateAdmin"
                        />
                    </template>

                    <!-- <template #end>
                        <Button
                            label="Export"
                            icon="pi pi-upload"
                            class="p-button-help"
                            @click="exportCSV($event)"
                        />
                    </template> -->
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="users"
                    dataKey="id"
                    paginator
                    :rows="10"
                    v-model:filters="filters"
                    filterDisplay="menu"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    :currentPageReportTemplate="
                        $t('public.pagination_template')
                    "
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div
                            class="table-header flex flex-col md:flex-row md:justify-between"
                        >
                            <h5 class="mb-2 md:m-0">
                                {{
                                    $t("public.manage", {
                                        name: $t("public.member"),
                                    })
                                }}
                            </h5>
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="filters['global'].value"
                                    :placeholder="
                                        $t('public.search', {
                                            attribute: '',
                                        })
                                    "
                                />
                            </span>
                        </div>
                    </template>
                    <Column
                        field="email"
                        :header="$t('public.email')"
                        sortable
                    ></Column>
                    <Column
                        field="username"
                        :header="$t('public.username')"
                        sortable
                    ></Column>
                    <Column
                        field="full_name"
                        :header="$t('public.full_name')"
                        sortable
                    ></Column>
                    <Column
                        field="usdt_wallet"
                        :header="$t('public.usdt_assets')"
                        sortable
                    ></Column>
                    <Column
                        field="roi_wallet"
                        :header="$t('public.roi_assets')"
                        sortable
                    ></Column>
                    <Column
                        :field="`user_ranking.name_${getActiveLanguage()}`"
                        :header="$t('public.ranking')"
                        sortable
                    ></Column>
                    <Column
                        field="kyc_status"
                        :header="$t('public.kyc_status')"
                        sortable
                    >
                        <template #body="{ data }">
                            <Tag
                                v-if="data.kyc_status == 'Pending'"
                                severity="info"
                                >{{
                                    kycStatuses[data.kyc_status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                            <Tag
                                v-else-if="data.kyc_status == 'Rejected'"
                                severity="danger"
                                >{{
                                    kycStatuses[data.kyc_status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                            <Tag
                                v-else-if="data.kyc_status == 'Approved'"
                                severity="success"
                                >{{
                                    kycStatuses[data.kyc_status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                            <Tag v-else severity="warning">{{
                                kycStatuses[data.kyc_status][
                                    getActiveLanguage()
                                ]
                            }}</Tag>
                        </template>
                        <template #filter="{ filterModel }">
                            <Dropdown
                                v-model="filterModel.value"
                                :options="kycStatusesOption"
                                :option-label="getActiveLanguage()"
                                option-value="value"
                                placeholder="Any"
                                class="p-column-filter"
                                showClear
                            >
                            </Dropdown>
                        </template>
                    </Column>

                    <Column
                        :header="$t('public.action')"
                        :exportable="false"
                        style="min-width: 8rem"
                    >
                        <template #body="slotProps">
                            <Button
                                icon="pi pi-pencil"
                                class="p-button-rounded p-button-success mr-2"
                                @click="editItem(slotProps.data)"
                            />
                            <Button
                                v-if="slotProps.data.kyc_status == 'Pending'"
                                icon="pi pi-id-card"
                                class="p-button-rounded p-button-success mr-2"
                                @click="editKYC(slotProps.data)"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </AppLayoutNew>

    <Teleport to="body">
        <Dialog
            v-model:visible="viewDialog"
            :style="{ width: '450px' }"
            :header="$t('public.details', { name: $t('public.member') })"
            :modal="true"
            :draggable="false"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="username">{{ $t("public.username") }}</label>
                <InputText
                    id="username"
                    v-model.trim="item.username"
                    required
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.username'),
                        })
                    "
                />
            </div>
            <div class="field">
                <label for="fullName">{{ $t("public.full_name") }}</label>
                <InputText
                    id="fullName"
                    v-model.trim="item.full_name"
                    required
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.full_name'),
                        })
                    "
                />
            </div>
            <div class="field">
                <label for="email">{{ $t("public.email") }}</label>
                <InputText
                    for="email"
                    v-model.trim="item.email"
                    required
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.email'),
                        })
                    "
                />
            </div>

            <div class="field">
                <label for="ranking" class="mb-3">{{
                    $t("public.ranking")
                }}</label>
                <Dropdown
                    id="ranking"
                    v-model="item.ranking"
                    :options="ranking"
                    optionLabel="name_en"
                    optionValue="id"
                >
                </Dropdown>
            </div>

            <template #footer>
                <Button
                    :label="$t('public.cancel')"
                    icon="pi pi-times"
                    class="p-button-text"
                    @click="hideDialog"
                />
                <Button
                    :label="$t('public.save')"
                    icon="pi pi-check"
                    class="p-button-text"
                    @click="saveItem"
                />
            </template>
        </Dialog>

        <Dialog
            v-model:visible="createAdminDialog"
            :style="{ width: '450px' }"
            :header="$t('public.details', { name: $t('public.admin') })"
            :modal="true"
            :draggable="false"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="username">{{ $t("public.username") }}</label>
                <InputText
                    id="username"
                    v-model.trim="item.username"
                    required
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.username'),
                        })
                    "
                />
            </div>

            <div class="field">
                <label for="email">{{ $t("public.email") }}</label>
                <InputText
                    for="email"
                    v-model.trim="item.email"
                    required
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.email'),
                        })
                    "
                />
            </div>
            <div class="field">
                <label class="">{{ $t("public.password") }}</label>
                <Password
                    class="w-full"
                    v-model="item.password"
                    toggleMask
                    :feedback="false"
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.password'),
                        })
                    "
                />
            </div>
            <div class="field">
                <label class="">{{ $t("public.security_pin") }}</label>
                <Password
                    class="w-full"
                    v-model="item.security_pin"
                    toggleMask
                    :feedback="false"
                    :placeholder="
                        $t('public.placeholder', {
                            attribute: $t('public.security_pin'),
                        })
                    "
                />
            </div>

            <template #footer>
                <Button
                    :label="$t('public.cancel')"
                    icon="pi pi-times"
                    class="p-button-text"
                    @click="hideDialog"
                />
                <Button
                    :label="$t('public.save')"
                    icon="pi pi-check"
                    class="p-button-text"
                    @click="saveItem"
                />
            </template>
        </Dialog>

        <Dialog
            v-model:visible="editKYCDialog"
            :style="{ width: '450px' }"
            :header="$t('public.kyc')"
            :draggable="false"
            :modal="true"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="fullName">{{ $t("public.full_name") }}</label>
                <InputText
                    id="fullName"
                    v-model.trim="item.full_name"
                    disabled
                />
            </div>
            <div class="field">
                <label for="id_no">{{ $t("public.ic_passport") }}</label>
                <InputText for="id_no" v-model.trim="item.id_no" disabled />
            </div>
            <div class="field">
                <label for="usdt_address">{{
                    $t("public.wallet_address")
                }}</label>
                <InputText
                    for="usdt_address"
                    v-model.trim="item.usdt_address"
                    disabled
                />
            </div>
            <div v-if="item.id_type == 'ic'">
                <h3>{{ $t("public.id") }}</h3>
                <p>{{ $t("public.front_image") }}</p>
                <Image :src="item.front_img" image-class="w-48" preview></Image>
                <p>{{ $t("public.back_image") }}</p>
                <Image :src="item.back_img" image-class="w-48" preview></Image>
            </div>
            <div v-else>
                <h3>{{ $t("public.passport") }}</h3>
                <p>{{ $t("public.passport_image") }}</p>
                <Image
                    :src="item.passport_img"
                    image-class="w-48"
                    preview
                ></Image>
            </div>
            <p>{{ $t("public.hold_image") }}</p>
            <Image :src="item.hold_img" image-class="w-48" preview></Image>
            <p>{{ $t("public.utils_image") }}</p>
            <Image :src="item.utils_img" image-class="w-48" preview></Image>

            <template #footer>
                <Button
                    :label="$t('public.cancel')"
                    icon="pi pi-times"
                    class="p-button-text"
                    @click="hideKYC"
                />
                <Button
                    :label="$t('public.reject')"
                    icon="pi pi-times"
                    class="p-button-text !text-red-500"
                    @click="saveKYC('Rejected')"
                />
                <Button
                    :label="$t('public.approve')"
                    icon="pi pi-check"
                    class="p-button-text !text-green-500"
                    @click="saveKYC('Approved')"
                />
            </template>
        </Dialog>
    </Teleport>
</template>
<style></style>
