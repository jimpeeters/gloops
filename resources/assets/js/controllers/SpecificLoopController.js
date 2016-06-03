gloopsApp.controller('SpecificLoopController', ['$scope', '$http', function($scope, $http) {

    // Get specific loop by id
    $scope.getSpecificLoop = function(id) {

        $http({
              method  : 'GET',
              url     : '/loop/' + id
        }).success(function(data) {
            $scope.loop = data;
            $scope.isFavourite = $scope.loop.isFavourite;
        });
    };
}]);