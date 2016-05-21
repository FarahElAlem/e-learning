(function() {
  angular.module('AdminApp',['datatables'],function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
})
  .constant('APP', {version:'1.0.0'})
  .constant('config',{url:'/learning/public/api/'});
})();
