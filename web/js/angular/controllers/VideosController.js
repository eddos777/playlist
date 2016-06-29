'use strict';

main.controller('VideosController', function ($scope, $routeParams, appService) {
    $scope.video = {};

    $scope.save = function () {
        if ($scope.video) {
            appService.postData('/create', $scope.video).then(function (data) {
                    alert("ok");
                },
                function (error) {
                    alert("Can't download this video");
                });
        }
    };
});
