<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { onMounted, reactive, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import AppLayoutNew from "../Layouts/AppLayoutNew.vue";

defineProps({
    users: Object,
});

const form = useForm({
    search: "",
});

const nodes2 = [
    {
        key: "0",
        label: "Documents",
        data: "Documents Folder",
        icon: "pi pi-fw pi-inbox",
        children: [
            {
                key: "0-0",
                label: "Work",
                data: "Work Folder",
                icon: "pi pi-fw pi-cog",
                children: [
                    {
                        key: "0-0-0",
                        label: "Expenses.doc",
                        icon: "pi pi-fw pi-file",
                        data: "Expenses Document",
                    },
                    {
                        key: "0-0-1",
                        label: "Resume.doc",
                        icon: "pi pi-fw pi-file",
                        data: "Resume Document",
                    },
                ],
            },
            {
                key: "0-1",
                label: "Home",
                data: "Home Folder",
                icon: "pi pi-fw pi-home",
                children: [
                    {
                        key: "0-1-0",
                        label: "Invoices.txt",
                        icon: "pi pi-fw pi-file",
                        data: "Invoices for this month",
                    },
                ],
            },
        ],
    },
    {
        key: "1",
        label: "Events",
        data: "Events Folder",
        icon: "pi pi-fw pi-calendar",
        children: [
            {
                key: "1-0",
                label: "Meeting",
                icon: "pi pi-fw pi-calendar-plus",
                data: "Meeting",
            },
            {
                key: "1-1",
                label: "Product Launch",
                icon: "pi pi-fw pi-calendar-plus",
                data: "Product Launch",
            },
            {
                key: "1-2",
                label: "Report Review",
                icon: "pi pi-fw pi-calendar-plus",
                data: "Report Review",
            },
        ],
    },
    {
        key: "2",
        label: "Movies",
        data: "Movies Folder",
        icon: "pi pi-fw pi-star-fill",
        children: [
            {
                key: "2-0",
                icon: "pi pi-fw pi-star-fill",
                label: "Al Pacino",
                data: "Pacino Movies",
                children: [
                    {
                        key: "2-0-0",
                        label: "Scarface",
                        icon: "pi pi-fw pi-video",
                        data: "Scarface Movie",
                    },
                    {
                        key: "2-0-1",
                        label: "Serpico",
                        icon: "pi pi-fw pi-video",
                        data: "Serpico Movie",
                    },
                ],
            },
            {
                key: "2-1",
                label: "Robert De Niro",
                icon: "pi pi-fw pi-star-fill",
                data: "De Niro Movies",
                children: [
                    {
                        key: "2-1-0",
                        label: "Goodfellas",
                        icon: "pi pi-fw pi-video",
                        data: "Goodfellas Movie",
                    },
                    {
                        key: "2-1-1",
                        label: "Untouchables",
                        icon: "pi pi-fw pi-video",
                        data: "Untouchables Movie",
                    },
                ],
            },
        ],
    },
];

const loading = ref(false);
const nodes = ref(null);

onMounted(() => {
    loading.value = true;

    setTimeout(() => {
        nodes.value = initateNodes();
        loading.value = false;
    }, 2000);
});

const onNodeExpand = (node) => {
    if (!node.children) {
        loading.value = true;

        setTimeout(() => {
            let _node = { ...node };
            _node.children = [];

            for (let i = 0; i < 3; i++) {
                _node.children.push({
                    key: node.key + "-" + i,
                    label: "Lazy " + node.label + "-" + i,
                    leaf: i % 2 == 0,
                });
            }

            let _nodes = { ...nodes.value };
            _nodes[parseInt(node.key, 10)] = _node;
            nodes.value = _nodes;
            loading.value = false;
        }, 500);
    }
};
const initateNodes = () => {
    return [
        {
            key: "0",
            label: "Node 0",
            leaf: false,
        },
        {
            key: "1",
            label: "Node 1",
            leaf: false,
        },
        {
            key: "2",
            label: "Node 2",
            leaf: false,
        },
    ];
};
</script>

<template>
    <AppLayoutNew title="My Team">
        <div class="h-screen m-8">
            <h1>My Agency</h1>
            <Card class="drop-shadow-lg mt-5">
                <template #content>
                    <div class="grid text-center">
                        <div class="col-6">
                            <p>Total Agent</p>
                            <p>494</p>
                        </div>
                        <div class="col-6">
                            <p>Direct Agent</p>
                            <p>7</p>
                        </div>
                        <div class="col-6">
                            <p>Group Sales</p>
                            <p>$475,000.0000</p>
                        </div>
                        <div class="col-6">
                            <p>Personal Sales</p>
                            <p>$0.0000</p>
                        </div>
                    </div>
                </template>
            </Card>
            <Tree
                :value="nodes"
                @node-expand="onNodeExpand"
                :loading="loading"
            ></Tree>

            <TabView class="mt-5">
                <TabPanel header="Agent Structure">
                    <div class="w-full">
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
                                <div>e</div>
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
                    </div></TabPanel
                >
                <TabPanel header="Direct Agent">
                    <div v-for="i in 10">
                        <div class="flex justify-between">
                            <p>Name</p>
                            <p>
                                <Tag value="active" severity="success" />
                            </p>
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
.p-tabview-nav {
    justify-content: center !important;
}
</style>
