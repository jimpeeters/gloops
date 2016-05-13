gloopsApp.controller('SpecificuserController', ['$scope', '$http', function($scope, $http) {

    // Set limit for loopcount
    $scope.loopLimit = 9;

    // Get most popular loops from specific user
    $scope.getSpecificUserLoops = function(id) {

        $http({
              method  : 'GET',
              url     : '/user/loops/' + id
        }).success(function(data) {
            $scope.popularLoops = data;
        });
    };

}]);