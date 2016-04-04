gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

  console.log('station controller');

    // Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/data'
        }).success(function(data) {

            $scope.loops = data;
            console.log(data);
        });
    };

    $scope.getLoops();

    // Load more button
    $scope.loopLimit = 9;

}]);