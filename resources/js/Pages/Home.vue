<script setup>
import { ref, watch } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { trans, wTrans } from "laravel-vue-i18n";

const props = defineProps({
    yesterdayProfit: Object,
    lastWeekProfit: Object,
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
        text: wTrans("public.investor_profit").value,
        align: "left",
    },
    subtitle: {
        text: wTrans("public.performance").value,
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
                    <h4>{{ $t("public.total_profit_per_day") }}</h4>
                    <p>{{ yesterdayProfit.date }}</p>
                    <h1 class="py-5 text-primary">
                        {{ yesterdayProfit.total_profit }}%
                    </h1>
                    <div class="grid grid-cols-12 text-primary">
                        <div class="col-span-full md:col-span-4">
                            <p>{{ $t("public.investor_profit") }}</p>
                            <p>{{ yesterdayProfit.profit_1 }}%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
                            <p>{{ $t("public.developer_fund_house") }}</p>
                            <p>{{ yesterdayProfit.profit_2 }}%</p>
                        </div>
                        <div class="col-span-full md:col-span-4">
                            <p>{{ $t("public.abs_agency") }}</p>
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
                        <div>{{ $t("public.return") }}</div>
                        <div class="flex">
                            <div>
                                {{ $t("public.daily_return") }}
                                <span class="font-bold">
                                    {{ yesterdayProfit.profit_1 }}%
                                </span>
                            </div>
                            <Divider
                                layout="vertical"
                                class="before:!border-solid before:!border-l-black before:!border-l"
                            />
                            <div>
                                {{ $t("public.montly_return") }}
                                <span class="font-bold">
                                    {{ monthlyProfit.toFixed(4) }}%
                                </span>
                            </div>
                            <Divider
                                layout="vertical"
                                class="before:!border-solid before:!border-l-black before:!border-l"
                            />
                            <div>
                                {{ $t("public.accumulate_return") }}
                                <span class="font-bold">
                                    {{ accumulateProfit.toFixed(4) }}%
                                </span>
                            </div>
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
