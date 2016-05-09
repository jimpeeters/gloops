/* This is the main file where angular is defined */
var gloopsApp = angular.module('gloopsApp', ['angularAudioRecorder']);

// Replace brackets with these symbols to avoid conflict with laravel
gloopsApp.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});