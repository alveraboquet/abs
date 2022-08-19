import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import PrimeVue from "primevue/config";
import Message from "primevue/message";
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import Image from "primevue/image";
import Toolbar from "primevue/toolbar";
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import InputNumber from "primevue/inputnumber";
import Dropdown from "primevue/dropdown";
import Password from "primevue/password";
import Chart from "primevue/chart";

import VueApexCharts from "vue3-apexcharts";
import Fieldset from "primevue/fieldset";
import Card from "primevue/card";
import ScrollPanel from "primevue/scrollpanel";
import TabView from "primevue/tabview";
import TabPanel from "primevue/tabpanel";
import Divider from "primevue/divider";
import Tag from "primevue/tag";
import Avatar from "primevue/avatar";
import AvatarGroup from "primevue/avatargroup";
import Tree from "primevue/tree";

import { VueClipboard } from "@soerenmartius/vue3-clipboard";
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";
import "primeflex/primeflex.css";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(PrimeVue)
            .use(VueApexCharts)
            .use(VueClipboard)
            .component("Dialog", Dialog)
            .component("Message", Message)
            .component("Button", Button)
            .component("Image", Image)
            .component("InputText", InputText)
            .component("Toolbar", Toolbar)
            .component("Password", Password)
            .component("Link", Link)
            .component("Dropdown", Dropdown)
            .component("InputMask", InputMask)
            .component("InputNumber", InputNumber)
            .component("Chart", Chart)
            .component("Fieldset", Fieldset)
            .component("Card", Card)
            .component("ScrollPanel", ScrollPanel)
            .component("TabView", TabView)
            .component("TabPanel", TabPanel)
            .component("Divider", Divider)
            .component("Avatar", Avatar)
            .component("AvatarGroup", AvatarGroup)
            .component("Tag", Tag)
            .component("Tree", Tree)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });