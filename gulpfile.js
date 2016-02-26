'use strict';

var elixir = require('laravel-elixir');
var autoprefixer = require('gulp-autoprefixer'); //for browser compatibility

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

elixir(function(mix) {
    mix.sass([
        './resources/assets/css/**/*.scss'
    ], 'public/css/style.css');

    mix.scripts([
       'app.js'
    ], 'public/js/app.js');
});

//To watch changes in sass files
elixir.Task.find('sass').watch('./resources/assets/css/**/*.scss');


//console.log(elixir);