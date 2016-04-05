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

    // Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/library/data'
        }).success(function(data) {

            $scope.loops = data;
        });
    };

    // Get loops
    $scope.getLoops();

    // Sidebar toggle
    $scope.sidebarUp = false;

    // Filters
    $scope.categoryIncludes = [];

    $scope.includeCategory = function(category) {
        var i = $.inArray(category, $scope.categoryIncludes);
        if (i > -1) {
            $scope.categoryIncludes.splice(i, 1);
        } else {
            $scope.categoryIncludes.push(category);
        }

        $scope.loops.sort(category);
    }
    
    $scope.categoryFilter = function(loop) {
        if ($scope.categoryIncludes.length > 0) {
            if ($.inArray(loop.category.name, $scope.categoryIncludes) < 0)
                return;
        }
        
        return loop;
    }

    // Order by
    $scope.sortParameter = '';

    // Load more button
    $scope.loopLimit = 9;
    
    /*    //Get user 
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
*/

    //$scope.getUser();

}]);
gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    // Limit on 'favourited loops'
    $scope.favouritedLoopsLimit = 6;

    // Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/data'
        }).success(function(data) {

            $scope.loops = data;
            $scope.checkFavouriteLoops();
            console.log(data);
        });
    };

    $scope.getLoops();


    $scope.favouritedLoops = [];

    // Make new array of favourited loops
    $scope.checkFavouriteLoops = function() {

      var index;

      //check if loop is favourited
      for (index = 0; index < $scope.loops.length; ++index) {
          if ($scope.loops[index].isFavourite === true) {
            // Add loop with isfavourite 'true' to favouritedLoops array
            $scope.favouritedLoops.push($scope.loops[index]);
          }
      }
  
    };

    $scope.filterFavouriteLoops = function(loop) {

        //check if loop is in favouritedLoops array
        var i = $.inArray(loop, $scope.favouritedLoops);
        if (i > -1) {
            $scope.favouritedLoops.splice(i, 1);
        } else {
            $scope.favouritedLoops.push(loop);
        }
    }

}]);
//# sourceMappingURL=controllers.js.map
