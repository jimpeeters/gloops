gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

    // Enable deleting
    $scope.enableDeleting = false;

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    $scope.successMessage = "";

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

        $loopId = loop.id
        var data = {};
        $data = {
            loopId : $loopId
        }
        $http({
              method  : 'POST',
              url     : 'loop/delete',
              headers : {'Content-Type': 'application/json'},
              dataType: 'json',
              data    : $data
        });

        /*.then(function successCallback(response) {

                // Send successmessage
                $scope.successMessage = "You have successfully removed";
                
            
            }, function errorCallback(response) {

                // Send error message

                // Include loop back in array
                $scope.loops.push(loop);
            
            });*/

        

        // Remove loop from loops array
        var i = $.inArray(loop, $scope.loops);
        $scope.loops.splice(i, 1);
    }
    
    
    // Earn station overhit reward
    $scope.loopsPlaying = 0;
    
    $scope.checkReward = function() {
        console.log('test');
    }
}]);