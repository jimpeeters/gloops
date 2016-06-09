gloopsApp.controller('EditProfileController', ['$scope', function($scope) {

    // This controller is used to do client side validation

    // Set inputfield variables
    $scope.nameIsValid = false;
    $scope.emailIsValid = false;
    $scope.fileIsValid = false;
    $scope.passwordResetIsValid = false;
    $scope.oldPasswordIsValid = false;
    $scope.oldPasswordTemp = '';
    $scope.newPasswordIsValid = false;
    $scope.newPasswordTemp = '';

    // Check if it can be uploaded
    $scope.uploadEnabled = false;

    $scope.checkUploadEnabled = function() {
        if($scope.nameIsValid == true || $scope.emailIsValid == true || $scope.fileIsValid == true || $scope.passwordResetIsValid == true) {
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

    $scope.checkOldPassword = function(oldPassword) {
        $scope.oldPasswordTemp = oldPassword;

        if (oldPassword != null && oldPassword.length >= 6 && oldPassword.length <= 100) {
            $scope.oldPasswordIsValid = true;
            $scope.checkPasswordReset();
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.oldPasswordIsValid = false;
            $scope.checkPasswordReset();
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkNewPassword = function(newPassword) {
        $scope.newPasswordTemp = newPassword;

        if (newPassword != null && newPassword.length >= 6 && newPassword.length <= 100 && $scope.newPasswordTemp != $scope.oldPasswordTemp) {
            $scope.newPasswordIsValid = true;
            $scope.checkPasswordReset();
            $scope.checkUploadEnabled();
        }
        else
        {
            $scope.newPasswordIsValid = false;
            $scope.checkPasswordReset();
            $scope.checkUploadEnabled();
        }
    }

    $scope.checkPasswordReset = function() {
        if ($scope.oldPasswordIsValid == true && $scope.newPasswordIsValid == true) {
            $scope.passwordResetIsValid = true;
        }
        else
        {
            $scope.passwordResetIsValid = false;
        }
    }

    $scope.checkFile = function() {
        $scope.fileIsValid = true;
        $scope.checkUploadEnabled();
    }

}]);