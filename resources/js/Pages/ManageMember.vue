<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
const props = defineProps({
    users: Array,
    ranking: Array,
});
import { FilterMatchMode, FilterOperator } from "primevue/api";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

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

const kycStatuses = ref(["None", "Pending", "Approved", "Rejected"]);
</script>
<template>
    <AppLayoutNew title="manage member">
        <div class="h-full p-8">
            <Banner />
            <ValidationErrors />
            <div class="card">
                <Toolbar class="mb-4">
                    <template #start>
                        <Button
                            label="New"
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
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} members"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div
                            class="table-header flex flex-col md:flex-row md:justify-between"
                        >
                            <h5 class="mb-2 md:m-0">Manage Member</h5>
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="filters['global'].value"
                                    placeholder="Search..."
                                />
                            </span>
                        </div>
                    </template>
                    <Column field="email" header="Email" sortable></Column>
                    <Column
                        field="username"
                        header="Username"
                        sortable
                    ></Column>
                    <Column
                        field="full_name"
                        header="Full Name"
                        sortable
                    ></Column>
                    <Column
                        field="usdt_wallet"
                        header="USDT Asset"
                        sortable
                    ></Column>
                    <Column
                        field="roi_wallet"
                        header="ROI Asset"
                        sortable
                    ></Column>
                    <Column
                        field="user_ranking.name_en"
                        header="Ranking"
                        sortable
                    ></Column>
                    <Column field="kyc_status" header="KYC Status" sortable>
                        <template #body="{ data }">
                            <Tag
                                v-if="data.kyc_status == 'Pending'"
                                severity="info"
                                >{{ data.kyc_status }}</Tag
                            >
                            <Tag
                                v-else-if="data.kyc_status == 'Rejected'"
                                severity="danger"
                                >{{ data.kyc_status }}</Tag
                            >
                            <Tag
                                v-else-if="data.kyc_status == 'Approved'"
                                severity="success"
                                >{{ data.kyc_status }}</Tag
                            >
                            <Tag v-else severity="warning">{{
                                data.kyc_status
                            }}</Tag>
                        </template>
                        <template #filter="{ filterModel }">
                            <Dropdown
                                v-model="filterModel.value"
                                :options="kycStatuses"
                                placeholder="Any"
                                class="p-column-filter"
                                showClear
                            >
                            </Dropdown>
                        </template>
                    </Column>

                    <Column :exportable="false" style="min-width: 8rem">
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
            header="Member Details"
            :modal="true"
            :draggable="false"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="username">Username</label>
                <InputText
                    id="username"
                    v-model.trim="item.username"
                    required
                />
            </div>
            <div class="field">
                <label for="fullName">Full Name</label>
                <InputText
                    id="fullName"
                    v-model.trim="item.full_name"
                    required
                />
            </div>
            <div class="field">
                <label for="email">Email</label>
                <InputText for="email" v-model.trim="item.email" required />
            </div>

            <div class="field">
                <label for="ranking" class="mb-3">Ranking</label>
                <Dropdown
                    id="ranking"
                    v-model="item.ranking"
                    :options="ranking"
                    optionLabel="name_en"
                    optionValue="id"
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

        <Dialog
            v-model:visible="createAdminDialog"
            :style="{ width: '450px' }"
            header="Admin Details"
            :modal="true"
            :draggable="false"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="username">Username</label>
                <InputText
                    id="username"
                    v-model.trim="item.username"
                    required
                />
            </div>

            <div class="field">
                <label for="email">Email</label>
                <InputText for="email" v-model.trim="item.email" required />
            </div>
            <div class="field">
                <label class="">Password</label>
                <Password
                    class="w-full"
                    v-model="item.password"
                    toggleMask
                    :feedback="false"
                    placeholder="Type Password"
                />
            </div>
            <div class="field">
                <label class="">Security Pin</label>
                <Password
                    class="w-full"
                    v-model="item.security_pin"
                    toggleMask
                    :feedback="false"
                    placeholder="At least 6 digit Security PIN"
                />
            </div>

            <template #footer>
                <Button
                    label="Cancel"
                    icon="pi pi-times"
                    class="p-button-text"
                    @click="hideCreateAdmin"
                />
                <Button
                    label="Save"
                    icon="pi pi-check"
                    class="p-button-text"
                    @click="saveCreateAdmin"
                />
            </template>
        </Dialog>

        <Dialog
            v-model:visible="editKYCDialog"
            :style="{ width: '450px' }"
            header="KYC"
            :draggable="false"
            :modal="true"
            :closeOnEscape="false"
            class="p-fluid"
        >
            <div class="field">
                <label for="fullName">Full Name</label>
                <InputText
                    id="fullName"
                    v-model.trim="item.full_name"
                    disabled
                />
            </div>
            <div class="field">
                <label for="id_no">Identification No/Passport</label>
                <InputText for="id_no" v-model.trim="item.id_no" disabled />
            </div>
            <div class="field">
                <label for="usdt_address">Wallet Address</label>
                <InputText
                    for="usdt_address"
                    v-model.trim="item.usdt_address"
                    disabled
                />
            </div>
            <div v-if="item.id_type == 'ic'">
                <h3>IC</h3>
                <p>Front Image</p>
                <Image :src="item.front_img" image-class="w-48" preview></Image>
                <p>Back Image</p>
                <Image :src="item.back_img" image-class="w-48" preview></Image>
            </div>
            <div v-else>
                <h3>Passport</h3>
                <p>Passport Image</p>
                <Image
                    :src="item.passport_img"
                    image-class="w-48"
                    preview
                ></Image>
            </div>
            <p>Hold Image</p>
            <Image :src="item.hold_img" image-class="w-48" preview></Image>
            <p>Utils Image</p>
            <Image :src="item.utils_img" image-class="w-48" preview></Image>

            <template #footer>
                <Button
                    label="Cancel"
                    icon="pi pi-times"
                    class="p-button-text"
                    @click="hideKYC"
                />
                <Button
                    label="Reject"
                    icon="pi pi-times"
                    class="p-button-text !text-red-500"
                    @click="saveKYC('Rejected')"
                />
                <Button
                    label="Approve"
                    icon="pi pi-check"
                    class="p-button-text !text-green-500"
                    @click="saveKYC('Approved')"
                />
            </template>
        </Dialog>
    </Teleport>
</template>
<style></style>
