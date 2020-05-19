import 'sanjab';

if (document.querySelector('#sanjab_app')) {
    $('.sidebar').data('image', '');
    $('.sidebar-background').css('background-image', '');
    $('.image-author').remove();

    window.sanjabApp = new Vue({
        el: '#sanjab_app',
    });
}
