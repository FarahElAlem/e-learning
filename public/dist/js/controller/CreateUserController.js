angular.module('AdminApp').controller('CreateUserController', CreateUserController);

function CreateUserController($http, $scope, $window, $location, config) {
    $scope.save = function() {
        if ($scope.password != $scope.repassword) {
            $scope.msg = {repassword:'true' };

            return;
        }
        $http({
            method: 'POST',
            url: config.url + 'user',
            data: {
                name: $scope.name,
                email: $scope.email,
                password: $scope.password,
                password_confirmation: $scope.repassword
            }
        }).then(function(response) {
            $window.location.href = config.admin+'user';
        }, function(response) {
          $scope.msg = response.data;
        });
    };


}
