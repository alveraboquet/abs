<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import AppLayoutNew from "@/Layouts/AppLayoutNew.vue";
import { computed } from "@vue/reactivity";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import Banner from "@/Components/Banner.vue";

const curUser = computed(() => usePage().props.value.auth.user);
const form = useForm({
    amount: 1000,
    agree_1: false,
    agree_2: false,
    agree_3: false,
});
const displayModal1 = ref(false);
const displayModal2 = ref(false);
const displayModal3 = ref(false);

const openModal = (num) => {
    if (num == 1) {
        displayModal1.value = true;
    } else if (num == 2) {
        displayModal2.value = true;
    } else {
        displayModal3.value = true;
    }
};
const closeModal = (num) => {
    if (num == 1) {
        displayModal1.value = false;
    } else if (num == 2) {
        displayModal2.value = false;
    } else {
        displayModal3.value = false;
    }
};

const submitForm = () => {
    form.post(route("orders.create"), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>
<template>
    <AppLayoutNew title="Add New Order">
        <div class="h-full p-8">
            <h1>Add New Order</h1>
            <Banner />
            <ValidationErrors />

            <p>Please insert amount to create new order</p>

            <Card>
                <template #content>
                    <div class="flex justify-between">
                        <p>Wallet Balance</p>
                        <p>${{ curUser.usdt_wallet }}</p>
                    </div>
                    <hr />
                    <div class="text-center">
                        <p>Amount</p>
                        <InputNumber
                            class=""
                            inputId="horizontal"
                            v-model.number="form.amount"
                            showButtons
                            buttonLayout="horizontal"
                            :step="100"
                            :min="1000"
                            incrementButtonIcon="pi pi-plus"
                            decrementButtonIcon="pi pi-minus"
                        />
                        <p>Min Amount: $1000.00</p>
                    </div>
                </template>
            </Card>
            <div class="space-y-4 mt-4">
                <div class="field-checkbox p-4">
                    <Checkbox
                        inputId="binary1"
                        v-model="form.agree_1"
                        :binary="true"
                        class="mr-4"
                    />
                    <label for="binary1"
                        >Agree with
                        <span
                            class="font-bold cursor-pointer"
                            @click.prevent="openModal(1)"
                            >Understanding of ABS</span
                        ></label
                    >
                </div>
                <hr />
                <div class="field-checkbox p-4">
                    <Checkbox
                        inputId="binary2"
                        v-model="form.agree_2"
                        :binary="true"
                        class="mr-4"
                    />
                    <label for="binary2"
                        >Agree with
                        <span
                            class="font-bold cursor-pointer"
                            @click.prevent="openModal(2)"
                            >Summarise of Mutual Agreement</span
                        ></label
                    >
                </div>
                <hr />
                <div class="field-checkbox p-4">
                    <Checkbox
                        inputId="binary3"
                        v-model="form.agree_3"
                        :binary="true"
                        class="mr-4"
                    />
                    <label for="binary3"
                        >Agree with
                        <span
                            class="font-bold cursor-pointer"
                            @click.prevent="openModal(2)"
                            >Term & Condition</span
                        ></label
                    >
                </div>
                <hr />
            </div>

            <div class="text-center">
                <Button @click="submitForm">Submit</Button>
            </div>
        </div>
    </AppLayoutNew>
    <Teleport to="body">
        <Dialog
            header="Understanding of ABS"
            v-model:visible="displayModal1"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <p class="m-0">
                <span
                    >We are a certified agency group &amp; marketing team for
                    various property developers in Malaysia. We strongly believe
                    that a combination between real estate, property &amp; homes
                    with decentralized finance will be integrated into our lives
                    and norm.</span
                >
                <br />
                <br />
                <span
                    >We provide Asset-Backed (mitigated risk) investment through
                    Decentralized Finance which is statistically and
                    historically proven to be stable and able to generate
                    returns of 30% - 60% per annum.</span
                >
                <br /><br />
                <span
                    >This is a new investment concept and we want all our
                    investors to fully understand the ABS concept before making
                    any investment decisions.</span
                >
                <br />
                <br />
                <span> <b>For Property Buyer:</b> </span><br />
                <br />
                <span
                    >1. Please download the ABS Application on
                    https://abs.agency</span
                >
                <br />
                <span
                    >2. Choose your preferred investment property or unit
                </span>
                <br />
                <span
                    >3. All payment is compulsory to be made through RKG KLOZER
                    TRUST LIMITED ONLY. ABS is not responsible for any payment
                    made to or through a third party.</span
                >
                <br />
                <span
                    >4. Trust deed issued RKG KLOZER TRUST LIMITED must be read
                    and signed for investment protection.
                </span>
                <br />
                <span
                    >5. INVESTOR AGREEMENT, MUTUAL AGREEMENT, and SNP AGREEMENT
                    must be read and signed to secure your unit.
                </span>
                <br />
                <span
                    >6. Activate your staking order to start generating daily
                    returns. All new orders will commence on the following
                    Monday.
                </span>
                <br />
                <span
                    >7. Complete registration and identity authentication
                    process (KYC) to receive generated daily returns through
                    weekly profit distributions.</span
                >
                <br />
                <span
                    >8. You can and are encouraged to check your status and
                    returns daily.</span
                >
                <br />
                <span
                    >9. Profits disbursement is done weekly into your submitted
                    TRC20 wallet address. ABS is not responsible if investor
                    submitted an invalid address after disbursement is
                    completed</span
                >
                <br />
                <span
                    >10. Processing fee will be charged to override the GAS fee,
                    Payment Gateway fee, and Lawyer fee.
                </span>
                <br />
                <span style="padding-left: 20px"
                    >a. For weekly profit disbursement, 5% of the total
                    disbursement amount will be deducted.
                </span>
                <br />
                <span style="padding-left: 20px"
                    >b. For capital withdrawal upon maturity, 5% of the total
                    withdrawal will be deducted</span
                >
                <br />
                <br />
                <span>
                    <b>For ABS investors: </b>
                </span>
                <br />
                <br />
                <span
                    >1. Please download the ABS Application on
                    https://abs.agency</span
                >
                <br />
                <span
                    >2. Choose your preferred investment lot for the selected
                    unit that is jointly invested by other investors of
                    ABS.</span
                >
                <br />
                <span
                    >3. All payment is compulsory to be made through RKG KLOZER
                    TRUST LIMITED only. ABS is not responsible for any payment
                    made to or through a third party.</span
                >
                <br />
                <span
                    >4. Trust deed issued RKG KLOZER TRUST LIMITED must be read
                    and signed for investment protection.
                </span>
                <br />
                <span
                    >5. INVESTOR AGREEMENT, MUTUAL AGREEMENT, and SNP AGREEMENT
                    must be read and signed to secure your investment lot.
                </span>
                <br />
                <span
                    >6. Activate your staking order to start generating daily
                    returns. All new orders will commence on the following
                    Monday.
                </span>
                <br />
                <span
                    >7. Complete registration and identity authentication
                    process (KYC) to receive generated daily returns through
                    weekly profit distributions.</span
                >
                <br />
                <span
                    >8. You can and are encouraged to check your status and
                    returns daily.</span
                >
                <br />
                <span
                    >9. Profits disbursement is done weekly into your submitted
                    TRC20 wallet address. ABS is not responsible if investor
                    submitted an invalid address after disbursement is
                    completed</span
                >
                <br />
                <span
                    >10. Processing fee will be charged to override the GAS fee,
                    Payment Gateway fee, and Lawyer fee.
                </span>
                <br />
                <span style="padding-left: 20px"
                    >a. For weekly profit disbursement, 5% of the total
                    disbursement amount will be deducted.
                </span>
                <br />
                <span style="padding-left: 20px"
                    >b. For capital withdrawal upon maturity, 5% of the total
                    withdrawal will be deducted</span
                >
                <br />
            </p>

            <template #footer>
                <div class="text-center mt-4">
                    <Button
                        label="Confirm"
                        icon="pi pi-check"
                        @click="closeModal(1)"
                    />
                </div>
            </template>
        </Dialog>

        <Dialog
            header="Summarise of Mutual Agreement"
            v-model:visible="displayModal2"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <p class="m-0">
                <span
                    >This summary of mutual agreement is for reference only. The
                    actual mutual agreement governing any particular investment
                    into ABS Agency may differ in some respects from the below.
                    Viewing this agreement summary alone is therefore
                    insufficient. Should you decide to invest into ABS Agency,
                    you should closely review the agreement you receive from ABS
                    Agency campaign prior to deciding whether to proceed with
                    the investment.</span
                >
                <br />
                <br />
                <span
                    >This mutual agreement summary (the “Agreement”) is made
                    between:</span
                >
                <br />
                <span
                    >A. ABS by ABS Global Realty Sdn Bhd (Reg no: 201601042228
                    (1213170-M)), a company incorporated with limited liability
                    under the laws of Malaysia (“ABS Agency”, “us”, “we”,or
                    “our”); and</span
                >
                <br />
                <span
                    >B. You, as the user of the Platform (as defined herein) who
                    has indicated an intention to consider subscribing for ABS
                    Agency Campaign (as defined below) through the Platform as
                    an investor (“Investor” or “you”),</span
                >
                <br />
                <span>each, a Party and collectively.</span>
                <br />
                <span>Now it is hereby agreed as follows: - </span>
                <br />
                <br />
                <span>
                    <b>1. AGREEMENT </b>
                </span>
                <br />
                <br />
                <span
                    >1.1 This Agreement is a binding contract between the
                    Company and the Second Party, and it sets out the Company's
                    and the Second Party's rights and obligations concerning the
                    Fund. In executing this Agreement, the Second Party agrees
                    to adhere to, and to be bound by, all of its terms.</span
                >
                <br />
                <br />
                <span
                    >1.2 In consideration of the -Payment to be paid by
                    the-Second Party to the Company in the manner and within the
                    times as set out in the Second Schedule hereto, the Company
                    hereby agree(s) to grant the Second Party's the right to use
                    the Property which details are stated in Item 5 of the First
                    Schedule hereto (hereinafter referred to as "the Property')
                    Provided the Second Party have executed the Security
                    Agreement mentioned in Clause 2.1 hereto and the- Second
                    Party hereby agree to accept the right to use the Property
                    subject to the terms and conditions hereinafter
                    contained.</span
                ><br />
                <br />
                <span
                    >1.3 The value of Payment has been discussed and determined
                    by both parties before the execution of this Agreement and
                    the Payment shall be the final value once both parties
                    execute this Agreement.</span
                >
                <br />
                <br />
                <span
                    >1.4 The Second Party does not have the right to intervene
                    with the deployment of the Fund placed in the Company. The
                    Company has absolute discretion on the deployment of the
                    Fund</span
                ><br /><br />
                <span>
                    <b>2. FUND PERIOD </b>
                </span>
                <br />
                <br />
                <span
                    >2.1 The Fund shall mature upon completion of the period as
                    stated in Item 6 of the First Schedule hereto (hereinafter
                    referred to as "agreed Period"). All Payments shall be
                    refunded to the -Second Party upon the expiry of the Fund
                    Period free from any interest, penalty, and/or claims within
                    Two (2) months from the expiry of Fund Period, or the
                    Extended Fund Period, as the case may be unless agreed
                    otherwise in writing.</span
                >
                <br />
                <br />
                <span
                    >2.1 It is agreed by the Company and the Second Party that
                    the— Fund Period shall be automatically renewed for the
                    period as stated in Item 7 of First Schedule hereto from the
                    expiry of the Fund Period (hereinafter referred to as
                    "Extended Fund Period") unless the -Second Party or the
                    Company has requested in writing of his/her/its intention
                    not to renew the Fund Period by providing advance notice of
                    Fourteen (14) days before the expiry of the Fund Period
                    (hereinafter referred to as "Termination Notice") then this
                    Agreement shall be automatically terminated upon expiry of
                    the Fund Period without further extension.
                </span>
                <br />
                <br />
                <span>
                    <b>3. GRANT OF RIGHT TO USE &amp; DELIVER OF PROPERTY </b>
                </span>
                <br />
                <br />
                <span
                    >3.1 The right to use the Property shall be granted to
                    the-Second Party upon the handover of the vacant possession
                    of the Property by the Company on the date as stated in Item
                    11 of the First Schedule hereto (hereinafter referred to as
                    'the Handover Date").</span
                >
                <br />
                <br />
                <span>
                    <b>4. PAYMENT RETURN</b>
                </span>
                <br />
                <br />
                <span
                    >4.1 The payment returns for the Fund shall be pay out by
                    the Company to the Second Party as in the manner described
                    in the Fourth Schedule of this Agreement. The monthly
                    payment return shall be determined by the Company - as per
                    the Company Policy and announcements.</span
                >
                <br />
                <br />
                <span>
                    <b>5. SPECIAL COVENANT</b>
                </span>
                <br />
                <br />
                <span
                    >5.1 The -Second Party represents and warrants to the
                    Company that the Fund by the -Second Party in the Company
                    does not contravene the Moneylender Act 1951, the Anti Money
                    Laundering Act 2001 or any anti-money laundering
                    legislation, regulations or guidelines issued, administered,
                    or enforced by any governmental agency or regulator in the
                    jurisdiction in which the — Second Party conducts its
                    business or resides. Further, the Second Party represents
                    and warrants to the Company that the funding of the Payment
                    is not derived from the proceeds of any illegal
                    activity.</span
                >
                <br />
                <br />
                <span
                    >5.2 The Second Party further acknowledges that The Company
                    may work with ABS Global Realty Sdn Bhd, Reg no:
                    201601042228 (1213170-M). and its affiliates ("The Third
                    Party") to offer products and services licensed under Labuan
                    Financial Services and Securities Act 2010. However, such
                    engagement shall not be deemed or construed to create a
                    co-partnerships or joint venture between The Parties nor The
                    Third-Party being part of this Agreement.
                </span>
                <br />
                <br />
                <span>
                    <b>6. RISK WARNINGS</b>
                </span>
                <br />
                <br />
                <span
                    >6.1 As the performance of the company business is subject
                    to market condition, the Second Party shall not rely on any
                    past performance as a guarantee of future performance and
                    shall seek advice from an independent financial advisor.
                </span>
                <br />
                <br />
                <span
                    >6.2 The Second Party acknowledges and confirms that the
                    Second Party has carefully and diligently considered the
                    risks involved in extending the funding to the Company and
                    that the Second Party's participation in the placement of
                    Fund is entirely at their own risk.</span
                >
                <br />
                <br />
            </p>

            <template #footer>
                <div class="text-center mt-4">
                    <Button
                        label="Confirm"
                        icon="pi pi-check"
                        @click="closeModal(2)"
                    />
                </div>
            </template>
        </Dialog>

        <Dialog
            header="Term & Condition"
            v-model:visible="displayModal3"
            :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
            :style="{ width: '50vw' }"
            :modal="true"
        >
            <p class="m-0">
                <span>
                    By signing up as an Investor on the Platform and by
                    continuing to have an Investor account on the Platform, you
                    acknowledge that you have read, understand, and agree to
                    this Terms and Conditions.</span
                >
                <br />
                <br />
                <span>
                    Our review of each Offer and posting of the same on the
                    Platform do not mean that we</span
                >
                <br />
                <span> (a) recommend you invest in the Issuer; </span>
                <br />
                <span>
                    (b) believe the Issuer is likely to be successful, or</span
                >
                <br />
                <span> (c) endorse the Offer in any way.</span>
                <br />
                <br />
                <span>
                    We are not responsible, and will not be liable to you, if
                    the fundraising campaign of any Issuer you invest into is
                    unsuccessful. The investment decision with respect to any
                    investment through the Platform is yours and yours alone.
                    Apart from what is contained in the Offer, we have not
                    reviewed or approved any other information about the Issuer,
                    including any information on websites that are linked to
                    from the Offer (such as, without limitation, the website for
                    the Issuer or the social media profiles of entrepreneurs or
                    of the Issuer itself).</span
                >
                <br />
                <br />
                <span>
                    Notwithstanding the above, our decision on authorising you
                    to act as an Investor under the Platform is entirely ours.
                    We will not be liable to you for any direct or indirect
                    losses (including loss of profits, business or
                    opportunities), damages, or costs arising from our decision
                    not to authorise or permit you to be an Investor of the
                    Platform. Upon becoming an Investor, you will be able to
                    view majority of the Offers on the Platform. However, some
                    Offers may be reserved for specific or restricted group of
                    investors at our discretion.</span
                ><br />
                <br />
                <span>
                    Upon completion of all the stated processes, you will become
                    an Investor under the Platform. You will remain an Investor
                    until and unless your membership is terminated or suspended.
                    In becoming an Investor, you confirm that we have not
                    solicited your membership or your investment, and that you
                    have visited this Platform of your own volition.</span
                >
                <br />
                <br />
                <span>
                    We do not provide any advice with respect to any aspect of
                    transactions conducted through the Platform, other than
                    advice on the technical use of the Platform. This means,
                    among other things, that we cannot give you any legal, tax,
                    financial, or other advice in connection with your
                    membership or any investments you make through the Platform,
                    and nothing on the Platform or in any communications we send
                    to you is intended to constitute advice. If you need or want
                    advice, you should consult an appropriate professional
                    financial, legal, tax, or other adviser.</span
                ><br /><br /><span translate="">
                    As an Investor, you hereby agree and acknowledge that ABS
                    Agency has the sole and absolute discretion to determine
                    whether a Material Adverse Change has occurred. In the event
                    of a Material Adverse Change, we will inform you via email
                    of this. You will be given an opt-out option within ten(10)
                    calendar days from the day of receiving this email
                    notification.</span
                ><br /><br />
                <span>
                    Completion of an Offer (“Completion”) will take place only
                    after the following conditions have been satisfied.</span
                >
                <br />
                <span>
                    • All the transfers of funds have been verified by us</span
                >
                <br />
                <span>
                    • The Offer target has been achieved before or upon the
                    expiry of the Offer period</span
                >
                <br />
                <span> • There is no ongoing Material Adverse Change</span>
                <br />
                <span>
                    • The Issuer has completed all required due diligence
                    activities</span
                >
                <br />
                <span>
                    • Any and all such conditions precedent as set out in the
                    respective investment/ transaction agreements relating to
                    the fund raising</span
                >
                <br />
                <span>
                    • The six (6) Business Days Cooling-off Period of all the
                    Investors have expired.</span
                >
                <br />
                <br />
                <span>
                    Upon Completion, all the investment funds in the Trust
                    Account will be released to the Issuer after the Trustee’s
                    receipt of the written confirmation issued by ABS Agency in
                    accordance with the terms and conditions of the Trust
                    Deed.</span
                >
                <br />
                <br />
                <span>
                    As an Investor, you may be entitled to certain dividends in
                    an Issuer in accordance with the terms of investments
                    entered into between you and the said Issuer. Please note
                    that any declaration of dividends by the said Issuer may
                    trigger statutory requirements under the Companies Act 2016,
                    including requirements for directors of the Issuer to
                    prepare solvency statements and to procure relevant
                    approvals from the Issuer’s directors and shareholders (as
                    applicable), or relevant transactions and agreements.</span
                >
                <br />
                <br />
                <span>
                    We reserve the right to amend our fees and its contents at
                    any time. In the event of a materially new service or
                    product line, we will inform you through the Platform or by
                    email.</span
                >
                <br />
                <br />
                <span>
                    If you no longer wish to be a Member of the Platform, you
                    may terminate your membership at any time by notifying us
                    pursuant to the notification process. We may terminate your
                    membership at any time and for any or no reason.</span
                >
                <br />
                <br />
                <span>
                    We are not in breach of this Agreement if there is, and
                    shall not be liable or have responsibility of any kind for
                    any loss or damage incurred by you as a result of, any total
                    or partial failure, interruption or delay in performance of
                    our duties and obligations occasioned by any act of God;
                    natural disaster; act of government, state, governmental or
                    supranational body or regulatory authority; war; civil
                    disruption; pandemic; terrorism; labour disputes; or any
                    other event, circumstance, or state of affairs (whether or
                    not similar in kind to any of the above) beyond our
                    reasonable control.</span
                >
            </p>

            <template #footer>
                <div class="text-center mt-4">
                    <Button
                        label="Confirm"
                        icon="pi pi-check"
                        @click="closeModal(3)"
                    />
                </div>
            </template>
        </Dialog>
    </Teleport>
</template>
<style scope lang="css"></style>
