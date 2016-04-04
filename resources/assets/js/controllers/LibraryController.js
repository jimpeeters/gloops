gloopsApp.controller('LibraryController', ['$scope', '$http', function($scope, $http) {

    //Sidebar toggle
    $scope.sidebarUp = false;

    //Get user 
    $scope.getUser = function() {

        $http({
              method  : 'GET',
              url     : '/getuser'
        }).success(function(data) {

            $scope.currentUser = data;

            //if user object is empty (not logged in)
            if(Object.keys($scope.currentUser).length > 0)
            {
                $scope.loggedIn = true;
            }
            else
            {
                $scope.loggedIn = false;
            }

        });
    };

    //Get all loops from database
    $scope.getLoops = function() {

        $http({
              method  : 'GET',
              url     : '/library/data'
        }).success(function(data) {

            $scope.loops = data;
        });
    };

    $scope.getLoops();
    $scope.getUser();

}]);