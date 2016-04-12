var $user = { email:"", password:"", token:"0b9da19efefb11e5b4cdfcaa14e66c2b" };
var $domain = "hhapi.com";

angular.module('app')
.controller('FarmAuthenticationController', function ($scope, $http, $state) {
  $http({
    url: "http://" + $domain + "/api/user/type/" + $user['token'],
    method: "GET"
  }).success(function(response) {

    if(ValidateUserType($state.current.name, 'farm', 'Farmer', response)){
      $scope.data = response[0];
      return;
    }

    $state.go('login');

  }).error(function(status) {
    $state.go('login');
  });
})
.controller('CustomerAuthenticationController', function ($scope, $http, $state) {
  $http({
    url: "http://" + $domain + "/api/user/type/" + $user['token'],
    method: "GET"
  }).success(function(response) {

    if(ValidateUserType($state.current.name, 'customer', 'Customer', response)){
      $scope.data = response[0];
      return;
    }

    $state.go('login');

  }).error(function(status) {
    $state.go('login');
  });
});

function ValidateUserType(stateName, requiredState, expectedType, serverResponse){

  var response = helper.getFirstElement(serverResponse);

  if (helper.isObject(response) && 'usertype' in response) {
    if((stateName.indexOf(requiredState) > -1) && response['usertype'] === expectedType){
      return true;
    }
  }
  return false;
}
