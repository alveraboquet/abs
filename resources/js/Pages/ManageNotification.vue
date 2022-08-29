<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

const props = defineProps({
    lists: Array,
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
const dt = ref(null);

function openNew() {
    fileUp.value = null;
    item.value = {};
    viewDialog.value = true;
}
function hideDialog() {
    fileUp.value = null;
    viewDialog.value = false;
}
function saveItem() {
    if (item.value.id) {
        Inertia.post(
            route("admin.update-notification"),
            {
                ...item.value,
                timezone: new Date(item.value.start_date).getTimezoneOffset(),
            },
            {
                onSuccess: () => {
                    viewDialog.value = false;
                    item.value = {};
                },
                onError: (e) => {
                    console.log(e);
                },
            }
        );
    } else {
        Inertia.post(
            route("admin.create-notification"),
            {
                ...item.value,
                timezone: new Date(item.value.start_date).getTimezoneOffset(),
            },
            {
                onSuccess: () => {
                    viewDialog.value = false;
                    item.value = {};
                },
                onError: (e) => {
                    console.log(e);
                },
            }
        );
    }
}
function editItem(p) {
    item.value = { ...p, image: null };
    fileUp.value = p.image;
    viewDialog.value = true;
}

function exportCSV() {
    dt.value.exportCSV();
}
const statuses = ref(["Inactive", "Active"]);
const statuses2 = ref([
    { name: "Yes", value: 1 },
    { name: "No", value: 0 },
]);
const reader = new FileReader();
reader.onloadend = () => {
    //console.log(reader.result);
    fileUp.value = reader.result;
};

const fileUp = ref(null);
const testUpload = (e) => {
    let date = item.value.start_date;
    console.log(new Date(date).getTimezoneOffset());
    item.value.image = e.files[0];
    reader.readAsDataURL(e.files[0]);
};
</script>
<template>
    <AppLayoutNew title="Manage Notification">
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
                            @click="openNew"
                        />
                    </template>

                    <!--  <template #end>
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
                            <h5 class="mb-2 md:m-0">Manage Notification</h5>
                            <span class="p-input-icon-left">
                                <i class="pi pi-search" />
                                <InputText
                                    v-model="filters['global'].value"
                                    placeholder="Search..."
                                />
                            </span>
                        </div>
                    </template>
                    <Column field="title" header="Title" sortable></Column>
                    <Column
                        field="start_date"
                        header="Start Date"
                        sortable
                    ></Column>
                    <Column
                        field="end_date"
                        header="End Date"
                        sortable
                    ></Column>

                    <Column field="status" header="Status" sortable>
                        <template #body="{ data }">
                            <Tag
                                v-if="data.status == 'Inactive'"
                                severity="danger"
                                >{{ data.status }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Active'"
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
                                :disabled="slotProps.data.status != 'Active'"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Dialog
                v-model:visible="viewDialog"
                :style="{ width: '450px' }"
                header="Notification Details"
                :modal="true"
                :draggable="false"
                :closeOnEscape="false"
                class="p-fluid"
            >
                <div class="field">
                    <label for="title">Title</label>
                    <InputText id="title" v-model.trim="item.title" required />
                </div>
                <div class="field">
                    <label>Content</label>
                    <Editor
                        v-model="item.content"
                        editorStyle="height: 320px"
                    />
                </div>

                <div class="field">
                    <label>Image</label>
                    <FileUpload
                        name="demo[]"
                        mode="basic"
                        accept="image/*"
                        custom-upload
                        @select="testUpload($event)"
                    ></FileUpload>

                    <Image
                        v-if="fileUp"
                        :src="fileUp"
                        image-class="w-48"
                        preview
                    ></Image>
                </div>
                <div class="field">
                    <label>Start Date</label>
                </div>
                <Calendar
                    v-model="item.start_date"
                    touchUI
                    view="date"
                    :manualInput="false"
                />
                <div class="field">
                    <label>End Date</label>
                    <Calendar
                        v-model="item.end_date"
                        touchUI
                        view="date"
                        :manualInput="false"
                    />
                </div>

                <div class="field">
                    <label for="status" class="mb-3">Status</label>
                    <Dropdown
                        id="status"
                        v-model="item.status"
                        :options="statuses"
                        placeholder="Select a Status"
                    >
                    </Dropdown>
                </div>
                <div class="field">
                    <label for="popup" class="mb-3">Popup</label>
                    <Dropdown
                        id="popup"
                        v-model="item.popup"
                        :options="statuses2"
                        optionLabel="name"
                        optionValue="value"
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
