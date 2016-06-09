gloopsApp.controller('MainController', ['$scope', '$http', 'OverheatingService',  function($scope, $http, OverheatingService) {
    
    $scope.isOverheating = OverheatingService.isOverheating;
    
    $scope.isOverheating = function () {
        return OverheatingService.isOverheating;
    };

    $scope.dropdownToggled = false;
    $scope.searchActive = false;

    // Search array
    $scope.searchResults = '';

    // Search limit for load more buttons
	$scope.loopLimit = 6;

    // Searching state
    $scope.isSearching = false;

    //set the value of the search query
    $scope.setQueryValue = function(query) {
    	$scope.query = query;
    }

    // Search a loop based on tagname
    $scope.searchOnTags = function(query) {

    	if (query.length > 0) {
	       $http({
	              method  : 'GET',
	              url     : '/search/tags/' + query
	        }).success(function(data) {
	            $scope.searchResults = data;
	            // Change searching state
	            $scope.isSearching = true;
	        });
    	}
    	else {
    		$scope.isSearching = false;
    	}
    }

    // Search a loop based on category
    $scope.searchOnCategory = function(query) {

    	if (query.length > 0) {
	       $http({
	              method  : 'GET',
	              url     : '/search/category/' + query
	        }).success(function(data) {
	            $scope.searchResults = $scope.searchResults.concat(data);
	        });
    	}
    }

    // Search a loop based on loopname
    $scope.searchOnLoopname = function(query) {

        query = query.toLowerCase();

        if (query.length > 0) {
           $http({
                  method  : 'GET',
                  url     : '/search/loopname/' + query
            }).success(function(data) {
                $scope.searchResults = $scope.searchResults.concat(data);
            });
        }
    }
}]);