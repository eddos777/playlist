'use strict';

main.controller('VideosController', function ($scope, $routeParams, appService)
{
    var video; 
    $scope.save = function () {
        if ($scope.video) {
            appService.postData('index.php/site/create', $scope.video).then(function (data)
            {
                alert("ok");
                    $scope.alert = { showAlert:true, msg: angular.fromJson(data).mesg, alertClass: 'success' };
                },
                function (error) {
                    alert("Can't download this video");
                });
        } 
    };
});
