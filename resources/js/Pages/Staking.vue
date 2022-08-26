<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    lists: Array,
});
</script>
<template>
    <AppLayoutNew title="Stacking">
        <div class="h-screen m-8">
            <div class="flex items-center justify-between">
                <h1>Stacking</h1>
                <Button><Link href="add">Add New Order</Link></Button>
            </div>
            <p class="text-sm">Summary of your investment details</p>

            <div class="flex items-stretch space-x-4 mt-4">
                <div>
                    <span>Daily Profit</span>

                    <div>$0.0000</div>
                </div>
                <div>
                    <span>Total Profit</span>
                    <div>$0.0000</div>
                </div>
            </div>

            <Card class="drop-shadow-lg mt-5" v-for="item in lists">
                <template #header>
                    <div class="absolute top-0 right-0">
                        <Tag severity="danger" v-if="item.status == 'Cancelled'"
                            >Cancelled</Tag
                        >
                        <Tag severity="success" v-if="item.status == 'Active'"
                            >Active</Tag
                        >
                        <Tag severity="info" v-if="item.status == 'Pending'"
                            >Pending</Tag
                        >
                    </div>
                    <div class="p-4">
                        Order ID
                        <span class="font-bold">{{ item.order_id }}</span>
                    </div>
                </template>

                <template #content>
                    <div class="divide-y">
                        <div class="flex space-x-4 items-center py-8">
                            <Avatar
                                image="/images/logo/logo-03.png"
                                size="xlarge"
                            />
                            <div class="flex-1">
                                <h6>Staking</h6>
                                <p>$ {{ item.amount }}</p>
                                <p>&#x2248;$ {{ item.float_amount }}</p>
                            </div>
                            <div class="text-right" v-if="profit">
                                <h6>Profit/Loss</h6>
                                <p class="text-green-500">
                                    +{{ item.total_percentage }}%
                                </p>
                            </div>
                        </div>

                        <div class="py-8">
                            <div class="flex justify-between items-center">
                                <div>Date Applied</div>
                                <div>{{ item.date_apply }}</div>
                            </div>
                            <div
                                class="flex justify-between items-center"
                                v-if="item.status != 'Pending'"
                            >
                                <div>Date Activated</div>
                                <div>{{ item.date_activate }}</div>
                            </div>
                            <div
                                class="flex justify-between items-center"
                                v-if="item.status == 'Cancelled'"
                            >
                                <div>Date Cancelled</div>
                                <div>{{ item.date_cancel }}</div>
                            </div>
                        </div>
                        <div class="py-8" v-if="item.status == 'Active'">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <p>Duration</p>
                                    <p>{{ item.duration }} Days</p>
                                </div>
                                <div class="flex-1">
                                    <p>End Date</p>
                                    <p>{{ item.date_end }}</p>
                                </div>
                                <div>
                                    <radial-progress-bar
                                        :diameter="75"
                                        :completed-steps="
                                            item.date_end - item.date_apply
                                        "
                                        :total-steps="item.duration"
                                        startColor="#95bbf7"
                                        stopColor="#95bbf7"
                                        innerStrokeColor="#f2f2f2"
                                        :strokeWidth="5"
                                        :innerStrokeWidth="5"
                                    >
                                        {{ item.date_end - item.date_apply }}
                                    </radial-progress-bar>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </Card>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
