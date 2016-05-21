angular.module('AdminApp').controller('DeleteUserController', ActionUserController);

    function ActionUserController($http,$scope,$window,$location,config) {
      $scope.delete = function()
      {
        $http({
          method:'DELETE',
          url: config.url+'user/'+$scope.id
        }).then(function(response){
          $window.location.href = config.admin+'user';
        },function(response){
          alert('NOT OK');
        });
      };


}
