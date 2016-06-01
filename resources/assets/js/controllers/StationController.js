gloopsApp.controller('StationController', ['$scope','$http', function($scope, $http){

    // Enable deleting
    $scope.enableDeleting = false;
    $scope.enableEditing = false;

    // Limit on 'your loops'
    $scope.loopLimit = 9;

    $scope.successMessage = "";

    $scope.getInputValues = function() {
        // set value of inputfield
        $scope.name = document.getElementById('loopName').value;
    }


    // Get all user his loops from database
    $scope.getUserLoops = function() {

        $http({
              method  : 'GET',
              url     : '/station/getUserLoops'
        }).success(function(data) {
            $scope.loops = data;
        });
    };

    // Set inputfield variables
    $scope.nameIsValid = false;
    $scope.categoryIsValid = false;
    $scope.fileIsValid = false;

    // Check if it can be uploaded
    $scope.uploadEnabled = false;

    $scope.checkUploadEnabled = function() {
        if($scope.nameIsValid == true && $scope.categoryIsValid == true && $scope.fileIsValid == true) {
            $scope.uploadEnabled = true;
        }
        else
        {
            $scope.uploadEnabled = false;
        }
    }

    // Check form validation
    $scope.checkName = function(name) {
        if (name != null && name.length >= 6 && name.length <= 50 && name.match(/^[a-zA-Z1-9 ]+$/)) {
            $scope.nameIsValid = true;
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.nameIsValid = false;
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkCategory = function() {
        if (document.getElementsByClassName("selected-value-chosen")[0].innerHTML != 'Choose a category') {
            $scope.categoryIsValid = true;
            $scope.checkUploadEnabled();
        }
        else {
            $scope.categoryIsValid = false;
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkFile = function() {
        $scope.fileIsValid = true;
        $scope.checkUploadEnabled();
    }

}]);