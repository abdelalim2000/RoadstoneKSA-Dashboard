const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/main.js', 'public/assets/js/main.js')
    .js('resources/assets/js/script.js', 'public/assets/js/script.js')
    .js('resources/assets/js/slick.js', 'public/assets/js/slick.js')
    .copy('resources/assets/js/typed.min.js', 'public/assets/js/typed.min.js')
    .copy('resources/assets/js/royal_preloader.min.js', 'public/assets/js/royal_preloader.min.js')
    .copyDirectory('resources/assets/css/fonts', 'public/assets/css/fonts')
    .copyDirectory('resources/assets/imgs', 'public/assets/imgs')
    .css('resources/assets/css/owl.carousel.min.css', 'public/assets/css/owl.carousel.min.css')
    .css('resources/assets/css/owl.theme.default.min.css', 'public/assets/css/owl.theme.default.min.css')
    .css('resources/assets/css/royal-preload.css', 'public/assets/css/royal-preload.css')
    .css('resources/assets/css/style.css', 'public/assets/css/style.css')
    .css('resources/assets/css/style-rtl.css', 'public/assets/css/style-rtl.css')
    .options({
        processCssUrls: false
    })
    .version();
