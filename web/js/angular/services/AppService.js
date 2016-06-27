'use strict';


main.factory('appService', function ($http, $q) {
        return {
            postData: function (route, data) {
                var defer = $q.defer();
                /*TODO delete console.log*/
                console.log(data);
                $http.post(main.baseUrl + route, data,
                    {
                        'headers': {
                            'Content-Type': 'application/json; charset=UTF-8'
                        }
                    }).success(function (data) {
                    defer.resolve(data);
                }).error(function () {
                        defer.reject('Cannot post data to the server :(');
                    }
                );
                return defer.promise;
            },
        };
    }
);