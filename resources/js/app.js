import './bootstrap';
// resources/js/app.js

require('./bootstrap');

import Vue from 'vue';

new Vue({
    el: "#app",
    data: {
        message: "",
    },
    methods: {
        sendMessage() {
            if (this.message.trim() !== "") {
                axios.post("/chat/send", {
                    message: this.message,
                    user_id: 1,
                    client_id: 1, 
                });

                this.message = "";
            }
        },
    },
    directives: {
        enter: {
            inserted(el, binding) {
                el.addEventListener("input", (event) => {
                    if (event.key === "Enter") {
                        binding.value(event);
                    }
                });
            },
        },
    },
});

// Enable Laravel Echo
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
});
