gloopsApp.controller('RecordController', function ($scope, $timeout) {
  	$scope.timeLimit = 60;
})	
.config(function (recorderServiceProvider) {
    recorderServiceProvider
      .forceSwf(false)
      .withMp3Conversion(true);
});