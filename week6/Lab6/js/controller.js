
'use strict';
var appControllers = angular.module('appControllers', []);
// controller for getting corporations 
appControllers.controller('CorpsCtrl', ['$scope', '$log', 'corpsProvider',
    function ($scope, $log, corpsProvider) {
        //array of scope.corps
        $scope.corps = [];

        function getCorporations() {
            corpsProvider.getAllCorporations().success(function (response) {
                $scope.corps = response.data;
            }).error(function (response, status) {
                $log.log(response);
            });
        }
        ;

        getCorporations();

    }])

.controller('CorpsDetailCtrl', ['$scope', '$log', '$routeParams', 'corpsProvider',
    function($scope, $log, $routeParams, corpsProvider) {
    
       var corpsID = $routeParams.corpsId;
        
       function getCorporation() {    
            corpsProvider.getCorporations(corpsID).success(function(response) {
                $scope.corps = response.data;
                // formats birthdate
               // $scope.address.birthday = new Date($scope.address.birthday);                
                console.log($scope.corps);
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getCorporation();
        
        
    
}]);
    
       


