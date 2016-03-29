/* This is the main file where angular is defined */

var gloopsApp = angular.module('gloopsApp', ['ngAnimate']);

gloopsApp.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});
//# sourceMappingURL=app.js.map
