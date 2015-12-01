
 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers',
  'appServices' // corps-Services 
]);

myApp.constant('config', {
    //enpoints to where the corps addresses should be in the database 
    "endpoints": {
       "corps" : 'http://localhost:81/PhpAdvClass2015/week5/Lab5/api/v1/corps',
    },
    "models" : {
        "corps" : {
           "corp": '',
           "incorp_dt": '',  
           "email": '',
           "owner": '',
           "phone": '',
           "location": ''          
        } 
    }
            
});

// sets a template URL and a CorpsCtrl & a CorpsDetailCtrl
myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/corporations.html',
            controller: 'CorpsCtrl'
        }).
        when('/corps/:corpsId', {
            templateUrl: 'partials/corps-detail.html',
            controller: 'CorpsDetailCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);
  

