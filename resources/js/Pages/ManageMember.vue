<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
const props = defineProps({
    users: Array,
    ranking: Array,
});
import { FilterMatchMode } from "primevue/api";

const viewDialog = ref(false);
const deleteDialog = ref(false);
const item = ref({});
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
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

    if (item.value.name.trim()) {
        Inertia.post("/topup/update", item, {
            onSuccess: () => {
                viewDialog.value = false;
                item.value = {};
            },
            onError: (e) => {
                console.log(e);
            },
        });
        //update or add
        //toast
    }
}
function editItem(p) {
    item.value = { ...p };
    viewDialog.value = true;
}
function confirmDeleteItem(p) {
    item.value = p;
    deleteDialog.value = true;
}
function deleteItem() {
    //delete
    Inertia.post(
        "user/delete",
        { id: item.value.id },
        {
            onSuccess: () => {
                deleteDialog.value = false;
                item.value = {};
            },
            onError: (e) => {
                console.log(e);
            },
        }
    );

    //toast
}

function exportCSV() {
    dt.value.exportCSV();
}
</script>
<template>
    <AppLayoutNew title="manage member">
        <div class="h-full p-8">
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
                    :value="users"
                    dataKey="id"
                    paginator
                    :rows="10"
                    :filters="filters"
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
                        field="user_ranking.name_en"
                        header="Ranking"
                        sortable
                    ></Column>

                    <Column :exportable="false" style="min-width: 8rem">
                        <template #body="slotProps">
                            <Button
                                icon="pi pi-pencil"
                                class="p-button-rounded p-button-success mr-2"
                                @click="editItem(slotProps.data)"
                            />
                            <Button
                                icon="pi pi-trash"
                                class="p-button-rounded p-button-warning"
                                @click="confirmDeleteItem(slotProps.data)"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Dialog
                v-model:visible="viewDialog"
                :style="{ width: '450px' }"
                header="Member Details"
                :modal="true"
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
                v-model:visible="deleteDialog"
                :style="{ width: '450px' }"
                header="Confirm"
                :modal="true"
            >
                <div class="confirmation-content">
                    <i
                        class="pi pi-exclamation-triangle mr-3"
                        style="font-size: 2rem"
                    />
                    <span v-if="item"
                        >Are you sure you want to delete <b>{{ item.email }}</b
                        >?</span
                    >
                </div>
                <template #footer>
                    <Button
                        label="No"
                        icon="pi pi-times"
                        class="p-button-text"
                        @click="deleteDialog = false"
                    />
                    <Button
                        label="Yes"
                        icon="pi pi-check"
                        class="p-button-text"
                        @click="deleteItem"
                    />
                </template>
            </Dialog>
        </div>
    </AppLayoutNew>
</template>
<style></style>
