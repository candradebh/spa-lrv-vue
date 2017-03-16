const { mix } = require('laravel-mix');


mix.js('resources/assets/spa/js/spa.js', 'public/js')
   .sass('resources/assets/spa/sass/spa.scss', 'public/css');

mix.js('resources/assets/site/js/main.js', 'public/js')
    .sass('resources/assets/site/sass/site.scss', 'public/css');

mix.js('resources/assets/protheus/js/brasilnet.js', 'public/js')
    .sass('resources/assets/protheus/sass/brasilnet.scss', 'public/css');
