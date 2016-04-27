gloopsApp.controller('LoopController', ['$scope', '$http', 'RewardService', function($scope, $http, RewardService) {
    
    // is loop playing
    $scope.isPlaying = false;
    $scope.isInit = false;

    $scope.playLoop = function(loop, $event) {
        
        var music = $event.currentTarget.nextElementSibling;
        var playBtnIcon = $event.target;
        var duration = $event.currentTarget.parentElement.nextElementSibling.children[1];
        
        // If loop is not initialised yet
        if($scope.isInit == false) {
        
            $scope.player = new Gapless5("gapless_" + loop.id);
            $scope.player.loop = true;
            debugger;
            $scope.player.addTrack(loop.loop_path);
            $scope.isInit = true;
        }

        // If loop is not playing 
        if ($scope.isPlaying == false) {
            $scope.player.play();
            $scope.isPlaying = true;
            
            playBtnIcon.className = "fa fa-pause";
        
            // Increase overheating (reward)
            RewardService.increaseOverheating();
        }
        // If loop is playing
        else {
            $scope.player.pause();
            $scope.isPlaying = false;
            
            playBtnIcon.className = "fa fa-play";
        
            // Decrease overheating (reward)
            RewardService.decreaseOverheating();
        }
        
        function pad(n) {
            return (n < 10) ? ("0" + n) : n;
        }

        music.ontimeupdate = function() {
          duration.innerHTML = '0:' + pad(Math.round(music.currentTime));
        }
        
        /*        this.getLength = function() { return endpos; }        */

        /* OLD WAY (with gaps)
        var music = $event.currentTarget.nextElementSibling;
        music.preload = "auto";
        var playBtnIcon = $event.target;
        var duration = $event.currentTarget.parentElement.nextElementSibling.children[1];
        
        if (music.paused) {
            music.play();
            playBtnIcon.className = "fa fa-pause";
            
            // Increase overheating (reward)
            RewardService.increaseOverheating();

        } 
        else { 
            music.pause();
            playBtnIcon.className = "fa fa-play";
            
            // Decrease overheating (reward)
            RewardService.decreaseOverheating();
        }

        function pad(n) {
            return (n < 10) ? ("0" + n) : n;
        }

        music.ontimeupdate = function() {
          duration.innerHTML = '0:' + pad(Math.round(music.currentTime));
        }*/

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

}]);