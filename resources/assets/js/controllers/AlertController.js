gloopsApp.controller('AlertController', ['$scope', '$timeout', function($scope, $timeout) {

    $scope.closeAlert = function () {
        $scope.startFade = true;
        $timeout(function(){
            $scope.hidden = true;
        }, 1200);
        
    };

}]);