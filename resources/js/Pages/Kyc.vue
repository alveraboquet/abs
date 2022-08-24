<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
</script>
<template>
    <AppLayoutNew title="KYC">
        <div class="h-screen m-8">
            <div class="flex items-center justify-between">
                <h1>KYC</h1>

                <div>KYC Status <Tag severity="danger">Rejected</Tag></div>
            </div>
            <p class="text-sm my-4">
                Reminder: If you wish to modify your KYC & wallet address,
                kindly submit to support@abs.agency, estimate 5-7 working days.
            </p>
            <div class="text-red-500 drop-shadow-xl">
                <i class="pi pi-times"></i>
                Testing
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
