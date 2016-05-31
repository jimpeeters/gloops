gloopsApp.controller('LibraryController', ['$scope', '$http', function($scope, $http) {

    // Sidebar toggle
    $scope.sidebarUp = true;

    // Filters
    $scope.categoryIncludes = [];
    $scope.filterLoopsUserId = null;

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

    // Your loop filter toggle
    $scope.yourLoopfilterOn = false;

    // Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/library/data'
        }).success(function(data) {

            $scope.loops = data;
            //Set length of loops
            $scope.resultsLength = $scope.loops.length;
        });
    };

    // Get loops
    $scope.getLoops();

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
            if ($.inArray(loop.category.name, $scope.categoryIncludes) < 0) {
                return;
            }
        }
        return loop;
    }

    $scope.activateYourLoopFilter = function(id) {

        $scope.yourLoopfilterOn = !$scope.yourLoopfilterOn;

        if($scope.filterLoopsUserId == null) {
            $scope.filterLoopsUserId = id;
        }
        else
        {
            $scope.filterLoopsUserId = null;
        }
        
    }

    $scope.yourLoopFilter = function(loop) {
        // Do this filter when filterYourLoops is clicked
        if($scope.filterLoopsUserId != null) {

            //When loop is of logged in user
            if ($scope.filterLoopsUserId == loop.user.id) {
                return loop;
            }
            else {
                return;
            }
        }
        else {
            return;
        }
    }
}]);