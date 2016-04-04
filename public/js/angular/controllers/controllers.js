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
gloopsApp.controller('AlertController', ['$scope', '$timeout', function($scope, $timeout) {


    $scope.closeAlert = function () {
        $scope.startFade = true;
        $timeout(function(){
            $scope.hidden = true;
        }, 1200);
        
    };

}]);
gloopsApp.controller('LibraryController', ['$scope', '$http', function($scope, $http) {

    //Sidebar toggle
    $scope.sidebarUp = false;

    //Get user 
    $scope.getUser = function() {

        $http({
              method  : 'GET',
              url     : '/getuser'
        }).success(function(data) {

            $scope.currentUser = data;

            //if user object is empty (not logged in)
            if(Object.keys($scope.currentUser).length > 0)
            {
                $scope.loggedIn = true;
            }
            else
            {
                $scope.loggedIn = false;
            }

        });
    };

    //Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/library/data'
        }).success(function(data) {

            $scope.loops = data;
        });
    };

    $scope.getLoops();
    $scope.getUser();

}]);
//# sourceMappingURL=controllers.js.map
