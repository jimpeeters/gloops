gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

    // Enable deleting
    $scope.enableDeleting = false;

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    // Get all user his loops from database
    $scope.getUserLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/getUserLoops'
        }).success(function(data) {
            $scope.loops = data;
        });
    };

    $scope.getUserLoops();

    // Delete a loop
    $scope.deleteLoop = function(loop) {

        $loopId = loop.id;

        var data = {};
        $data = {
            loopId : $loopId
        };

        $http({
              method  : 'POST',
              url     : 'loop/delete',
              headers : {'Content-Type': 'application/json'},
              dataType: 'json',
              data    : $data
        });

        //Remove loop from loops array
        var i = $.inArray(loop, $scope.loops);
        $scope.loops.splice(i, 1);
    };

}]);