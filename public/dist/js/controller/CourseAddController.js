(function() {
    'use strict';

    angular
        .module('AdminApp')
        .service('courseSevice', ['$q', '$http', 'config','Upload','$window', courseSevice])
        .controller('CourseAddController', ['$scope', 'courseSevice', '$location','Upload','config','$window', CourseAddController]);

    function courseSevice($q, $http, config,Upload,$windown) {
        /* jshint validthis: true */
        this.loadData = function() {
            return $http.get(config.url + "course" + $routeParams.id);
        };

        this.addData = function($scope) {
            return $http({
                method: 'GET',
                url: config.url + "course/create",
                params: {
                    name: $scope.name,
                    about: $scope.about
                }
            });
        };
    }

    function CourseAddController($scope, courseSevice, $location,Upload,config,$window)  {
        $scope.addCourse = function() {
            courseSevice.addData($scope).then(function(res) {
              if($scope.file!=undefined){
              $scope.url = config.url+'image';
              Upload.upload({
                  url: $scope.url,
                  data: {file: $scope.file,course_id:res.data.data.id}
              }).then(function (resp) {
                  console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
                  $window.location.href=config.admin+"course";
              }, function (resp) {
                  $windows.location.href=config.admin+"course";
              });
            }
            else {
              $windows.location.href=config.admin+"course";
            }
            });
        };
    }

})();
