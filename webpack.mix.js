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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'node_modules/datatables.net-dt/css/dataTables.dataTables.min.css',
        'node_modules/select2/dist/css/select2.min.css',
        'node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css',
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
    ], 'public/css/vendor.css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/vue/dist/vue.min.js',
        'node_modules/chartjs/chart.js',
        'node_modules/datatables.net-dt/js/dataTables.dataTables.min.js',
        'node_modules/select2/dist/js/select2.min.js',
        'node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/popper.js/dist/popper.min.js',
    ], 'public/js/vendor.js');
