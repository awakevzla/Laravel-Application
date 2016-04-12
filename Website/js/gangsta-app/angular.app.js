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
    title: 'Welcome',
    templateUrl: 'starter.html'
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
    templateUrl: 'html/farm.admin.html'
  })
  .state('farm.admin.dashboard', {
    url: '/dashboard',
    title: 'Dashboard',
    subheading: 'Tweak it up!',
    templateUrl: 'html/farm.admin.dashboard.html'
  })
  // Misc
  .state('login', {
    url: '/login',
    title: 'Login',
    templateUrl: 'html/login.html'
  })
}])
// Controllers
.controller('AuthController', function ($scope, $http, $state) {
  $http({
    url: "http://" + $domain + "/api/user/type/" + $user['token'],
    method: "GET"
  }).success(function(data) {

    if  ((data[0] != null) && (data[0] != undefined) && (isObject(data[0])) && ('usertype' in data[0]) ) {
      if((($state.current.name.indexOf('farm') > -1) && data[0]['usertype'] === 'Farmer')
      || (($state.current.name.indexOf('customer') > -1) && data[0]['usertype'] === 'Customer')){
        $scope.data = data[0];
        return;
      }
    }

    window.location.href = '/#/login';

  }).error(function(status) {
    window.location.href = '/#/login';
  });
})
// Listeners
.run(['$rootScope', function($rootScope) {
  $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams, options){
    $rootScope.heading = toState['title'];
    $rootScope.subheading = toState['subheading']
  })
}])
.run(['$rootScope', function($rootScope) {
  $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){
    setDOM(toState);
  })
}]);

// Helpers
function isObject(val) {
  return val instanceof Object;
}

function setDOM(toState){
  $('title').html('HarvestHand | ' + toState['title']);
  $.getScript('js/' + toState['name'] + '.js');
}
//5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8

//Functions();
//_init();
//CustomPlugs();
//CustomBox();
//CustomList();
