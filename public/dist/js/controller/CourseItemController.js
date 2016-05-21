angular.module("AdminApp").controller('CourseItemController', function($http, $scope,config) {
  //$scope.showAddSection = false;

    // $scope.loadPath = function() {
    //     function ok(response) {
    //         $scope.path = '<a href="#courses/edit-curriculum/edit/' + $scope.section_id + '">' + response.title + "</a> / " + $scope.path;
    //         $scope.section_id = response.section_id;
    //         if ($scope.section_id != undefined) $scope.loadPath();
    //         else  $http.get(config.url+"course/" + $scope.coursesData.course_id).then(function(res) {
    //                         $scope.path = '<a href="#courses/edit-curriculum/' + $scope.coursesData.course_id + '">' + res.data.name + "</a> / " + $scope.path;
    //                         console.log(res.data.name);
    //                     });
    //     }
    //     var url = config.url+"section/" + $scope.section_id;
    //     if($scope.section_id==null&&$routeParams.id!=undefined)
    //     $http.get(config.url+"course/" + $scope.coursesData.course_id).then(function(res) {
    //         $scope.path = '<a href="#courses/edit-curriculum/' + $scope.coursesData.course_id + '">' + res.data.name + "</a> / " + $scope.path;
    //         console.log(res.data.name);
    //     });
    //     return $http.get(url).success(ok);
    // };

    // $scope.toggleAddSection = function() {
    //     $scope.showAddSection = !$scope.showAddSection;
    // };

    $scope.init = function(id){
      $scope.id = id;
      $scope.url = config.url+"section/all/" + $scope.id;
      $scope.loadData();
    };

    $scope.loadData = function() {
      $http.get($scope.url).success(function(response) {
          $scope.courseData = response;
          $scope.section_id = $scope.courseData.section_id;
          $scope.coursename = $scope.courseData.title;
          console.log($scope.courseData);
          //$scope.loadPath();
      });
    };
});
