angular.module('AdminApp').controller('EditUserController', UserController);

    function UserController($http,$scope,$window,$location,config) {
      $scope.save = function()
      {
        $http({
          method:'PUT',
          url: config.url+'user/'+$scope.id,
          data: {
            name:$scope.name,
            email: $scope.email,
            password: $scope.password,
            isAdmin: $scope.isAdmin
          }}).then(function(response){
            console.log(response);
            $window.location.href = config.admin+'user';

        },function(error){
          console.log(error);
        });
      };
      $scope.init = function(id){
        $scope.id = id;
        $scope.load();
      };
      $scope.load = function()
      {
        $http.get(config.url+'user/'+$scope.id).then(function(response){
          $scope.dataUser = response.data;
          $scope.name = $scope.dataUser.name;
          $scope.email = $scope.dataUser.email;
          $scope.isAdmin = $scope.dataUser.is_admin;
        });
      };

    }
