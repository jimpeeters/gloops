gloopsApp.controller('MainController', ['$scope', 'RewardService',  function($scope, RewardService) {
    
    $scope.isOverheating = RewardService.isOverheating;
    
    $scope.isOverheating = function () {
        return RewardService.isOverheating;
    };

}]);