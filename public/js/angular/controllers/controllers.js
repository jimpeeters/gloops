gloopsApp.controller('LoopController', ['$scope', function($scope) {

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
}]);
gloopsApp.controller('AlertController', ['$scope', '$timeout', function($scope, $timeout) {


    $scope.closeAlert = function () {
        $scope.startFade = true;
        $timeout(function(){
            $scope.hidden = true;
        }, 1200);
        
    };

}]);
//# sourceMappingURL=controllers.js.map
