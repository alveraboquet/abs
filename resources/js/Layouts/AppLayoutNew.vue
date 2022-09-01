<script setup>
import { computed, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import NavLink from "@/Components/NavLink.vue";
import TopNav from "@/Components/Layout/TopNav.vue";
import LeftNav from "@/Components/Layout/LeftNav.vue";
import RightNav from "@/Components/Layout/RightNav.vue";
import BottomNav from "@/Components/Layout/BottomNav.vue";
import { getActiveLanguage } from "laravel-vue-i18n";

const props = defineProps({
    title: String,
});
const notifications = computed(() => usePage().props.value.notifications);
const displayModal = ref(notifications.value?.length > 0 ? true : false);
const closeModal = () => {
    Inertia.visit(route("notifications"));
    displayModal.value = false;
};

const curUser = computed(() => usePage().props.value.auth.user);
</script>

<template>
    <Head :title="title" />

    <div class="h-screen flex flex-col">
        <TopNav :title="title" />

        <div class="flex flex-row flex-1 overflow-hidden">
            <LeftNav />
            <div class="flex-1 flex-grow overflow-y-scroll no-scrollbar">
                <slot />
            </div>
            <RightNav />
        </div>
        <BottomNav />
    </div>
    <Teleport to="body">
        <Dialog
            :header="$t('public.notification')"
            v-model:visible="displayModal"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :draggable="false"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <div class="my-8 space-y-8" v-for="item in notifications">
                <Image :src="item.image" image-class="mx-auto" />
                <h3>{{ item[`title_${getActiveLanguage()}`] }}</h3>
                <div
                    class="prose prose-sm w-full max-w-none"
                    v-html="item[`content_${getActiveLanguage()}`]"
                ></div>
            </div>
            <template #footer>
                <div class="text-center">
                    <Button
                        :label="$t('public.view_more')"
                        @click="closeModal"
                    />
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
