angular.module('AdminApp').controller('VideoUploadController',function($scope,$http,Upload,config){
  $scope.progress = false;
  $scope.percent = 0;
  $scope.upload = function (sectionid) {
        // show loading
        console.log(sectionid);
        $scope.progress = true;
        Upload.mediaDuration($scope.file).then(function(durationInSeconds){
          if($scope.$parent.type!="Video")
          {
            $scope.url = config.url+'video';
          }
          else {
            $scope.url = config.url+'video/'+$scope.$parent.section.video.id;
          }
          Upload.upload({
              url: $scope.url,
              data: {file: $scope.file,section_id:sectionid,length:durationInSeconds}
          }).then(function (resp) {
              console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
              $scope.$parent.section.video = resp.data.success;
              $scope.$parent.videoAdd=false;
              $scope.$parent.contentPanel=true;
              $scope.$parent.showTitle=true;
              $scope.$parent.haveResource = false;
              $scope.$parent.type = "Video";
              console.log(resp);
              $scope.$parent.section.fileUrl =  "/learning/video/"+resp.data.success.path;
              console.log($scope.$parent.section.fileUrl);
              $scope.progress = 0;
          }, function (resp) {
              console.log('Error status: ' + resp.status);
              $scope.progress = 0;
          }, function (evt) {
              var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
              $scope.percent = progressPercentage;
              console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
          });
        });
    };
});
