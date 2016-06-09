gloopsApp.controller('RegisterController', ['$scope', function($scope) {

    // This controller is used to do client side validation

    // Set inputfield variables
    $scope.nameIsValid = false;
    $scope.emailIsValid = false;
    $scope.passwordIsValid = false;
    $scope.passwordTemp = '';
    $scope.passwordConfirmTemp = '';
    $scope.passwordConfirmationIsValid = false;
    $scope.fileIsValid = false;

    // set values of inputfields
    $scope.name = document.getElementById('registerName').value;
    $scope.email = document.getElementById('registerEmail').value;

    // Check if it can be uploaded
    $scope.uploadEnabled = false;

    $scope.checkUploadEnabled = function() {
        if($scope.nameIsValid == true && $scope.emailIsValid == true && $scope.passwordIsValid == true && $scope.passwordConfirmationIsValid == true) {
            $scope.uploadEnabled = true;
        }
        else
        {
            $scope.uploadEnabled = false;
        }
    }

    $scope.checkName = function(name) {
        if (name != null && name.length >= 2 && name.length <= 50 && name.match(/^[a-zA-Z1-9 ]+$/)) {
            $scope.nameIsValid = true;
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.nameIsValid = false;
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkEmail = function(email) {
        if (email != null && email.length >= 2 && email.length <= 50) {
            $scope.emailIsValid = true;
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.emailIsValid = false;
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkPassword = function(password) {
        if (password != null && password.length >= 6 && password.length <= 100) {
            $scope.passwordIsValid = true;
            $scope.passwordTemp = password;
            $scope.checkPasswordConfirmation($scope.passwordConfirmTemp);
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.passwordIsValid = false;
            $scope.passwordTemp = '';
            $scope.checkPasswordConfirmation($scope.passwordConfirmTemp);
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkPasswordConfirmation = function(passwordConfirmation) {
        if (passwordConfirmation == $scope.password) {
            $scope.passwordConfirmationIsValid = true;
            $scope.passwordConfirmTemp = passwordConfirmation;
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.passwordConfirmationIsValid = false;
            $scope.passwordConfirmTemp = passwordConfirmation;
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkFile = function() {
        $scope.fileIsValid = true;
        $scope.checkUploadEnabled();
    }

}]);