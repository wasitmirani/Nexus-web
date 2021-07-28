/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import router from "./router";
import VueProgressBar from 'vue-progressbar'
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css' //Vuesax styles
import { VueEditor, Quill } from "vue2-editor";
import Vue from "vue";
import Swal from 'sweetalert2'
import moment from 'moment';

window.moment = moment;

Vue.use(Vuesax);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


window.Swal = Swal;


Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '4px'
})

Vue.filter("timeformat", function(value) {
    if (value) {
        return moment
            .utc(String(value))
            .local()
            .fromNow();
    }
});
const app = new Vue({
    el: '#app',
    router,
    methods: {
        groupActive() {
            if (this.$router.history.current.path) {
                $('ul').removeClass("show");
                $(this).children('ul').addClass('show');
                return "active sidebar-layout";
            } else {
                return "sidebar-layout";
            }
        },
    },
    created() {
        this.$Progress.start()
        this.$router.beforeEach((to, from, next) => {
                //  does the page we want to go to have a meta.progress object
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress
                        // parse meta tags
                    this.$Progress.parseMeta(meta)
                }
                //  start the progress bar
                this.$Progress.start()
                    //  continue to next page
                next()
            })
            //  hook the progress bar to finish after we've finished moving router-view
        this.$router.afterEach((to, from) => {
            //  finish the progress bar
            this.$Progress.finish()
        })
        this.$Progress.finish()
    }
});