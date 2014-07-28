'use strict';

var app = angular.module('UsersApp',['ngResource', 'userService']);

app.directive('editUser', function() {
    return {
        restrict: 'E',
        templateUrl: 'js/app/views/edit-user.html'
    }
});
