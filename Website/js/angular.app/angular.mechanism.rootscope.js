angular.module('app')
.run(['$rootScope', function($rootScope) {

  $rootScope.$on('$stateChangeStart',
  function(event, toState, toParams, fromState, fromParams, options){
    rootScopeMechanism.SetTitleElement(toState['title']);
  });

  $rootScope.$on('$stateChangeSuccess',
  function(event, toState, toParams, fromState, fromParams){
    rootScopeMechanism.SetStateScript(toState['name']);
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
    $('title').html('HarvestHand | ' + value);
  },
  SetStateScript: function(scriptName) {

    jQuery.ajax({
          url: 'js/' + scriptName + '.js',
          dataType: 'script',
          cache: true
    }).done(function() {

    });
  }
  
};
