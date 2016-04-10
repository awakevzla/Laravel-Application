var user = { email:"", password:"", token:"" };
var domain = "hhapi.com";

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
  .state('about', {
    url: '/about',
    templateUrl: 'index2.html',
    data: {
      requireLogin: false
    },
    controller: ['$scope', function($scope){
      $scope.title = 'About';
    }]
  })
  .state('starter', {
    url: '/starter',
    templateUrl: 'starter.html'
  })
}])
.controller('AuthController', function ($scope, $http) {
    if (1 == 2) { //Login($usertype, $http)

        $http({
          url: "http://" + domain + "/user/loggedin",
          method: "POST",
          data: {user.email:sha256_digest(user.password):user.token}
        }).success(function(data, status, headers, config) {
          $scope.data = data;
          // We're logged in.


        }).error(function(data, status, headers, config) {
          // No dice
          $scope.status = status;
          return false;
        });
        window.location.href = '/';


    }
});
//5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8
