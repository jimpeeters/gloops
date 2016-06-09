gloopsApp.controller('DeleteAccountController', ['$scope', function($scope) {

    // Boolean to check if delete button is enabled
    $scope.enableDelete = false;

    // Check if the input is the same as the users email
    $scope.checkAccountEmail = function(input,name) {

        if (input == name) {
            $scope.enableDelete = true;
        }
        else {
            $scope.enableDelete = false;
        }
    };
}]);