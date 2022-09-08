<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
import { FilterMatchMode, FilterOperator } from "primevue/api";

const props = defineProps({
    lists: Array,
});

const viewDialog = ref(false);
const deleteDialog = ref(false);
const item = ref({});
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    status: {
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
    Inertia.post(route("admin.update-withdraw"), item.value, {
        onSuccess: () => {
            viewDialog.value = false;
            item.value = {};
        },
        onError: (e) => {
            console.log(e);
        },
    });
}
function editItem(p) {
    item.value = { ...p };
    viewDialog.value = true;
}

function exportCSV() {
    dt.value.exportCSV();
}
const withdrawStatusesOption = [
    { value: "Pending", en: "Pending", cn: "等待审核" },
    { value: "Rejected", en: "Rejected", cn: "已拒绝" },
    { value: "Approved", en: "Approved", cn: "已通过" },
];
const withdrawStatuses = {
    Pending: { en: "Pending", cn: "等待审核" },
    Rejected: { en: "Rejected", cn: "已拒绝" },
    Approved: { en: "Approved", cn: "已通过" },
};
</script>
<template>
    <AppLayoutNew :title="$t('public.manage', { name: $t('public.withdraw') })">
        <div class="h-full p-8">
            <Banner />
            <ValidationErrors />
            <div class="card">
                <!-- <Toolbar class="mb-4">
                    <template #start>
                        <Button
                            label="New"
                            icon="pi pi-plus"
                            class="p-button-success mr-2"
                            @click="openNew"
                        />
                    </template>

                    <template #end>
                        <Button
                            label="Export"
                            icon="pi pi-upload"
                            class="p-button-help"
                            @click="exportCSV($event)"
                        />
                    </template>
                </Toolbar>
 -->
                <DataTable
                    ref="dt"
                    :value="lists"
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
                                        name: $t("public.withdraw"),
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
                        field="payment_id"
                        :header="$t('public.payment_id')"
                        sortable
                    ></Column>
                    <Column
                        field="user.username"
                        :header="$t('public.user')"
                        sortable
                    ></Column>
                    <Column
                        field="bank_detail"
                        :header="$t('public.address')"
                        sortable
                    ></Column>
                    <Column
                        field="actual_amount"
                        :header="$t('public.amount')"
                        sortable
                    ></Column>
                    <Column
                        field="status"
                        :header="$t('public.status')"
                        sortable
                    >
                        <template #body="{ data }">
                            <Tag
                                v-if="data.status == 'Pending'"
                                severity="info"
                                >{{
                                    withdrawStatuses[data.status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Rejected'"
                                severity="danger"
                                >{{
                                    withdrawStatuses[data.status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Approved'"
                                severity="success"
                                >{{
                                    withdrawStatuses[data.status][
                                        getActiveLanguage()
                                    ]
                                }}</Tag
                            >
                        </template>
                        <template #filter="{ filterModel }">
                            <Dropdown
                                v-model="filterModel.value"
                                :options="statuses"
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
                                :disabled="slotProps.data.status != 'Pending'"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Dialog
                v-model:visible="viewDialog"
                :style="{ width: '450px' }"
                :header="$t('public.details', { name: $t('public.payment') })"
                :modal="true"
                :closeOnEscape="false"
                :draggable="false"
                class="p-fluid"
            >
                <div class="field">
                    <label for="status" class="mb-3">{{
                        $t("public.status")
                    }}</label>
                    <Dropdown
                        id="status"
                        v-model="item.status"
                        :options="withdrawStatusesOption"
                        :option-label="getActiveLanguage()"
                        optionValue="value"
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
        </div>
    </AppLayoutNew>
</template>
<style></style>
