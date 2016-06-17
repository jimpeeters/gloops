gloopsApp.controller('SpecificTagController', ['$scope', '$http', function($scope, $http) {

	$scope.loopLimit = 6;

    // Get specific loops by tagname
    $scope.getLoopsFromTag = function(name) {

        $http({
              method  : 'GET',
              url     : '/loops/tag/' + name
        }).success(function(data) {
            $scope.loops = data;
        });
    };
}]);