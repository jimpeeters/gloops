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
        if ($scope.isPlaying == false) {
            $scope.player.play();
            $scope.isPlaying = true;
            
            playBtnIcon.className = "fa fa-pause";
        
            // Increase overheating
            OverheatingService.increaseOverheating();
        }
        // If loop is playing
        else {
            $scope.player.pause();
            $scope.isPlaying = false;
            
            playBtnIcon.className = "fa fa-play";
        
            // Decrease overheating
            OverheatingService.decreaseOverheating();
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