gloopsApp.controller('LoopController', ['$scope', '$http', 'OverheatingService', function($scope, $http, OverheatingService) {
    
    // is loop playing
    $scope.isPlaying = false;
    $scope.isInit = false;

    $scope.playLoop = function(loop, $event) {

        var playBtnIcon = $event.target;
        
        // If loop is not initialised yet
        if($scope.isInit == false) {
        
            $scope.player = new Gapless5("gapless_" + loop.id);
            $scope.player.loop = true;
            $scope.player.addTrack(loop.loop_path);
            $scope.isInit = true;
        }

        // If loop is not playing 
        if (OverheatingService.playingLoopId != $scope.player.id) {

            // When there is already a loop playing, stop it.
            if (OverheatingService.playingLoopId != null && OverheatingService.playingLoopButtonId != null) {
                GAPLESS5_PLAYERS[OverheatingService.playingLoopId].stop();

                if (document.getElementById("play-button-" + OverheatingService.playingLoopButtonId) != null) {
                    document.getElementById("play-button-" + OverheatingService.playingLoopButtonId).className = "fa fa-play";
                }
            }

            OverheatingService.playingLoopId = $scope.player.id;
            OverheatingService.playingLoopButtonId = loop.id

            $scope.player.play();
            $scope.isPlaying = true;
            
            playBtnIcon.className = "fa fa-pause";
        }
        // If loop is playing
        else {
            OverheatingService.playingLoopId = null;
            $scope.player.pause();
            $scope.isPlaying = false;
            
            playBtnIcon.className = "fa fa-play";
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
              url     : '/loop/favourite',
              headers : {'Content-Type': 'application/json'},
              dataType: 'json',
              data    : $data
        });
    };

}]);