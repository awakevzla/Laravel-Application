angular.module('app', [
  'ui.router'
])
.config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider) {

  $urlRouterProvider.otherwise('/');

  $stateProvider
  .state('index', {
    url: '/',
    templateUrl: 'html/login.html',
    stylesheets: [
      "css/form.css"
    ],
  })
  .state('login', {
    url: '/login',
    templateUrl: 'html/login.html',
    stylesheets: [
      "css/form.css"
    ],
  })
  .state('register', {
    url: '/register',
    templateUrl: 'html/register.html',
    stylesheets: [
      "css/form.css"
    ],
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
    title: 'Dashboard',
    url: '/dashboard',
    heading: 'Dashboard',
    subheading: 'Tweak it up!',
    templateUrl: 'html/farm.admin.dashboard.html',
    stylesheets: [
      "css/AdminLTE.min.css",
      "css/AdminLTE/_all-skins.min.css",
      "plugins/iCheck/flat/blue.css",
      "plugins/morris/morris.css",
      "plugins/jvectormap/jquery-jvectormap-1.2.2.css",
      "plugins/datepicker/datepicker3.css",
      "plugins/daterangepicker/daterangepicker-bs3.css",
      "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
    ],
    scripts: [
      "https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js",
      "plugins/morris/morris.min.js",
      "plugins/sparkline/jquery.sparkline.min.js",
      "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
      "plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
      "plugins/knob/jquery.knob.js",
      "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js",
      "plugins/daterangepicker/daterangepicker.js",
      "plugins/datepicker/bootstrap-datepicker.js",
      "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
      "plugins/slimScroll/jquery.slimscroll.min.js",
      "plugins/fastclick/fastclick.min.js",
      "js/adminlte/adminlte.min.js",
      "js/adminlte/dashboard.js",
    ]
  })
}]);

//5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8
