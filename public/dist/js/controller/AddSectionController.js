angular.module("AdminApp").controller('AddSectionController', function($scope, $http,config) {
  $scope.addSection = function()
  {
    var send = {
      method: 'GET',
      url: config.url+"section/create",
      params: {course: $scope.courseData.course_id,title:$scope.name,description:$scope.objective,order:$scope.courseData.section.length,section_id:$scope.sectionid }
    };
    $http(send).success(function(response) {
      $scope.courseData.section.push(response.success);
      $scope.name = "";
      $scope.objective = "";
    });
  };
});
