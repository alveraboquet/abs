<script setup>
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
            <div class="flex-1 flex-grow main-con">
                <div class="h-screen m-8">
                    <h1>Home</h1>
                </div>
                <div class="h-screen w-3/4 mx-auto">
                    <div class="text-center">
                        <h4>Total Profit Per Day</h4>
                        <p>Aug 17, 2022</p>
                        <h1 class="py-5">0.4068%</h1>
                        <div class="grid">
                            <div class="col-12 md:col-4">
                                <p>Investor Profit</p>
                                <p>0.1356%</p>
                            </div>
                            <div class="col-12 md:col-4">
                                <p>Developer Fund House</p>
                                <p>0.1356%</p>
                            </div>
                            <div class="col-12 md:col-4">
                                <p>ABS Agency</p>
                                <p>0.1356%</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div id="chart">
                            <apexchart
                                type="area"
                                height="350"
                                :options="chartOptions"
                                :series="series"
                            ></apexchart>
                        </div>
                        <div class="flex justify-content-between">
                            <div>Return</div>
                            <div>
                                Daily 0.1356% | Monthly 2.4203% | Accumulate
                                28.6521%
                            </div>
                        </div>
                    </div>
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
