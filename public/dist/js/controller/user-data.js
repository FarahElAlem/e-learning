(function() {
  'use strict';

  angular
    .module('AdminApp')
    .controller('TablesDataController', ['$scope',  '$filter',  '$http','config', TablesDataController]);

  function TablesDataController($scope, $filter,$http,config) {

    function User(icon,name,lastname,id) {
      this.icon = icon;
      this.firstname = name;
      this.lastname = lastname;
      this.id = id;
    }
    var dataUser = [];
    // getuser data
    // adding demo data
    var data = [];
    $http.get(config.url+'user').then(function(response){
      dataUser = response.data;
      var cnt = dataUser.length;
      dataUser.forEach(function(v,k){
        var status = (v.is_admin)?  'admin' : 'user';
        var user = new User(status,v.name,v.email,v.id);
        data.push(user);
      });
      $scope.users = data;
    });
  }

})();
