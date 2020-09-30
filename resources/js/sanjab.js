import 'sanjab';
window.tinymce = require('tinymce').default

Vue.component('tiny-mce', require('./widgets/TinyMCE.vue').default);

if (document.querySelector('#sanjab_app')) {
    // $('.sidebar').data('image', '');
    // $('.sidebar-background').css('background-image', '');
    $('.image-author').remove();

    window.sanjabApp = new Vue({
        el: '#sanjab_app',
    });
}
