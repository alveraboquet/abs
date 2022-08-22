<script setup>
import { onMounted, ref } from "vue";
import AppLayoutNew from "../Layouts/AppLayoutNew.vue";
const props = defineProps({
    users: Array,
});
import { FilterMatchMode } from "primevue/api";

const products = ref(props.users);
const productDialog = ref(false);
const deleteProductDialog = ref(false);
const product = ref({});
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
const submitted = ref(false);
const statuses = ref([
    { label: "INSTOCK", value: "instock" },
    { label: "LOWSTOCK", value: "lowstock" },
    { label: "OUTOFSTOCK", value: "outofstock" },
]);
const dt = ref(null);

function formatCurrency(value) {
    if (value)
        return value.toLocaleString("en-US", {
            style: "currency",
            currency: "USD",
        });
    return;
}
function openNew() {
    product.value = {};
    submitted.value = false;
    productDialog.value = true;
}
function hideDialog() {
    productDialog.value = false;
    submitted.value = false;
}
function saveProduct() {
    submitted.value = true;

    if (product.value.name.trim()) {
        //update or add
        //toast
        productDialog.value = false;
        product.value = {};
    }
}
function editProduct(product) {
    product.value = { ...product };
    productDialog.value = true;
}
function confirmDeleteProduct(product) {
    product.value = product;
    deleteProductDialog.value = true;
}
function deleteProduct() {
    //delete
    deleteProductDialog.value = false;
    product.value = {};
    //toast
}

function exportCSV() {
    dt.value.exportCSV();
}
</script>
<template>
    <AppLayoutNew title="manage member">
        <div>
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

                    <template #end>
                        <FileUpload
                            mode="basic"
                            accept="image/*"
                            :maxFileSize="1000000"
                            label="Import"
                            chooseLabel="Import"
                            class="mr-2 inline-block"
                        />
                        <Button
                            label="Export"
                            icon="pi pi-upload"
                            class="p-button-help"
                            @click="exportCSV($event)"
                        />
                    </template>
                </Toolbar>

                <DataTable
                    ref="dt"
                    :value="products"
                    dataKey="id"
                    :paginator="true"
                    :rows="10"
                    :filters="filters"
                    paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                    :rowsPerPageOptions="[5, 10, 25]"
                    currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products"
                    responsiveLayout="scroll"
                >
                    <template #header>
                        <div
                            class="table-header flex flex-column md:flex-row md:justiify-content-between"
                        >
                            <h5 class="mb-2 md:m-0 p-as-md-center">
                                Manage Products
                            </h5>
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
                        field="username"
                        header="Username"
                        :sortable="true"
                        style="min-width: 12rem"
                    ></Column>

                    <Column :exportable="false" style="min-width: 8rem">
                        <template #body="slotProps">
                            <Button
                                icon="pi pi-pencil"
                                class="p-button-rounded p-button-success mr-2"
                                @click="editProduct(slotProps.data)"
                            />
                            <Button
                                icon="pi pi-trash"
                                class="p-button-rounded p-button-warning"
                                @click="confirmDeleteProduct(slotProps.data)"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Dialog
                v-model:visible="productDialog"
                :style="{ width: '450px' }"
                header="Product Details"
                :modal="true"
                class="p-fluid"
            >
                <img
                    src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                    :alt="product.image"
                    class="product-image"
                    v-if="product.image"
                />
                <div class="field">
                    <label for="name">Name</label>
                    <InputText
                        id="name"
                        v-model.trim="product.name"
                        required="true"
                        autofocus
                        :class="{ 'p-invalid': submitted && !product.name }"
                    />
                    <small class="p-error" v-if="submitted && !product.name"
                        >Name is required.</small
                    >
                </div>
                <div class="field">
                    <label for="description">Description</label>
                    <Textarea
                        id="description"
                        v-model="product.description"
                        required="true"
                        rows="3"
                        cols="20"
                    />
                </div>

                <div class="field">
                    <label for="inventoryStatus" class="mb-3"
                        >Inventory Status</label
                    >
                    <Dropdown
                        id="inventoryStatus"
                        v-model="product.inventoryStatus"
                        :options="statuses"
                        optionLabel="label"
                        placeholder="Select a Status"
                    >
                        <template #value="slotProps">
                            <div
                                v-if="slotProps.value && slotProps.value.value"
                            >
                                <span
                                    :class="
                                        'product-badge status-' +
                                        slotProps.value.value
                                    "
                                    >{{ slotProps.value.label }}</span
                                >
                            </div>
                            <div
                                v-else-if="
                                    slotProps.value && !slotProps.value.value
                                "
                            >
                                <span
                                    :class="
                                        'product-badge status-' +
                                        slotProps.value.toLowerCase()
                                    "
                                    >{{ slotProps.value }}</span
                                >
                            </div>
                            <span v-else>
                                {{ slotProps.placeholder }}
                            </span>
                        </template>
                    </Dropdown>
                </div>

                <div class="field">
                    <label class="mb-3">Category</label>
                    <div class="formgrid grid">
                        <div class="field-radiobutton col-6">
                            <RadioButton
                                id="category1"
                                name="category"
                                value="Accessories"
                                v-model="product.category"
                            />
                            <label for="category1">Accessories</label>
                        </div>
                        <div class="field-radiobutton col-6">
                            <RadioButton
                                id="category2"
                                name="category"
                                value="Clothing"
                                v-model="product.category"
                            />
                            <label for="category2">Clothing</label>
                        </div>
                        <div class="field-radiobutton col-6">
                            <RadioButton
                                id="category3"
                                name="category"
                                value="Electronics"
                                v-model="product.category"
                            />
                            <label for="category3">Electronics</label>
                        </div>
                        <div class="field-radiobutton col-6">
                            <RadioButton
                                id="category4"
                                name="category"
                                value="Fitness"
                                v-model="product.category"
                            />
                            <label for="category4">Fitness</label>
                        </div>
                    </div>
                </div>

                <div class="formgrid grid">
                    <div class="field col">
                        <label for="price">Price</label>
                        <InputNumber
                            id="price"
                            v-model="product.price"
                            mode="currency"
                            currency="USD"
                            locale="en-US"
                        />
                    </div>
                    <div class="field col">
                        <label for="quantity">Quantity</label>
                        <InputNumber
                            id="quantity"
                            v-model="product.quantity"
                            integeronly
                        />
                    </div>
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
                        @click="saveProduct"
                    />
                </template>
            </Dialog>

            <Dialog
                v-model:visible="deleteProductDialog"
                :style="{ width: '450px' }"
                header="Confirm"
                :modal="true"
            >
                <div class="confirmation-content">
                    <i
                        class="pi pi-exclamation-triangle mr-3"
                        style="font-size: 2rem"
                    />
                    <span v-if="product"
                        >Are you sure you want to delete
                        <b>{{ product.name }}</b
                        >?</span
                    >
                </div>
                <template #footer>
                    <Button
                        label="No"
                        icon="pi pi-times"
                        class="p-button-text"
                        @click="deleteProductDialog = false"
                    />
                    <Button
                        label="Yes"
                        icon="pi pi-check"
                        class="p-button-text"
                        @click="deleteProduct"
                    />
                </template>
            </Dialog>
        </div>
    </AppLayoutNew>
</template>
<style></style>
