'use strict';
// one controller for one view good practice
var appControllers = angular.module('appControllers', []);

//minification 
appControllers.controller('MainController', function($scope, $route, $routeParams, $location) {
     $scope.$route = $route;
     $scope.$location = $location;
     $scope.$routeParams = $routeParams;
 })
 .controller('BookController', function($scope, $routeParams) {
     $scope.name = "BookController";
     $scope.params = $routeParams;
 })
 .controller('ChapterController', function($scope, $routeParams) {
     $scope.name = "ChapterController";
     $scope.params = $routeParams;
 })
 .controller('HomeController', function($scope, $routeParams) {
     $scope.name = "HomeController";
     $scope.params = $routeParams;
 });




