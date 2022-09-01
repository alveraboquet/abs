<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { trans, wTrans } from "laravel-vue-i18n";
import { computed, ref } from "vue";

const left = computed(() => [
    {
        title: wTrans("public.landing.sixth_card_1").value,
        lists: [
            wTrans("public.landing.sixth_card_1_desc_1").value,
            wTrans("public.landing.sixth_card_1_desc_2").value,
        ],
    },
    {
        title: wTrans("public.landing.sixth_card_2").value,
        lists: [
            wTrans("public.landing.sixth_card_2_desc_1").value,
            wTrans("public.landing.sixth_card_2_desc_2").value,
            wTrans("public.landing.sixth_card_2_desc_3").value,
            wTrans("public.landing.sixth_card_2_desc_4").value,
            wTrans("public.landing.sixth_card_2_desc_5").value,
            wTrans("public.landing.sixth_card_2_desc_6").value,
        ],
    },
    {
        title: wTrans("public.landing.sixth_card_3").value,
        lists: [
            wTrans("public.landing.sixth_card_3_desc_1").value,
            wTrans("public.landing.sixth_card_3_desc_2").value,
        ],
    },
]);
const right = computed(() => [
    {
        title: wTrans("public.landing.sixth_card_4").value,
        lists: [
            wTrans("public.landing.sixth_card_4_desc_1").value,
            wTrans("public.landing.sixth_card_4_desc_2").value,
            wTrans("public.landing.sixth_card_4_desc_3").value,
        ],
    },
    {
        title: wTrans("public.landing.sixth_card_5").value,
        lists: [wTrans("public.landing.sixth_card_5_desc_1").value],
    },
    {
        title: wTrans("public.landing.sixth_card_6").value,
        lists: [wTrans("public.landing.sixth_card_6_desc_1").value],
    },
    {
        title: wTrans("public.landing.sixth_card_7").value,
        lists: [
            wTrans("public.landing.sixth_card_7_desc_1").value,
            wTrans("public.landing.sixth_card_7_desc_2").value,
        ],
    },
]);
</script>
<template>
    <AppLayoutNew :title="$t('public.about_ABS')">
        <div
            class="bg-[url('/images/BG-02.png')] bg-no-repeat bg-[length:100%]"
        >
            <div class="md:p-20">
                <h1 class="hidden md:block">ABS</h1>
                <section
                    class="bg-[url('/images/Landing/Landing-01.png')] bg-no-repeat bg-[length:280%_400px] bg-top pt-[350px] md:bg-[length:100%_500px] md:pt-[380px] px-[20px] md:bg-center"
                >
                    <div class="bottom-0 text-primary space-y-4 md:text-center">
                        <h1>{{ $t("public.landing.secomd_title_1") }}</h1>
                        <h3>
                            {{ $t("public.landing.secomd_title_2") }}
                        </h3>
                        <p class="px-4">
                            {{ $t("public.landing.secomd_desc_1") }}
                        </p>
                    </div>
                </section>
                <section>
                    <div class="grid grid-cols-4 gap-4 p-2 text-center">
                        <Card
                            class="col-span-2 md:col-span-1 !shadow-lg shadow-black"
                        >
                            <template #content>
                                <i
                                    class="pi pi-star !text-5xl text-[#89bfff] my-2"
                                ></i>
                                <p class="text-xs">
                                    {{ $t("public.landing.second_box_1") }}
                                </p>
                            </template>
                        </Card>
                        <Card
                            class="col-span-2 md:col-span-1 !shadow-lg shadow-black"
                        >
                            <template #content>
                                <i
                                    class="pi pi-home !text-5xl text-[#89bfff] my-2"
                                ></i>
                                <p class="text-xs">
                                    {{ $t("public.landing.second_box_2") }}
                                </p>
                            </template>
                        </Card>
                        <Card
                            class="col-span-2 md:col-span-1 !shadow-lg shadow-black"
                        >
                            <template #content>
                                <i
                                    class="pi pi-server !text-5xl text-[#89bfff] my-2"
                                ></i>
                                <p class="text-xs">
                                    {{ $t("public.landing.second_box_3") }}
                                </p>
                            </template>
                        </Card>
                        <Card
                            class="col-span-2 md:col-span-1 !shadow-lg shadow-black"
                        >
                            <template #content>
                                <i
                                    class="pi pi-sync !text-5xl text-[#89bfff] my-2"
                                ></i>
                                <p class="text-xs">
                                    {{ $t("public.landing.second_box_4") }}
                                </p>
                            </template>
                        </Card>
                    </div>
                </section>
                <section
                    class="bg-[url('/images/Landing/Landing-02.png')] bg-no-repeat bg-[length:100%_281.3px] md:bg-cover md:bg-[position:50%] -mt-[40px] md:-mt-[79px] p-[317px_20px_0] md:p-[262px_10%_262px_50%] min-h-[900px] text-primary space-y-4"
                >
                    <i class="pi pi-check-circle !text-5xl text-[#89bfff]"></i>
                    <h1>{{ $t("public.landing.vision_mission") }}</h1>
                    <p>
                        {{ $t("public.landing.vision_mission_desc") }}
                    </p>

                    <h3>{{ $t("public.landing.our_vision") }}</h3>
                    <p>
                        {{ $t("public.landing.vision_desc") }}
                    </p>
                    <h3>{{ $t("public.landing.our_mission") }}</h3>
                    <p>
                        {{ $t("public.landing.mission_desc") }}
                    </p>
                </section>
                <section
                    class="bg-[url('/images/Landing/Landing-03.png')] bg-no-repeat bg-[length:150%_281.3px] bg-top md:bg-cover md:bg-[position:50%] -mt-[125px] md:mt-0 p-[261px_20px_0] md:p-[38px_50%_38px_0] min-h-[900px] space-y-8 md:space-y-12"
                >
                    <i class="pi pi-check-circle !text-5xl text-[#89bfff]"></i>
                    <h1 class="text-primary">
                        {{ $t("public.landing.fourth_title") }}
                    </h1>

                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">01</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_1") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_1_desc") }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">02</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_2") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_2_desc") }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">03</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_3") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_3_desc") }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">04</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_4") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_4_desc") }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">05</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_5") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_5_desc") }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">06</div>
                        <div>
                            <p>{{ $t("public.landing.fourth_step_6") }}</p>
                            <p class="font-bold">
                                {{ $t("public.landing.fourth_step_6_desc") }}
                            </p>
                        </div>
                    </div>
                </section>
                <section class="space-y-4">
                    <h1 class="text-center text-primary">
                        {{ $t("public.landing.fifth_title") }}
                    </h1>
                    <div class="w-full p-8">
                        <Card class="md:w-1/3 mx-auto">
                            <template #header>
                                <img
                                    src="/images/Landing/House Images/Developer-22.jpeg"
                                />
                            </template>
                            <template #title> The Apple Melaka </template>

                            <template #content>
                                <p class="prose prose-sm">
                                    The 39-floor FREEHOLD The Apple appeals to
                                    all walks of life. Ideally located in the
                                    heart of Melaka with the 4-STAR
                                    INTERNATIONAL HOTEL just next door.
                                    <br />The Apple serviced apartment is one of
                                    the tallest residency building in the state.
                                    This urban oasis is only 1km from Melaka
                                    town and just 13km from the nearest exit
                                    toll. This exclusive address is located next
                                    to The Courtyard Melaka, along with many
                                    facilities and landmarks just a short
                                    distance away. There are seven type of room
                                    ranging from sizes of 474 to 2,088 square
                                    feet. The Apple will also incorporate the
                                    first dual-key system SOHO in Melaka where a
                                    majority of the units come with panoramic
                                    straits and city views.
                                </p>
                            </template>
                        </Card>
                    </div>
                </section>
                <section class="space-y-4 p-8">
                    <h1 class="text-center text-primary">
                        {{ $t("public.landing.sixth_title") }}
                    </h1>
                    <div class="w-full">
                        <div
                            class="md:flex justify-items-stretch justify-around md:space-x-4"
                        >
                            <div class="md:w-1/2 space-y-4 mt-4">
                                <Card
                                    class="p-4 !shadow-lg"
                                    v-for="item in left"
                                >
                                    <template #title>
                                        <p class="text-primary">
                                            {{ item.title }}
                                        </p></template
                                    >

                                    <template #content>
                                        <div class="space-y-4">
                                            <div
                                                class="flex items-center space-x-4"
                                                v-for="listItem in item.lists"
                                            >
                                                <i
                                                    class="pi pi-check text-[#3ce88a]"
                                                ></i>
                                                <p>
                                                    {{ listItem }}
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                </Card>
                            </div>
                            <div class="md:w-1/2 space-y-4 mt-4">
                                <Card
                                    class="p-4 !shadow-lg"
                                    v-for="item in right"
                                >
                                    <template #title>
                                        <p class="text-primary">
                                            {{ item.title }}
                                        </p></template
                                    >

                                    <template #content>
                                        <div class="space-y-4">
                                            <div
                                                class="flex items-center space-x-4"
                                                v-for="listItem in item.lists"
                                            >
                                                <i
                                                    class="pi pi-check text-[#3ce88a]"
                                                ></i>
                                                <p>
                                                    {{ listItem }}
                                                </p>
                                            </div>
                                        </div>
                                    </template>
                                </Card>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </AppLayoutNew>
</template>
<style scope lang="css"></style>
