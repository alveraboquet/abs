<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { onMounted, reactive, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import projects from "../../../sample_response/projects.json";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";

const blocks = ref(projects.data);
</script>

<template>
    <AppLayoutNew title="Projects">
        <div class="m-8">
            <h1 class="On Sales"></h1>
            <div class="grid grid-cols-12 gap-4">
                <Card
                    class="col-span-12 md:col-span-4"
                    v-for="(item, index) in blocks"
                >
                    <template #header>
                        <img src="/images/BG-04.png" />
                    </template>
                    <template #title> {{ item.name }} </template>
                    <template #subtitle>
                        <div class="space-x-5">
                            <Chip :label="`On sales: ${item.on_sale}`" />
                            <Chip :label="`Sold out: ${item.sold_out}`" />
                        </div>
                    </template>
                    <template #content>
                        <p v-html="item.description" class="prose prose-sm"></p>
                    </template>
                </Card>
            </div>

            <!--  <div v-masonry transition-duration="0.3s" item-selector=".item">
                <div class="grid grid-cols-12 gap-4">
                    <Card
                        v-masonry-tile
                        class="col-span-12 md:col-span-4"
                        v-for="(item, index) in blocks"
                    >
                        <template #header>
                            <img src="/images/BG-04.png" />
                        </template>
                        <template #title> {{ item.name }} </template>
                        <template #subtitle>
                            <div class="space-x-5">
                                <Chip :label="`On sales: ${item.on_sale}`" />
                                <Chip :label="`Sold out: ${item.sold_out}`" />
                            </div>
                        </template>
                        <template #content>
                            <p
                                v-html="item.description"
                                class="prose prose-sm"
                            ></p>
                        </template>
                    </Card>
                </div>
            </div> -->
        </div>
    </AppLayoutNew>
</template>

<style scoped lang="css"></style>
