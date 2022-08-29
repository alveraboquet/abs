<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
defineProps({
    lists: Array,
});
</script>
<template>
    <AppLayoutNew title="Topup History">
        <div class="m-8">
            <h1>Topup History</h1>
            <p>{{ lists.length }} records</p>
            <div class="mt-8">
                <div v-for="item in lists">
                    <div class="p-8">
                        <div class="flex justify-between">
                            <p>Topup</p>
                            <div>
                                <Tag
                                    severity="success"
                                    v-if="item.status == 'Approved'"
                                    >{{ item.status }}</Tag
                                >
                                <Tag
                                    severity="danger"
                                    v-else-if="item.status == 'Rejected'"
                                    >{{ item.status }}</Tag
                                >
                                <Tag severity="info" v-else>{{
                                    item.status
                                }}</Tag>
                            </div>
                        </div>
                        <p>+${{ item.original_amount }}</p>
                        <p>Service Charge: ${{ item.processing_fee }}</p>
                        <p>Total Received: ${{ item.actual_amount }}</p>
                        <p>TxID: {{ item.TxID }}</p>

                        <p>{{ item.created_at }}</p>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
