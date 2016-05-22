angular.module("AdminApp").controller('AddSectionController', function($scope, $http,config,$window) {
  $scope.addSection = function()
  {
    console.log($scope.sectionid);
    var send = {
      method: 'GET',
      url: config.url+"section/create",
      params: {course: $scope.courseData.course_id,title:$scope.name,description:$scope.objective,order:$scope.courseData.section.length,section_id:$scope.sectionid }
    };
    $http(send).success(function(response) {
      $window.location.reload();
    });
  };
});
