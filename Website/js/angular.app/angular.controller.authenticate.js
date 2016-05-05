var $user = { email:"", password:"", token:"0b9da19efefb11e5b4cdfcaa14e66c2b" };
var $domain = "hhapi.com";

angular.module('app')
.controller('FarmAuthenticationController', function ($scope, $http, $state)
{
  if($user.type !== 'Farmer')
  {
    $state.go('login');
  }

  $scope.user = $user;
})
.controller('CustomerAuthenticationController', function ($scope, $http, $state)
{
  if($user.type !== 'Customer')
  {
    alert("No dice!");
  }

  $scope.user = $user;
});
