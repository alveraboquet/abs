<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const series = [
    {
        /*  name: "STOCK ABC", */
        name: "",
        data: [0.1382, 0.1375, 0.1354, 0.1433, 0.1573, 0.1484, 0.1356],
    },
];

const chartOptions = {
    chart: {
        type: "area",
        height: 350,
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "straight",
    },

    title: {
        text: "Investor Profit",
        align: "left",
    },
    subtitle: {
        text: "Performance",
        align: "left",
    },
    labels: [
        "2022-08-11",
        "2022-08-12",
        "2022-08-13",
        "2022-08-14",
        "2022-08-15",
        "2022-08-16",
        "2022-08-17",
    ] /*
    xaxis: {
        type: "datetime",
    },
       yaxis: {
        opposite: true,
    }, */,
    legend: {
        horizontalAlign: "left",
    },
};

const form = useForm({
    search: "",
});
</script>

<template>
    <Head title="Home" />
    <div class="min-h-screen flex flex-col">
        <Toolbar>
            <template #start>
                <Image
                    alt="logo"
                    src="/images/logo/logo-01.png"
                    style="width: 84px"
                />
            </template>
            <template #end>
                <Button
                    label="Show"
                    icon="pi pi-external-link"
                    @click="openModal"
                />
            </template>
        </Toolbar>
        <!-- <div class="w-3/4 mx-auto">
        
        </div> -->
        <div class="flex flex-row flex-1">
            <div class="bg-red-500 hidden lg:flex">
                <div class="w-60 flex-auto shadow-md bg-white px-1">
                    <ul class="relative">
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 1</a
                            >
                        </li>
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 2</a
                            >
                        </li>
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 2</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex-1 flex-grow">
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

                    <TabView class="mt-5">
                        <TabPanel header="Header I">
                            <div class="w-full">
                                <span class="p-input-icon-left w-full">
                                    <i class="pi pi-search" />
                                    <InputText
                                        class="w-full"
                                        type="text"
                                        v-model="form.search"
                                        placeholder="Search"
                                    />
                                </span></div
                        ></TabPanel>
                        <TabPanel header="Header II">
                            <div>
                                test
                                <Divider align="right">
                                    <Button
                                        label="Button"
                                        icon="pi pi-search"
                                        class="p-button-outlined"
                                    ></Button>
                                </Divider>
                                test
                            </div>
                        </TabPanel>
                    </TabView>

                    <div>
                        <div class="flex justify-between">
                            <p>left</p>
                            <p><Tag value="active" severity="success" /></p>
                        </div>
                    </div>
                    <Divider class="border-t-2" />
                    <div>Content 2</div>
                </div>
            </div>
            <!-- <div class="bg-yellow-500 hidden lg:flex">
                <div class="bg-red-500 hidden lg:flex">
                    <div class="w-60 flex-auto shadow-md bg-white px-1">
                        <ul class="relative">
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 1</a
                                >
                            </li>
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 2</a
                                >
                            </li>
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 2</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
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
</style>
