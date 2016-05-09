'use strict';

process.env.DISABLE_NOTIFIER = true;

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
        './resources/assets/css/**/**/*.scss'
    ], 'public/css/style.css');

    mix.scripts([
       'app.js'
    ], 'public/js/angular/app.js');

    mix.scripts([
       'jquery/searchbarHide.js',
       'jquery/chosenSelect.js',
       'jquery/fileUpload.js'
    ], 'public/js/jquery.js');
    
    mix.scripts([
        'services/RewardService.js'
    ], 'public/js/angular/services/services.js');

    mix.scripts([
    	'controllers/LoopController.js',
        'controllers/AlertController.js',
        'controllers/LibraryController.js',
        'controllers/StationController.js',
        'controllers/ProfileController.js',
        'controllers/HomeController.js',
        'controllers/MainController.js',
        'controllers/RecordController.js'
    ], 'public/js/angular/controllers/controllers.js');

    mix.scripts([
        'directives/tooltip.js',
        'directives/smoothScroll.js'
    ], 'public/js/angular/directives/directives.js');


/*    mix.scripts([
        'modules/angular.audio.js'
    ], 'public/js/modules.js');*/
});

//To watch changes in sass files
elixir.Task.find('sass').watch('./resources/assets/css/**/*.scss');


//console.log(elixir);
// run gulp scripts and gulp sass