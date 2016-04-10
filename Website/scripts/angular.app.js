var $user = { email:"", password:"", token:"0b9da19efefb11e5b4cdfcaa14e66c2b" };
var $domain = "hhapi.com";

angular
.module('app', [
  'ui.router'
])
.config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

  $urlRouterProvider.otherwise('/');

  $stateProvider
  .state('index', {
    url: '/',
    templateUrl: 'starter.html',
    controller: ['$scope', function($scope){
      $scope.title = 'Home';
    }]
  })
  // Farm routing
  .state('farm', {
    abstract: true,
    url: '/farm',
    template: "<div ui-view></div>",
    controller: 'AuthController'
  })
  .state('farm.admin', {
    url: '/admin',
    templateUrl: 'html/admin.farm.html',
    controller: ['$scope', function($scope){
      $scope.title = 'Farm';
    }]
  })
  // Misc
  .state('login', {
    url: '/login',
    templateUrl: 'html/login.html',
    controller: ['$scope', function($scope){
      $scope.title = 'Login';
    }]
  })
}])
.controller('AuthController', function ($scope, $http, $state) {
  $http({
    url: "http://" + $domain + "/api/user/type/" + $user['token'],
    method: "GET"
  }).success(function(data) {
    $scope.data = data;

    if  ((data[0] != null) && (data[0] != undefined) && ('usertype' in data[0]) ) {
      if(($state.current.name.indexOf('farm') > -1) && data[0]['usertype'] === 'Farmer'){
        return;
      }
      else if (($state.current.name.indexOf('customer') > -1) && data[0]['usertype'] === 'Customer'){
        return;
      }
    }
    window.location.href = '/#/login';

  }).error(function(status) {
    window.location.href = '/#/login';
  });
});
//5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8
