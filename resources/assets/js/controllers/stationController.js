gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    // Limit on 'favourited loops'
    $scope.favouritedLoopsLimit = 6;

    // Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/data'
        }).success(function(data) {

            $scope.loops = data;
            $scope.checkFavouriteLoops();
            console.log(data);
        });
    };

    $scope.getLoops();


    $scope.favouritedLoops = [];

    // Make new array of favourited loops
    $scope.checkFavouriteLoops = function() {

      var index;

      //check if loop is favourited
      for (index = 0; index < $scope.loops.length; ++index) {
          if ($scope.loops[index].isFavourite === true) {
            // Add loop with isfavourite 'true' to favouritedLoops array
            $scope.favouritedLoops.push($scope.loops[index]);
          }
      }
  
    };

    $scope.filterFavouriteLoops = function(loop) {

        //check if loop is in favouritedLoops array
        var i = $.inArray(loop, $scope.favouritedLoops);
        if (i > -1) {
            $scope.favouritedLoops.splice(i, 1);
        } else {
            $scope.favouritedLoops.push(loop);
        }
    }

}]);