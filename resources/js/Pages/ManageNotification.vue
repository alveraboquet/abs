<script setup>
import { Inertia } from "@inertiajs/inertia";
import { onMounted, ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import Banner from "@/Components/Banner.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { getActiveLanguage } from "laravel-vue-i18n";

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

const statuses = {
    Active: { en: "Active", cn: "活跃" },
    Inactive: { en: "Inactive", cn: "不活跃" },
};

const statusesOption = [
    { value: "Active", en: "Active", cn: "活跃" },
    { value: "Inactive", en: "Inactive", cn: "不活跃" },
];
const popupStatuses = {
    1: { en: "Yes", cn: "是" },
    0: { en: "No", cn: "否" },
};

const popupStatusesOption = [
    { value: 1, en: "Yes", cn: "是" },
    { value: 0, en: "No", cn: "否" },
];

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

const geti18nName = (name) => {
    return `${name}_${getActiveLanguage()}`;
};
</script>
<template>
    <AppLayoutNew
        :title="$t('public.manage', { name: $t('public.notification') })"
    >
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
                                        name: $t("public.notification"),
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
                        :field="geti18nName('title')"
                        :header="$t('public.title')"
                        sortable
                    ></Column>
                    <Column
                        field="start_date"
                        :header="$t('public.start_date')"
                        sortable
                    ></Column>
                    <Column
                        field="end_date"
                        :header="$t('public.end_date')"
                        sortable
                    ></Column>

                    <Column
                        field="status"
                        :header="$t('public.status')"
                        sortable
                    >
                        <template #body="{ data }">
                            <Tag
                                v-if="data.status == 'Inactive'"
                                severity="danger"
                                >{{
                                    statuses[data.status][getActiveLanguage()]
                                }}</Tag
                            >
                            <Tag
                                v-else-if="data.status == 'Active'"
                                severity="success"
                                >{{
                                    statuses[data.status][getActiveLanguage()]
                                }}</Tag
                            >
                        </template>
                        <template #filter="{ filterModel }">
                            <Dropdown
                                v-model="filterModel.value"
                                :options="statusesOption"
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
                                :disabled="slotProps.data.status != 'Active'"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Dialog
                v-model:visible="viewDialog"
                :style="{ width: '450px' }"
                :header="
                    $t('public.details', { name: $t('public.notification') })
                "
                :modal="true"
                :draggable="false"
                :closeOnEscape="false"
                class="p-fluid"
            >
                <div class="field">
                    <label for="title_en">{{ $t("public.title") }} (EN)</label>
                    <InputText
                        id="title_en"
                        v-model.trim="item.title_en"
                        required
                    />
                </div>
                <div class="field">
                    <label for="title_cn">{{ $t("public.title") }} (CN)</label>
                    <InputText
                        id="title_cn"
                        v-model.trim="item.title_cn"
                        required
                    />
                </div>
                <div class="field">
                    <label>{{ $t("public.content") }} (EN)</label>
                    <Editor
                        v-model="item.content_en"
                        editorStyle="height: 320px"
                    />
                </div>
                <div class="field">
                    <label>{{ $t("public.content") }} (CN)</label>
                    <Editor
                        v-model="item.content_cn"
                        editorStyle="height: 320px"
                    />
                </div>

                <div class="field">
                    <label>{{ $t("public.image") }}</label>
                    <FileUpload
                        name="demo[]"
                        mode="basic"
                        accept="image/*"
                        custom-upload
                        :choose-label="$t('public.choose')"
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
                    <label>{{ $t("public.start_date") }}</label>
                </div>
                <Calendar
                    v-model="item.start_date"
                    touchUI
                    view="date"
                    :manualInput="false"
                />
                <div class="field">
                    <label>{{ $t("public.end_date") }}</label>
                    <Calendar
                        v-model="item.end_date"
                        touchUI
                        view="date"
                        :manualInput="false"
                    />
                </div>

                <div class="field">
                    <label for="status" class="mb-3">{{
                        $t("public.status")
                    }}</label>
                    <Dropdown
                        id="status"
                        v-model="item.status"
                        :options="statusesOption"
                        :option-label="getActiveLanguage()"
                        option-value="value"
                    >
                    </Dropdown>
                </div>
                <div class="field">
                    <label for="popup" class="mb-3">{{
                        $t("public.popup")
                    }}</label>
                    <Dropdown
                        id="popup"
                        v-model="item.popup"
                        :options="popupStatusesOption"
                        :option-label="getActiveLanguage()"
                        option-value="value"
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
