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
    $scope.sidebarUp = true;

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

    // Enable deleting
    $scope.enableDeleting = false;

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    $scope.successMessage = "";

    // Get all user his loops from database
    $scope.getUserLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/getUserLoops'
        }).success(function(data) {
            $scope.loops = data;
        });
    };

    $scope.getUserLoops();

    // Delete a loop
    $scope.deleteLoop = function(loop) {

        $loopId = loop.id
        var data = {};
        $data = {
            loopId : $loopId
        }
        $http({
              method  : 'POST',
              url     : 'loop/delete',
              headers : {'Content-Type': 'application/json'},
              dataType: 'json',
              data    : $data
        });

        /*.then(function successCallback(response) {

                // Send successmessage
                $scope.successMessage = "You have successfully removed";
                
            
            }, function errorCallback(response) {

                // Send error message

                // Include loop back in array
                $scope.loops.push(loop);
            
            });*/

        

        // Remove loop from loops array
        var i = $.inArray(loop, $scope.loops);
        $scope.loops.splice(i, 1);



    }  
}]);
gloopsApp.controller('ProfileController', ['$scope', '$http', '$location', '$anchorScroll', function($scope, $http, $location, $anchorScroll) {

    // Limit on loops
    $scope.loopLimit = 9;

    // Get all favourited loops from database
    $scope.getUserFavourites = function() {

        $http({
              method  : 'GET',
              url     : '/profile/getFavouriteLoops'
        }).success(function(data) {
            $scope.favouriteLoops = data;
        });
    };
    $scope.getUserFavourites();

    // Remove favourite in front-end 
    $scope.removeFavourite = function(loop) {
        var i = $.inArray(loop, $scope.favouriteLoops);
        $scope.favouriteLoops.splice(i, 1);
    }

}]);
gloopsApp.controller('HomeController', ['$scope', '$http', function($scope, $http) {

    // Get best loops from database
    $scope.getBestLoops = function() {

        $http({
              method  : 'GET',
              url     : '/getBestLoops'
        }).success(function(data) {

            $scope.loops = data;
        });
    };

    // Get loops
    $scope.getBestLoops();

}]);
//# sourceMappingURL=controllers.js.map
