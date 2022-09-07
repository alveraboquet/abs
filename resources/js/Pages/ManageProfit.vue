<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { getActiveLanguage } from "laravel-vue-i18n";
import { FilterMatchMode, FilterOperator } from "primevue/api";
import dayjs from "dayjs";
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
    item.value = { date: dayjs().add(-1, "days").format("YYYY-MM-DD") };
    viewDialog.value = true;
}
function hideDialog() {
    viewDialog.value = false;
}
function saveItem() {
    Inertia.post(route("admin.update-profit"), item.value, {
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
</script>
<template>
    <AppLayoutNew :title="$t('public.manage', { name: $t('public.profit') })">
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
                                        name: $t("public.profit"),
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
                        field="date"
                        :header="$t('public.date')"
                        sortable
                    ></Column>
                    <Column
                        field="profit_1"
                        :header="$t('public.investor_profit')"
                        sortable
                    ></Column>

                    <!--  <Column
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
                    </Column> -->
                </DataTable>
            </div>

            <Dialog
                v-model:visible="viewDialog"
                :style="{ width: '450px' }"
                :header="$t('public.details', { name: $t('public.profit') })"
                :modal="true"
                :closeOnEscape="false"
                :draggable="false"
                class="p-fluid"
            >
                <div class="field">
                    <label for="date">{{ $t("public.date") }}</label>
                    <InputText
                        id="date"
                        v-model="item.date"
                        mode="decimal"
                        :maxFractionDigits="4"
                        disabled
                    />
                </div>
                <div class="field">
                    <label for="investor_profit">{{
                        $t("public.investor_profit")
                    }}</label>
                    <InputNumber
                        inputId="investor_profit"
                        v-model="item.profit_1"
                        mode="decimal"
                        :maxFractionDigits="4"
                        required
                        :placeholder="
                            $t('public.placeholder', {
                                attribute: $t('public.investor_profit'),
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
        </div>
    </AppLayoutNew>
</template>
<style></style>
