var appname = "GarbageCan";
var api = "http://hhapi.com/api";

angular.module('app')
.run(['$rootScope', function($rootScope) {

  $rootScope.appname = appname;
  $rootScope.api = api;

  $rootScope.$on('$stateChangeStart',
  function(event, toState, toParams, fromState, fromParams, options){
    rootScopeMechanism.SetTitleElement(toState['title']);
    rootScopeMechanism.SetStyleSheets(toState['stylesheets']);
    rootScopeMechanism.SetStateScript(toState['scripts']);
  });

  $rootScope.$on('$stateChangeSuccess',
  function(event, toState, toParams, fromState, fromParams){

  });

  // $rootScope.$on('$viewContentLoading',
  // function(event, viewConfig){
  //
  // });
  //
  // $rootScope.$on('$viewContentLoaded',
  // function(event){
  //
  // });

}]);

var rootScopeMechanism = {

  SetTitleElement: function(value) {
    if(value !== null && value !== undefined)
    {
      $('title').html(appname + ' | ' + value);
    }
    else
    {
      $('title').html(appname);
    }
  },
  SetStyleSheets: function(stylesheets) {

    $('#styles').empty();

    if(stylesheets !== null && stylesheets !== undefined)
    {
      stylesheets.forEach(function(entry) {
        $('#styles').append('<link rel="stylesheet" href="' + entry + '">');
      });
    }
  },
  SetStateScript: function(scripts) {

    $('#scripts').empty();

    if(scripts !== null && scripts !== undefined)
    {
      scripts.forEach(function(entry) {
        $('#scripts').append('<script src="' + entry + '"></script>');
      });
    }
  }

};
