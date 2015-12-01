'use strict';
// use_strict allows for uniformaty when coding in angular 

 
// declare a module
// used to start angular 
var myAppModule = angular.module('myApp', []);

// configure the module.
// in this example we will create a greeting filter
myAppModule.filter('greet', function() {
 return function(name) {
    return 'Hello, ' + name + '!';
  };
});
