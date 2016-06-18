'use strict';

process.env.DISABLE_NOTIFIER = false;

var elixir = require('laravel-elixir');
var autoprefixer = require('gulp-autoprefixer');
var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');

gulp.task('minify-css', function() {
  return gulp.src('public/css/style.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('public/css'));
});

elixir(function(mix) {
    mix.sass([
        './resources/assets/css/**/**/*.scss'
    ], 'public/css/style.css');

    mix.scripts([
       'app.js'
    ], 'public/js/angular/app.js');

    mix.scripts([
       'jquery/chosenSelect.js',
       'jquery/fileUpload.js',
       'jquery/velocity.min.js',
       'jquery/leanModal.js',
       'jquery/sectionScroll.js',
       'jquery/main.js'
    ], 'public/js/jquery.js');
    
    mix.scripts([
        'services/OverheatingService.js'
    ], 'public/js/angular/services/services.js');

    mix.scripts([
    	'controllers/LoopController.js',
        'controllers/AlertController.js',
        'controllers/LibraryController.js',
        'controllers/StationController.js',
        'controllers/ProfileController.js',
        'controllers/HomeController.js',
        'controllers/MainController.js',
        'controllers/RecordController.js',
        'controllers/SpecificuserController.js',
        'controllers/DeleteAccountController.js',
        'controllers/RegisterController.js',
        'controllers/EditProfileController.js',
        'controllers/SpecificLoopController.js',
        'controllers/SpecificTagController.js'
    ], 'public/js/angular/controllers/controllers.js');

    mix.scripts([
        'directives/tooltip.js',
        'directives/smoothScroll.js'
    ], 'public/js/angular/directives/directives.js');
});

//To watch changes in sass files
elixir.Task.find('sass').watch('./resources/assets/css/**/*.scss');
