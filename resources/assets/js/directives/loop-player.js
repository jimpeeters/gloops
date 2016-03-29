/*gloopsApp.directive('loopPlayer', function() {
    return {
      restrict: 'E',
      template: '/loop-player.html',
      scope: { 
        'src': '=',
        'title': '='
      },
      link: function(scope, element, attrs) {
        var music = $(element).find('music');
         scope.playLoop = function() {
            if (music.paused) {
              music.play();
            }
            else {
              music.pause();
            }
        };
      }
    };
});*/