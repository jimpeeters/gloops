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