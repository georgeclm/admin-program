require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.mixin({ methods: { route } });
Vue.use(plugin)

const el = document.getElementById('app')
if(app){
        new Vue({
        render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
        }),
    }).$mount(el)
}
