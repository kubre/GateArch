window._ = require('lodash')

try {
    window.Vue = require('vue')
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    // window.moment = require('moment');
    window.qs = require('qs')
    window.Swal = require('sweetalert2')
    window.require = window.requirejs = require('shebang-loader!requirejs')
    // window.tinymce = require('tinymce');

    require('bootstrap')
    require('bootstrap-material-design')
    require('jquery-ui-bundle')
    require('chart.js')
} catch (e) {
    console.error(e)
}

require('sanjab/resources/js/material-dashboard');

// Vue.use(require('./plugin').default);

window.axios = require('axios').default

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
