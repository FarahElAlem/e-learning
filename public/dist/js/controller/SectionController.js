angular.module("AdminApp").controller('SectionController', function($http, $scope, config) {

    $scope.contentType = function() {
        if ($scope.subsection.content != undefined) {
          $scope.haveContent = true;
          $scope.articleContent = true;
          $scope.subsection.article = $scope.subsection.content.article;
            return "Content";
        } else if ($scope.subsection.video != undefined) {
          $scope.videoContent = true;
          $scope.subsection.fileUrl = "/learning/video/"+$scope.subsection.video.path;
          $scope.haveContent = true;
            return "Video";
        } else if ($scope.subsection.section == undefined) {
            return "Please Add";
        } else if ($scope.subsection.section.length > 0) {
            return "Section";
        }
        return "Please Add";
    };

    /*
     * save order when user drag tab
     *
     */
    $scope.onDragCus = function(item) {
        item.forEach(function(v, k) {
            if (v.order != k) {
                send = {
                    method: 'PUT',
                    url: config.url + "section/" + item[k].id,
                    params: {
                        order: k
                    }
                };
                $http(send).success(function(response) {

                });
            }
        });
    };

    $scope.type = $scope.contentType();
    if ($scope.type == 'Section') {
        $scope.showChildSection();
    }
    
    $scope.isPublish = ($scope.subsection.status)? 'Unpublish':'Publish';
    $scope.publishContent = function() {
      var send = {
          method: 'PUT',
          url: config.url+"section/" + $scope.subsection.id,
          params: {
              status: Number(!$scope.subsection.status)
          }
      };
      $http(send).success(function(response) {
          $scope.subsection.status = !$scope.subsection.status;
          $scope.isPublish = ($scope.subsection.status)? 'Unpublish':'Publish';
      });
    };

    $scope.saveArticle = function(modal) {
      if($scope.subsection.content==undefined) {
        send = {
            method: 'GET',
            url: config.url+"content/create",
            params: {
                article: $scope.subsection.article,
                section_id: $scope.subsection.id
            }
        };
      }
      else {
        send = {
            method: 'PUT',
            url: config.url+"content/" + $scope.subsection.content.id,
            data: {
                article: $scope.subsection.article,
            }
        };
      }
        $http(send).success(function(response) {
          if($scope.subsection.content==undefined) $scope.subsection.content = response.success;
          else $scope.subsection.content.article = $scope.subsection.article;
          $scope.type = "Content";
          $scope.subsection.haveContent = true;
          angular.element(modal).modal('hide');
        });
    };

    $scope.openModal = function(){
      if($scope.haveContent){
        $scope.pass=true;
        $scope.action = "Edit";
        if($scope.type=="Video") {
          $scope.content = true;
        }
        else {
          $scope.content = false;
        }
      }
      else{
        $scope.pass=false;
       $scope.action = "Add";
      }
    };

    $scope.addArticle = function(){
      $scope.pass=true;
      $scope.content = false;
    };

    $scope.addVideo = function(){
      $scope.pass=true;
      $scope.content = true;

    };
});
