gloopsApp.controller('ProfileController', ['$scope', '$http', function($scope, $http) {

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
    
    // Remove favourite in front-end 
    $scope.removeFavourite = function(loop) {
        var i = $.inArray(loop, $scope.favouriteLoops);
        $scope.favouriteLoops.splice(i, 1);
    }

}]);