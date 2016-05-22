angular.module("AdminApp").controller('ActionSectionController', function($scope, $http,config,$window) {

  $scope.deleteSection = function() {
      var send = {
          method: 'DELETE',
          url: config.url+"section/" + $scope.sectionAction.id
      };
      $http(send).success(function(response) {
        if($scope.course.section_id==undefined)  $scope.courseData.section.splice($scope.courseData.section.indexOf($scope.course), 1);
        else
        {
            $window.location.reload();
        }
          angular.element('#myModal').modal('hide');
      });
  };

  $scope.$watch('sectionAction', function() {
    if($scope.sectionAction) {
      $scope.course = $scope.sectionAction;
          $scope.title = $scope.course.title;
         $scope.description = $scope.course.description;
         angular.element('#myModal').modal('hide');
    }
 });


  $scope.saveTitle = function() {
    // console.log($scope.$parent);
    var send = {
        method: 'PUT',
        url: config.url+"section/" + $scope.sectionAction.id,
        params: {
            title: $scope.title,
            description: $scope.description + ""
        }
    };
    $http(send).success(function(response) {
        $scope.course.title = $scope.title;
        $scope.course.description = $scope.description;
        angular.element('#myModal').modal('hide');
    });
  };


});
