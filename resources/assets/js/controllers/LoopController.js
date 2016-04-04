gloopsApp.controller('LoopController', ['$scope', '$http', function($scope, $http) {

    $scope.playLoop = function($event) {

        var music = $event.currentTarget.nextElementSibling;
        var playBtnIcon = $event.target;
        var duration = $event.currentTarget.parentElement.nextElementSibling.children[1];

        if (music.paused) {
            music.play();
            playBtnIcon.className = "fa fa-pause";

        } 
        else { 
            music.pause();
            playBtnIcon.className = "fa fa-play";
        }

        function pad(n) {
            return (n < 10) ? ("0" + n) : n;
        }

        music.ontimeupdate = function() {
          duration.innerHTML = '0:' + pad(Math.round(music.currentTime));
        }

    };

    $scope.favourite = function($loopId) {

        $scope.isFavourite = !$scope.isFavourite;

        var data = {};
        $data = {
            loopId : $loopId
        };

        $http({
              method  : 'POST',
              url     : 'loop/favourite',
              headers : {'Content-Type': 'application/json'},
              dataType: 'json',
              data    : $data
        });
    };

}]);