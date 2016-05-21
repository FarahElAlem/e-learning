angular.module('AdminApp').controller('CourseEditController', CourseEditController);
    function CourseEditController($http,$scope,$window,$location,config,Upload) {
      $scope.save = function()
      {
        $http({
          method:'PUT',
          url: config.url+'course/'+$scope.id,
          data: {
            name:$scope.name,
            description: $scope.description
          }}).then(function(response){
            if($scope.file!=undefined)
            {
            $scope.url = config.url+'image';
            Upload.upload({
                url: $scope.url,
                data: {file: $scope.file,course_id:$routeParams.courseId}
            }).then(function (resp) {
                console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
                $location.path('/courses/gallery');
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            });
          } else {
            $location.path('/courses/gallery');
          }
        });
      };
      $scope.init = function(id){
        $scope.id = id;
        load();
      };
      function load()
      {
        $http.get(config.url+'course/'+$scope.id).then(function(response){
          $scope.course = response.data;
          $scope.about = $scope.course.about;
          $scope.name = $scope.course.name;
          $scope.description = $scope.course.description;
          console.log($scope.description);
        });
      }

}
