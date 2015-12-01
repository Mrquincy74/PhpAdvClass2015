// use_strict allows for uniformaty when coding in angular 
'use strict';

// declare a module
// used to start angular 
var appServices = angular.module('appServices', []);
 
appServices.factory('corpsProvider', ['$http', 'config', function($http, config) {

//declares endpoints
    var url = config.endpoints.corps;
//declares model
    var model = config.models.corps;
    
    return {
        "getAllCorporations": function () {
            return $http.get(url);// built in promise to get allCorporations
        },
        "getCorporation": function (id) {
            var _url = url + '/' + id;
            console.log(_url);
            return $http.get(_url);
        },
        "postCorporation": function (id, corp, incorp_dt, email, owner, phone, location) {
            model.corp = corp;
            model.incorp_dt = incorp_dt;
            model.email = email;       
            model.owner = owner;
            model.phone = phone;
            model.location = location;
            return $http.post(url, model);
        },
        "deleteCorporation" : function (id) {
            var _url = url + id;
            return $http.delete(_url);
        },
        "updateCorporation" : function (id, corp, incorp_dt, email, owner, phone, location) {  
            var _url = url + '/' + id;
             model.corp = corp;
            model.incorp_dt = incorp_dt;
            model.email = email;       
            model.owner = owner;
            model.phone = phone;
            model.location = location;
            return $http.put(_url, model);
        }
    };
}]);

