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
.css('node_modules/datatables.net-buttons-dt/css/buttons.dataTables.min.css','public/site-css/buttons.dataTables.min.css')
.css('node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css','public/site-css/buttons.bootstrap5.min.css')
.css('node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css','public/site-css/dataTables.bootstrap5.min.css')
.css('node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css','public/site-css/fontawesome.min.css')
.css('node_modules/@fortawesome/fontawesome-free/css/brands.min.css','public/site-css/brands.min.css')
.css('node_modules/@fortawesome/fontawesome-free/css/solid.min.css','public/site-css/solid.min.css')
.scripts('node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js','public/site-js/fontawesome.min.js')
.scripts('node_modules/jquery/dist/jquery.min.js','public/site-js/jquery.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js','public/site-js/bootstrap.js')
.scripts('node_modules/datatables.net/js/jquery.dataTables.min.js','public/site-js/dataTables.js')
.scripts('node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js','public/site-js/dataTables-bs5.js')
.scripts('node_modules/datatables.net-buttons/js/dataTables.buttons.min.js','public/site-js/dataTables.buttons.min.js')
.scripts('node_modules/datatables.net-buttons/js/buttons.print.min.js','public/site-js/buttons.print.min.js')
.scripts('node_modules/datatables.net-buttons/js/buttons.html5.min.js','public/site-js/buttons.html5.min.js')
.scripts('node_modules/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js','public/site-js/buttons.bootstrap5.min.js')
.scripts('node_modules/jszip/dist/jszip.min.js','public/site-js/jszip.min.js')
.scripts('node_modules/pdfmake/build/pdfmake.min.js','public/site-js/pdfmake.min.js')
.scripts('node_modules/pdfmake/build/vfs_fonts.js','public/site-js/vfs_fonts.min.js')
.scripts('resources/js/yearpicker.js','public/site-js/yearpicker.js')
.scripts('resources/js/app.js','public/site-js/app.js')
.scripts('resources/views/site/js/alunos.js','public/site-js/alunos.js')
.version();