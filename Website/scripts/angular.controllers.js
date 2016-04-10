function TestCtrl($scope, authService){
    if (1 == 2) { //Login($usertype, $http)

      //$scope.LoggedIn = authenticationService.LoggedIn;

      if (authService.LoggedIn == 7) {
        window.location.href = '/';
      }

    }
}
