<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
const props = defineProps({
    lists: Array,
    ranking: Array,
});
import { FilterMatchMode, FilterOperator } from "primevue/api";

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
const submitted = ref(false);
const dt = ref(null);

function openNew() {
    item.value = {};
    submitted.value = false;
    viewDialog.value = true;
}
function hideDialog() {
    viewDialog.value = false;
    submitted.value = false;
}
function saveItem() {
    submitted.value = true;

    Inertia.post("/topup/update", item.value, {
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
const statuses = ref(["Pending", "Approved", "Rejected"]);
</script>
<template>
    <AppLayoutNew title="Manage Topup">
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
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} records"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div
                            class="table-header flex flex-col md:flex-row md:justify-between"
                        >
                            <h5 class="mb-2 md:m-0">Manage Topup</h5>
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="filters['global'].value"
                                    placeholder="Search..."
                                />
                            </span>
                        </div>
                    </template>
                    <Column
                        field="payment_id"
                        header="Payment ID"
                        sortable
                    ></Column>
                    <Column
                        field="user.full_name"
                        header="User"
                        sortable
                    ></Column>
                    <Column field="TxID" header="TxID" sortable></Column>
                    <Column
                        field="actual_amount"
                        header="Amount"
                        sortable
                    ></Column>
                    <Column field="status" header="Status" sortable>
                        <template #body="{ data }">
                            <Tag
                                v-if="data.status == 'Pending'"
                                severity="info"
                                >{{ data.status }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Rejected'"
                                severity="danger"
                                >{{ data.status }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Approved'"
                                severity="success"
                                >{{ data.status }}</Tag
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
                    <Column header="Receipt" sortable>
                        <template #body="slotProps">
                            <Image
                                imageClass="w-10"
                                :src="slotProps.data.receipt"
                                preview
                            ></Image>
                        </template>
                    </Column>

                    <Column
                        header="Action"
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
                header="Payment Details"
                :modal="true"
                class="p-fluid"
            >
                <div class="field">
                    <label for="ranking" class="mb-3">Status</label>
                    <Dropdown
                        id="ranking"
                        v-model="item.status"
                        :options="statuses"
                        placeholder="Select a Status"
                    >
                    </Dropdown>
                </div>

                <template #footer>
                    <Button
                        label="Cancel"
                        icon="pi pi-times"
                        class="p-button-text"
                        @click="hideDialog"
                    />
                    <Button
                        label="Save"
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
