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
    .js('resources/js/frontend.js', 'public/js')
    .js('resources/js/auth/login.js', 'public/js/auth')
    .js('resources/js/auth/resetPassword.js', 'public/js/auth')
    .js('resources/js/auth/forgetPassword.js', 'public/js/auth')

.js('resources/js/frontend/activities/index.js', 'public/js/frontend/activities')
    .js('resources/js/frontend/recommandations/index.js', 'public/js/frontend/recommandations')
    .js('resources/js/frontend/donatedBooks/index.js', 'public/js/frontend/donatedBooks')

.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/frontend/frontend.scss', 'public/css/frontend')
    .sass('resources/sass/frontend/donations/index.scss', 'public/css/frontend/donations')
    .sass('resources/sass/frontend/activities/index.scss', 'public/css/frontend/activities')
    .sass('resources/sass/frontend/activities/show.scss', 'public/css/frontend/activities')
    .sass('resources/sass/frontend/recommandations/index.scss', 'public/css/frontend/recommandations')
    .sass('resources/sass/frontend/donatedBooks/index.scss', 'public/css/frontend/donatedBooks')
    .sass('resources/sass/frontend/books/show.scss', 'public/css/frontend/books')
    .sass('resources/sass/frontend/about/index.scss', 'public/css/frontend/about')
    .options({
        processCssUrls: false,
    });

mix.js('resources/js/backend.js', 'public/js')
    .js('resources/js/backend/index.js', 'public/js/backend')

.js('resources/js/agencies/index.js', 'public/js/agencies')
    .js('resources/js/agencies/create.js', 'public/js/agencies')
    .js('resources/js/agencies/edit.js', 'public/js/agencies')

.js('resources/js/borrowers/index.js', 'public/js/borrowers')
    .js('resources/js/borrowers/create.js', 'public/js/borrowers')
    .js('resources/js/borrowers/edit.js', 'public/js/borrowers')

.js('resources/js/users/create.js', 'public/js/users')
    .js('resources/js/users/edit.js', 'public/js/users')
    .js('resources/js/users/index.js', 'public/js/users')

.js('resources/js/donors/index.js', 'public/js/donors')
    .js('resources/js/donors/create.js', 'public/js/donors')
    .js('resources/js/donors/edit.js', 'public/js/donors')

.js('resources/js/books/index.js', 'public/js/books')
    .js('resources/js/books/create.js', 'public/js/books')
    .js('resources/js/books/edit.js', 'public/js/books')
    .js('resources/js/books/print.js', 'public/js/books')

.js('resources/js/circulation/index.js', 'public/js/circulation')
    .js('resources/js/circulation/borrow.js', 'public/js/circulation')
    .js('resources/js/circulation/unreturns/index.js', 'public/js/circulation/unreturns')
    .js('resources/js/circulation/unreturns/edit.js', 'public/js/circulation/unreturns')

.js('resources/js/loginLogs/index.js', 'public/js/loginLogs')

.js('resources/js/announcements/index.js', 'public/js/announcements')
    .js('resources/js/announcements/create.js', 'public/js/announcements')
    .js('resources/js/announcements/edit.js', 'public/js/announcements')

.js('resources/js/borrowLogs/index.js', 'public/js/borrowLogs')

.js('resources/js/recommendation/edit.js', 'public/js/recommendation')

.js('resources/js/activities/create.js', 'public/js/activities')
    .js('resources/js/activities/index.js', 'public/js/activities')
    .js('resources/js/activities/edit.js', 'public/js/activities')

.js('resources/js/information/edit.js', 'public/js/information')
    .js('resources/js/information/donate.js', 'public/js/information')
    .js('resources/js/chart/index.js', 'public/js/chart')

.sass('resources/sass/backend/backend.scss', 'public/css')
    .sass('resources/sass/errors.scss', 'public/css');