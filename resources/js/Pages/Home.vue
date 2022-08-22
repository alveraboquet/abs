<script setup>
import { ref, watch } from "vue";
import AppLayoutNew from "../Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    yesterdayProfit: Object,
    lastWeekProfit: Array,
    monthlyProfit: Number,
    accumulateProfit: Number,
});

const series = [
    {
        /*  name: "STOCK ABC", */
        name: "",
        data: props.lastWeekProfit.profit,
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
    labels: props.lastWeekProfit.date /*
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
                    <p>{{ yesterdayProfit.date }}</p>
                    <h1 class="py-5">{{ yesterdayProfit.total_profit }}%</h1>
                    <div class="grid grid-cols-12">
                        <div class="col-span-full md:col-span-4">
                            <p>Investor Profit</p>
                            <p>{{ yesterdayProfit.profit_1 }}%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
                            <p>Developer Fund House</p>
                            <p>{{ yesterdayProfit.profit_2 }}%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
                            <p>ABS Agency</p>
                            <p>{{ yesterdayProfit.profit_3 }}%</p>
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
                            Daily {{ yesterdayProfit.profit_1 }}% | Monthly
                            {{ monthlyProfit.toFixed(4) }}% | Accumulate
                            {{ accumulateProfit.toFixed(4) }}%
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
