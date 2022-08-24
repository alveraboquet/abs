<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { Link } from "@inertiajs/inertia-vue3";
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
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
