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

    // Order by most recent
    $scope.mostRecent = false;

    // Load more button
    $scope.loopLimit = 9;
    
    // Category toggles
    $scope.categoryBlues = false;
    $scope.categoryPop = false;
    $scope.categoryRock = false;
    $scope.categoryCountry = false;
    $scope.categoryFlamenco = false;
    $scope.categoryAlternative = false;
    $scope.categoryPunk = false;
    
    
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