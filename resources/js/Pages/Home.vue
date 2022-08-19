<script setup>
import { ref } from "vue";
import AppLayoutNew from "../Layouts/AppLayoutNew.vue";

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
    <AppLayoutNew title="Home">
        <div class="h-screen main-con p-8 space-y-5">
            <!--  <h1 >Home</h1> -->
            <div class="h-1/2"></div>
            <div class="h-screen mx-auto space-y-5">
                <div class="text-center">
                    <h4>Total Profit Per Day</h4>
                    <p>Aug 17, 2022</p>
                    <h1 class="py-5">0.4068%</h1>
                    <div class="grid grid-cols-12">
                        <div class="col-span-full md:col-span-4">
                            <p>Investor Profit</p>
                            <p>0.1356%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
                            <p>Developer Fund House</p>
                            <p>0.1356%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
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
                    <div class="flex justify-between">
                        <div>Return</div>
                        <div>
                            Daily 0.1356% | Monthly 2.4203% | Accumulate
                            28.6521%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayoutNew>
</template>

<style scoped lang="css">
.main-con {
    background-image: url(/images/BG-15-new.png);
    background-repeat: no-repeat;
    background-size: 100%;
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
