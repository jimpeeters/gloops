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
        './public/resources/css/**/*.scss'
    ], 'public/resources/css/style.css');
});

//To watch changes in sass files
elixir.Task.find('sass').watch('./public/resources/css/**/*.scss');


//console.log(elixir);