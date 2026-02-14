import './bootstrap';
import '../css/app.css';
import '../css/style.css';

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
// import AuthLayout from './Layouts/AuthLayout.vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { usePage } from "@inertiajs/vue3";
const  page  = usePage();

createInertiaApp({
    title: (title) =>  `${title} | ${page.props.appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`];
        // page.default.layout = page.default.layout || AuthLayout
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            // .component('Link', Link)
            .mount(el)
    },
    progress: {
        color: '#29d',
        includeCSS: true,
        showSpinner: false,
    },
})