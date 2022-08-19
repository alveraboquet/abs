<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { onMounted, reactive, ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import QrcodeVue from "qrcode.vue";
const qrValue = { value: " https://login.abs.agency/register?invite=J6QYU1" };
</script>

<template>
    <Head title="Home" />
    <div class="h-screen flex flex-col">
        <Toolbar>
            <template #start>
                <Image
                    alt="logo"
                    src="/images/logo/logo-01.png"
                    style="width: 84px"
                />
            </template>
            <template #end>
                <Button
                    label="Show"
                    icon="pi pi-external-link"
                    @click="openModal"
                />
            </template>
        </Toolbar>
        <!-- <div class="w-3/4 mx-auto">
        
        </div> -->
        <div class="flex flex-row flex-1 overflow-hidden">
            <div class="bg-red-500 hidden lg:flex">
                <div class="w-60 flex-auto shadow-md bg-white px-1">
                    <ul class="relative">
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 1</a
                            >
                        </li>
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 2</a
                            >
                        </li>
                        <li class="relative">
                            <a
                                class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="dark"
                                >Sidenav link 2</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex-1 flex-grow overflow-y-scroll no-scrollbar">
                <div class="h-screen m-8">
                    <h1>Invitation</h1>

                    <div class="layout_con_1">
                        <div class="logo_wrap">
                            <Image src="/images/logo/logo-01.png" />
                        </div>
                        <div class="qrcode_wrap">
                            <Link href="register?invite=12121">
                                <QrcodeVue
                                    :value="qrValue.value"
                                    size="138"
                                ></QrcodeVue>
                            </Link>
                        </div>
                        <div class="note_text">
                            Scan this QR code to join ABS now!
                        </div>
                        <div class="invite_code">
                            <span> Invite Code</span>
                            <div>J6QYU1</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-500 hidden lg:flex">
                <div class="bg-red-500 hidden lg:flex">
                    <div class="w-60 flex-auto shadow-md bg-white px-1">
                        <ul class="relative">
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 1</a
                                >
                            </li>
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 2</a
                                >
                            </li>
                            <li class="relative">
                                <a
                                    class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                    href="#!"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="dark"
                                    >Sidenav link 2</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="css">
.main-con {
    background-image: url(/images/BG-15-new.png);
    background-repeat: no-repeat;
    background-size: contain;
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
.p-tabview-nav {
    justify-content: center !important;
}
.layout_con_1 {
    background-image: url(/images/BG-13.png);
    background-repeat: no-repeat;
    background-size: 100% 800px;
    background-position: 100% 50%;
    width: 375px;
    height: 500px;
    margin: 20px auto 0;
    padding-top: 20px;
    border-radius: 10px;
}

.logo_wrap {
    text-align: center;
    width: 169px;
    margin: 45px auto 55px;
}
.qrcode_wrap {
    text-align: center;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    padding: 11px;
    margin: 55px auto 16px;
    border-radius: 6px;
    box-shadow: 0 5px 10px 0rgba (0, 0, 0, 0.1);
    background-color: #fff;
}
.note_text {
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #fff;
    margin-bottom: 20px;
}

.invite_code {
    text-align: center;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: normal;
}
.invite_code span {
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    text-align: center;
    color: #fff;
    font-size: 13px;
    font-weight: 400;
    letter-spacing: normal;
}
.invite_code div {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 6.25px;
    margin-top: 5px;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    text-align: center;
    color: #fff;
}
</style>
