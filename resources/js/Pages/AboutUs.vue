<script setup>
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";

const left = [
    {
        title: "Pre-Condition",
        lists: [
            "Attestation to be signed by Investor",
            "Undertaking to be signed by ABS Agency",
        ],
    },
    {
        title: "Buy Back Option",
        lists: [
            "Right of first refusal provision",
            "Purchase price",
            "Duration to consider buy back option - 3 months Conditions for buy back option",
            "Free from any encumbrances",
            "Property in good condition subject to site visit by developers representative",
            "Cost of SPA, MOT and stamp duty by Investor",
        ],
    },
    {
        title: "Lease and Right to Use",
        lists: [
            "ABS reserve the right to use including but limited to leasing the property",
            "POA to be signed",
        ],
    },
];
const right = [
    {
        title: "Profit Sharing Clause",
        lists: ["Detailing the pay out percentage", "ROI", "Monthly"],
    },
    {
        title: "Duration",
        lists: ["Lock for 1 year with option to renew"],
    },
    {
        title: "Investment",
        lists: [
            "The Investors shall unconditionally grant ABS the full and legal right to invest in the funds in any program as they deemed most profitable",
        ],
    },
    {
        title: "Withdrawal of Funds",
        lists: ["Locking period", "Conditions for withdrawal"],
    },
];
</script>
<template>
    <AppLayoutNew title="About ABS">
        <div
            class="bg-[url('/images/BG-02.png')] bg-no-repeat bg-[length:100%]"
        >
            <div class="md:p-20">
                <h1 class="hidden md:block">ABS</h1>
                <section
                    class="bg-[url('/images/Landing/Landing-01.png')] bg-no-repeat bg-[length:280%_400px] bg-top pt-[350px] md:bg-[length:100%_500px] md:pt-[380px] px-[20px] md:bg-center"
                >
                    <div class="bottom-0 text-primary space-y-4 md:text-center">
                        <h1>About ABS</h1>
                        <h3>
                            We strongly believe that combination between the
                            real estate, property & homes with decentralized
                            finance will be integrated into our lives and norm.
                        </h3>
                        <p class="px-4">
                            Operated by crypto fund management team with
                            expertise & experienced in field of Decentralized
                            Finance to invest on Decentralized Finance related
                            projects and businesses to generate the returns.
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
                                    Target returns up to 60% per annum
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
                                    Legal Agreement 03 (S&P / Trust Deed)
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
                                    Asset-backed (Mitigated risk)
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
                                    Weekly returns distribution
                                </p>
                            </template>
                        </Card>
                    </div>
                </section>
                <section
                    class="bg-[url('/images/Landing/Landing-02.png')] bg-no-repeat bg-[length:100%_281.3px] md:bg-cover md:bg-[position:50%] -mt-[40px] md:-mt-[79px] p-[317px_20px_0] md:p-[262px_10%_262px_50%] min-h-[900px] text-primary space-y-4"
                >
                    <i class="pi pi-check-circle !text-5xl text-[#89bfff]"></i>
                    <h1>Vision & Mission</h1>
                    <p>
                        We strongly believe that by combining real estate with
                        blockchain decentralized finance will largely integrate
                        as well as enhance our quality of life and emerge from
                        the post-epidemic era.
                    </p>

                    <h3>Our Vision</h3>
                    <p>
                        ABS concept are to progress the decentralized finance
                        investment to become one of the general investment
                    </p>
                    <h3>Our Mission</h3>
                    <p>
                        Provide Asset-Backed (mitigated risk) investment by ABS
                        concept in Decentralized Finance which are statistically
                        and historically proven to be able and stable to
                        generate returns up to 180% per annum.
                    </p>
                </section>
                <section
                    class="bg-[url('/images/Landing/Landing-03.png')] bg-no-repeat bg-[length:150%_281.3px] bg-top md:bg-cover md:bg-[position:50%] -mt-[125px] md:mt-0 p-[261px_20px_0] md:p-[38px_50%_38px_0] min-h-[900px] space-y-8 md:space-y-12"
                >
                    <i class="pi pi-check-circle !text-5xl text-[#89bfff]"></i>
                    <h1 class="text-primary">How to Start ABS</h1>

                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">01</div>
                        <div>
                            <p>Step One</p>
                            <p class="font-bold">Choose Amount</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">02</div>
                        <div>
                            <p>Step Two</p>
                            <p class="font-bold">Loan Application / Funding</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">03</div>
                        <div>
                            <p>Step Three</p>
                            <p class="font-bold">Sign S&P / Trust Deed</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">04</div>
                        <div>
                            <p>Step Four</p>
                            <p class="font-bold">
                                Process Period (7 – 20 working days)
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">05</div>
                        <div>
                            <p>Step Five</p>
                            <p class="font-bold">Enjoy Weekly Profit</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold text-[#89bfff]">06</div>
                        <div>
                            <p>Step Six</p>
                            <p class="font-bold">
                                Join/share Affiliate Program
                            </p>
                        </div>
                    </div>
                </section>
                <section class="space-y-4">
                    <h1 class="text-center text-primary">
                        Introduction of Property
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
                    <h1 class="text-center text-primary">ABS Agreement</h1>
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
