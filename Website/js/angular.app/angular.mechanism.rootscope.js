angular.module('app')
.run(['$rootScope', function($rootScope) {

  $rootScope.appname = $appname;
  $rootScope.api = $api;

  $rootScope.$on('$stateChangeStart', function(event, toState){

    rootScopeMechanism.SetTitleElement(toState['title']);
    rootScopeMechanism.SetStyleSheets(toState['stylesheets']);

    setTimeout(
      function()
      {
        rootScopeMechanism.SetStateScript(toState['scripts']);
      }, 1);

  });

  $rootScope.$on('unauthorized', function (event, message) {
    setTimeout(
      function()
      {
        helper.showInfo(message);
      }, 25);
    });

}]);

var rootScopeMechanism = {

  SetTitleElement: function(value) {
    if(value !== undefined && value !== null)
    {
      $('title').html($appname + ' | ' + value);
    }
    else
    {
      $('title').html($appname);
    }
  },
  SetStyleSheets: function(stylesheets) {

    $('#styles').empty();

    if(stylesheets !== undefined && stylesheets !== null)
    {
      stylesheets.forEach(function(entry) {
        $('#styles').append('<link rel="stylesheet" href="' + entry + '" type="text/css">');
      });
    }
  },
  SetStateScript: function(scripts) {

    $('#scripts').empty();

    if(scripts !== undefined && scripts !== null)
    {
      scripts.forEach(function(entry) {
        $('#scripts').append('<script src="' + entry + '"></script>');
      });
    }
  }

};
