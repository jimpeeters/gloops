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

    // Toggle favourite loop
    $scope.favourite = function(loopId) {

        $loopId = loopId;
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


    $scope.ratingIcon = "";

    function setRatingIcon() {

        if($scope.loop.user.rating < 20) {
            $scope.ratingIcon = "rank_1.png";
        }
        else if($scope.loop.user.rating >= 20 && $scope.loop.user.rating < 50) {
            $scope.ratingIcon = "rank_2.png";
        }
        else if($scope.loop.user.rating >= 50 && $scope.loop.user.rating < 100) {
            $scope.ratingIcon = "rank_3.png";
        }
        else if($scope.loop.user.rating >= 100 && $scope.loop.user.rating < 250) {
            $scope.ratingIcon = "rank_4.png";
        }
        else if($scope.loop.user.rating >= 250 ) {
            $scope.ratingIcon = "rank_5.png";
        }
    }

    setRatingIcon();

}]);