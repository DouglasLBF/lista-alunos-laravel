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

mix
.sass('resources/views/scss/style.scss','public/site-css/style.scss')
.css('resources/css/yearpicker.css','public/site-css/yearpicker.css')
.scripts('node_modules/jquery/dist/jquery.min.js','public/site-js/jquery.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js','public/site-js/bootstrap.js')
.scripts('node_modules/datatables.net/js/jquery.dataTables.min.js','public/site-js/dataTables.js')
.scripts('node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js','public/site-js/dataTables-bs5.js')
.scripts('resources/js/yearpicker.js','public/site-js/yearpicker.js')
.scripts('resources/js/app.js','public/site-js/app.js')
.scripts('resources/views/site/js/alunos.js','public/site-js/alunos.js')
.version();