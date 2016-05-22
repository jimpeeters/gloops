gloopsApp.controller('MainController', ['$scope', '$http', 'OverheatingService',  function($scope, $http, OverheatingService) {
    
    $scope.isOverheating = OverheatingService.isOverheating;
    
    $scope.isOverheating = function () {
        return OverheatingService.isOverheating;
    };


    // Search arrays
    $scope.searchResultsTags = '';
    $scope.searchResultsCategory = '';
    $scope.searchResultsLoopname = '';

    // Search limits for load more buttons
	$scope.searchTagsLimit = 6;
	$scope.searchCategoryLimit = 6;
    $scope.searchLoopnameLimit = 6;

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
	            $scope.searchResultsTags = data;
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
	            $scope.searchResultsCategory = data;
	        });
    	}
    }

    // Search a loop based on loopname
    $scope.searchOnLoopname = function(query) {

        if (query.length > 0) {
           $http({
                  method  : 'GET',
                  url     : '/search/loopname/' + query
            }).success(function(data) {
                $scope.searchResultsLoopname = data;
            });
        }
    }

}]);