angular.module('AdminApp').controller('DeleteUserController', ActionUserController);

    function ActionUserController($http,$scope,$window,$location,config) {
      $scope.delete = function()
      {
        $http({
          method:'DELETE',
          url: config.url+'user/'+$scope.id
        }).then(function(response){
            $location.path('/users/all');
        },function(response){
          alert('NOT OK');
        });
      };


}
