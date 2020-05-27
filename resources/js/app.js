window._ = require('lodash')

try {
    window.Vue = require('vue')
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    // window.moment = require('moment');
    window.qs = require('qs')
    window.Swal = require('sweetalert2')
    window.require = window.requirejs = require('shebang-loader!requirejs')

    require('bootstrap')
    require('bootstrap-material-design')
    require('jquery-ui-bundle')
    require('chart.js')
} catch (e) {
    console.error(e)
}

// Vue.use(require('./plugin').default);

window.axios = require('axios').default

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
