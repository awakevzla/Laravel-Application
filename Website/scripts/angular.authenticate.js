
app.service('loginModal', function ($modal, $rootScope) {

  function assignCurrentUser (user) {
    $rootScope.currentUser = user;
    return user;
  }

  return function() {
    var instance = $modal.open({
      templateUrl: 'login.html',
      controller: 'LoginModalCtrl',
      controllerAs: 'LoginModalCtrl'
    })

    return instance.result.then(assignCurrentUser);
  };

});

app.controller('LoginModalCtrl', function ($scope, UsersApi) {

  this.cancel = $scope.$dismiss;

  this.submit = function ($email, $password) {
    UsersApi.login($email, $password).then(function ($user) {
      $scope.$close($user);
    });
  };

});

app.run(function ($rootScope, $state, $loginModal) {

  $rootScope.$on('$stateChangeStart', function ($event, $toState, $toParams) {
    var $requireLogin = $toState.data.requireLogin;

    if ($requireLogin && typeof $rootScope.currentUser === 'undefined') {
      $event.preventDefault();

      loginModal()
        .then(function () {
          return $state.go($toState.name, $toParams);
        })
        .catch(function () {
          return $state.go('welcome');
        });
    }
  });

});

app.config(function ($httpProvider) {

  $httpProvider.interceptors.push(function ($timeout, $q, $injector) {
    var $loginModal, $http, $state;

    // this trick must be done so that we don't receive
    // `Uncaught Error: [$injector:cdep] Circular dependency found`
    $timeout(function () {
      $loginModal = $injector.get('loginModal');
      $http = $injector.get('$http');
      $state = $injector.get('$state');
    });

    return {
      responseError: function ($rejection) {
        if ($rejection.status !== 401) {
          return $rejection;
        }

        var $deferred = $q.defer();

        loginModal()
          .then(function () {
            $deferred.resolve( $http($rejection.config) );
          })
          .catch(function () {
            $state.go('index');
            $deferred.reject($rejection);
          });

        return $deferred.promise;
      }
    };
  });

});
