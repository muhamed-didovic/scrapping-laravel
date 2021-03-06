const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');
require('laravel-elixir-browserify-official');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.browserify('app.js')
        .sass('app.scss')
        .version([
            'js/app.js',
            'css/app.css'
        ])
});
