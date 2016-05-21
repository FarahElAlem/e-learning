angular.module("AdminApp").controller('SectionController', function($http, $scope, config) {

    $scope.contentType = function() {
        if ($scope.section.content != undefined) {
          $scope.haveContent = true;
          $scope.articleContent = true;
          $scope.section.article = $scope.section.content.article;
            return "Content";
        } else if ($scope.section.video != undefined) {
          $scope.videoContent = true;
          $scope.section.fileUrl = "../../../learning/video/"+$scope.section.video.path;
          $scope.haveContent = true;
            return "Video";
        } else if ($scope.section.section == undefined) {
            return "Section";
        } else if ($scope.section.section.length > 0) {

            return "Section";
        }
        return "Please Add";
    };

    /*
     * save order when user drag tab
     *
     */
    $scope.onDragCus = function(item) {
        $scope.coursesData.section.forEach(function(v, k) {
            if (v.order != k) {
                send = {
                    method: 'PUT',
                    url: config.url + "section/" + $scope.coursesData.section[k].id,
                    params: {
                        order: k
                    }
                };
                $http(send).success(function(response) {

                });
            }
        });
    };

    $scope.clickToOpenTitleEdit = function() {
        ngDialog.open({
            template: 'tpl/demo/courses/titleEdit.html',
            className: 'ngdialog-theme-default'
        });
    };
    $scope.isSection = false;
    $scope.showChildSection = function() {
        $scope.isSection = true;
    };

    $scope.openResourcePanel = function() {
        if (!$scope.resourcePanel) {
            $scope.resourcePanel = true;
            $scope.collapse = true;
            $scope.contentPanel = false;
            $scope.descriptionEditor = false;
            $scope.descriptionPanel=true;
        } else {
            $scope.resourcePanel = false;
            $scope.collapse = false;
            $scope.contentPanel = true;
        }
    };
    $scope.type = $scope.contentType();
    if ($scope.type == 'add') $scope.showChildSection();
    if ($scope.type == 'assistant') {
        $scope.showChildSection();
        $scope.haveResource = true;
    }
    $scope.showTitle = true;
    $scope.contentPanel = true;
    $scope.descriptionEditor = false;
    $scope.isPublish = ($scope.section.status)? 'Unpublish':'Publish';
    if($scope.section.description.length > 0) $scope.descriptionPanel = true;
    if($scope.type== 'receipt') {

    }
    if($scope.type== 'videocam') {
      $scope.videoContent = true;
    }
    $scope.clickToOpenVideoEdit = function() {
      $scope.videoContent = true;
      $scope.showTitle = false;
      $scope.resourcePanel = false;
      $scope.contentPanel = false;
    };

    $scope.clickToOpenArticleEdit = function() {
      $scope.articleAdd = true;
      $scope.showTitle = false;
      $scope.resourcePanel = false;
      $scope.contentPanel = false;
      $scope.articleTemp = $scope.section.article;
    };

    $scope.clickToOpenDescriptionEdit = function() {
      $scope.descriptionPanel = false;
      $scope.descriptionEditor = true;
      $scope.descriptionTemp = $scope.section.description;
      $scope.descriptionEdit = $scope.section.description;
    };

    $scope.cancelEditDescription = function() {
      $scope.descriptionEditor=false;
      $scope.descriptionPanel = true;
      $scope.section.description=$scope.descriptionTemp;
    };

    $scope.publishContent = function() {
      var send = {
          method: 'PUT',
          url: config.url+"section/" + $scope.section.id,
          params: {
              status: Number(!$scope.section.status)
          }
      };
      $http(send).success(function(response) {
        console.log(response);
          $scope.section.status = !$scope.section.status;
          $scope.isPublish = ($scope.section.status)? 'Unpublish':'Publish';
      });
    };

    $scope.openEditTitle = function() {
        $scope.resourcePanel = false;
        $scope.titleEditor = true;
        $scope.temp = $scope.section.title;
        $scope.collapse = true;
        $scope.showTitle = false;
        $scope.contentPanel = false;
        $scope.descriptionEditor = false;
        $scope.descriptionPanel=true;
    };

    $scope.cancelEditTitle = function() {
        $scope.collapse = false;
        $scope.titleEditor = false;
        $scope.showTitle = true;
        $scope.section.title = $scope.temp;
        $scope.contentPanel = true;
    };

    $scope.saveTitle = function() {
      var send = {
          method: 'PUT',
          url: config.url+"section/" + $scope.section.id,
          params: {
              title: $scope.section.title,
              description: $scope.section.description + ""
          }
      };
      $http(send).success(function(response) {
        $scope.collapse = false;
        $scope.titleEditor = false;
        $scope.showTitle = true;
      });
    };

    $scope.saveArticle = function() {
      console.log($scope.section);
      if($scope.section.content==undefined) {
        send = {
            method: 'GET',
            url: config.url+"content/create",
            params: {
                article: $scope.section.article,
                section_id: $scope.section.id
            }
        };
      }
      else {
        send = {
            method: 'PUT',
            url: config.url+"content/" + $scope.section.content.id,
            data: {
                article: $scope.section.article,
            }
        };
      }
        $http(send).success(function(response) {
          if($scope.section.content==undefined) $scope.section.content = response.success;
          else $scope.section.content.article = $scope.section.article;
          $scope.articleAdd=false;
          $scope.contentPanel=true;
          $scope.showTitle=true;
          $scope.type = "receipt";
        });
    };


    $scope.saveDescription = function() {
        var send = {
            method: 'PUT',
            url: config.url+"section/" + $scope.section.id,
            params: {
                title: $scope.section.title,
                description: $scope.descriptionEdit
            }
        };
        console.log(send);
        console.log($scope.descriptionEdit);
        $http(send).success(function(response) {
          console.log(response);
          $scope.descriptionEditor=false;
          $scope.descriptionPanel = true;
          $scope.section.description = $scope.descriptionEdit;
        });
    };

    $scope.deleteSection = function() {
        var send = {
            method: 'DELETE',
            url: config.url+"section/" + $scope.section.id
        };
        $http(send).success(function(response) {
            $scope.coursesData.section.splice($scope.coursesData.section.indexOf($scope.section), 1);
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
