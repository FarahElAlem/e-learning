(function() {
  'use strict';

  angular
    .module('AdminApp')
    .service('courseService', ['$q', '$http','config', courseService])
    .controller('CourseListController', ['$scope', 'courseService','config','$http','$window', CourseListController]);
  function courseService($q, $http,config){
    /* jshint validthis: true */
    this.loadImages = function() {
      return $http.get(config.url+"course");
    };

    this.deleteImages = function(id) {
      return $http({
          method: 'DELETE',
          url: config.url+"course/" + id
      });
    };
  }

  function CourseListController($scope, courseService,config,$http,$window) {
    $scope.type = '';

    courseService.loadImages().then(function(res){

      var course = res.data;
      $scope.course = course;
      $scope.course.forEach(function(v,k){
        v.statusText = v.status==1?"unPublish":"Publish";
      });
      $scope.searchTxt = "";

      $scope.publish = function(courseItem){
        var send = {
            method: 'PUT',
            url: config.url+"course/" + courseItem.id,
            params: {
                status: Number(!courseItem.status)
            }
        };
        console.log(send);
        $http(send).success(function(response) {
          console.log(response);
          courseItem.status = !(courseItem.status);
          courseItem.statusText = courseItem.status?"unPublish":"Publish";
          console.log($scope);
        });


      };

      $scope.openUsers = function(id){
        $window.location.href = config.admin+'course/'+id+'/users';
      };

      $scope.openEditPage = function(id){
        $window.location.href = config.admin+'course/edit/'+id;
      };

      $scope.deleteCourse = function(id){
        console.log(id);
        courseService.deleteImages(id).then(function(res){
          $scope.course.splice($scope.course.indexOf($scope.courseItem),1);
        });
      };

    });

  }



})();
