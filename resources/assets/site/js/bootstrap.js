
window._ = require('lodash');


window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

window.Vue = require('vue');

require('vue-resource');

window.axios = require('axios');

import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '7d166fcc22a3e8ee682b'
});


// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
