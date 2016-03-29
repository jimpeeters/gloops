/*gloopsApp.controller('stationController', ['$scope','$http', function($scope, $http, ngAudio){

    $http({
        url: 'http://gloop.dev/station/data',
        dataType: "jsonp",
        jsonp: "callback"
    })
    .success(function(json) {

    	//console.log(json[0].loop_path);
    	$scope.loopPath = json[0].loop_path;
    	//console.log($scope.loopPath);
        $scope.audio = ngAudio.load($scope.loopPath);

    })
    .error(function() {
    	console.log('Lege Json');
    });

}]);*/