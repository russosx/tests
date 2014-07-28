'use strict';

var app = angular.module('UserlistApp',[]);

app.directive('editUser', function() {
    return {
        restrict: 'E',
        templateUrl: 'js/app/views/edit-user.html'
    }
});
