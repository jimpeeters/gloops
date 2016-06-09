/* This is the main file where angular is defined */
var gloopsApp = angular.module('gloopsApp', ['angularAudioRecorder']);

// Replace brackets with these symbols to avoid conflict with laravel
gloopsApp.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

gloopsApp.filter('unique', function() {
   return function(collection, keyname) {
      var output = [], 
          keys = [];

      angular.forEach(collection, function(item) {
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });

      return output;
   };
});