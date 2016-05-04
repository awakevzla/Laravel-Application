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

    if(stylesheets !== null && stylesheets !== undefined)
    {
      stylesheets.forEach(function(entry) {
        $('head').append('<link rel="stylesheet" href="' + entry + '">');
      });
    }
  },
  SetStateScript: function(scripts) {

    if(scripts !== null && scripts !== undefined)
    {
      scripts.forEach(function(entry) {
        $('html').append('<script src="' + entry + '"></script>');
      });
    }

    // jQuery.ajax({
    //       url: 'js/' + scriptName + '.js',
    //       dataType: 'script',
    //       cache: true
    // }).done(function() {
    //
    // });
  }

};
