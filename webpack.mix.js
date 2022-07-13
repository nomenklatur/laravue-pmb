const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/js/app.js',
    ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
// mix.styles([
//         'public/src/assets/vendor/bootstrap/css/bootstrap.min.css',
//         'public/src/assets/vendor/icofont/icofont.min.css',
//         'public/src/assets/vendor/boxicons/css/boxicons.min.css',
//         'public/src/assets/vendor/remixicon/remixicon.css',
//         'public/src/assets/vendor/venobox/venobox.css',
//         'public/src/assets/vendor/owl.carousel/assets/owl.carousel.min.css',
//         'public/src/assets/vendor/aos/aos.css',
//         'public/src/assets/css/style.css',
//     ], 'public/css/all.css');

    // mix.js([

    // ], 'public/js/all.js')