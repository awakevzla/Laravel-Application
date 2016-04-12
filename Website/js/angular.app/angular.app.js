angular.module('app', [
  'ui.router'
])
.config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

  $urlRouterProvider.otherwise('/');

  $stateProvider
  .state('index', {
    url: '/',
    templateUrl: 'starter.html'
  })
  // Farm routing
  .state('farm', {
    abstract: true,
    url: '/farm',
    template: "<ui-view/>",
    controller: 'FarmAuthenticationController'
  })
  .state('farm.admin', {
    url: '/admin',
    templateUrl: 'html/farm.admin.html',
    controller: function($scope, $state) {
      $scope.heading = $state.current.heading;
      $scope.subheading = $state.current.subheading;
    }
  })
  .state('farm.admin.dashboard', {
    url: '/dashboard',
    heading: 'Dashboard',
    subheading: 'Tweak it up!',
    templateUrl: 'html/farm.admin.dashboard.html'
  })
  // Misc
  .state('login', {
    url: '/login',
    templateUrl: 'html/login.html'
  })
}]);

//5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8
