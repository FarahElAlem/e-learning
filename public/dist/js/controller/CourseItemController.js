angular.module("AdminApp").controller('CourseItemController', function($http, $scope,config) {

    $scope.loadPath = function() {
        function ok(response) {
            $scope.path = '<li><a href="/learning/public/admin/course/section/' + $scope.findsection_id + '">' + response.title + "</a> </li> " + $scope.path;
            $scope.findsection_id = response.section_id;
            if ($scope.findsection_id != undefined) $scope.loadPath();
            else  $http.get(config.url+"course/" + $scope.courseData.course_id).then(function(res) {
                            $scope.path = '<li><a href="/learning/public/admin/course/' + $scope.courseData.course_id + '">' + res.data.name + "</a> </li> " + $scope.path;
                            console.log($scope.path);
                        });
        }
        var url = config.url+"section/" + $scope.findsection_id;
        return $http.get(url).success(ok);
    };
    $scope.senddata = function(course) {
      $scope.sectionAction = course;
    };

    $scope.init = function(id,type){
      $scope.id = id;
      $scope.pagetype = type;
      if ($scope.pagetype==1) {
    $scope.url = config.url+"section/all/" + $scope.id;
} else {
    $scope.url = config.url+"section/" + $scope.id;
}
      $scope.loadData();
    };
    $scope.loadData = function() {
      $http.get($scope.url).success(function(response) {
          $scope.courseData = response;
          $scope.section_id = $scope.courseData.section_id;
          $scope.findsection_id = $scope.section_id;
          $scope.coursename = $scope.courseData.title;
          $scope.path = $scope.courseData.title;
          $scope.loadPath();
      });
    };
});
