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
   .js('resources/js/auth/login.js', 'public/js/auth')

   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/backend.js', 'public/js')
   .js('resources/js/agencies/index.js', 'public/js/agencies')
   .js('resources/js/agencies/create.js', 'public/js/agencies')
   .js('resources/js/agencies/edit.js', 'public/js/agencies')

   .js('resources/js/borrowers/create.js', 'public/js/borrowers')
   .js('resources/js/borrowers/edit.js', 'public/js/borrowers')

   .js('resources/js/donors/create.js', 'public/js/donors')
   .js('resources/js/donors/edit.js', 'public/js/donors')

   .js('resources/js/books/index.js', 'public/js/books')
   .js('resources/js/books/create.js', 'public/js/books')
   .js('resources/js/books/edit.js', 'public/js/books')

   .js('resources/js/circulation/index.js', 'public/js/circulation')

   .sass('resources/sass/backend/backend.scss', 'public/css');
