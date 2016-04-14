app.controller('coursesController', function($scope, $http) {
    $http.get("http://localhost/learning/public/api/course").success(function(response) {
        $scope.courses = response;
    });
});
