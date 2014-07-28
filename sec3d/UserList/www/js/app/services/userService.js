/**
 * Created by russ on 28/07/14.
 */

var userService = angular.module('userService', ['ngResource']);

userService.factory('User', ['$resource',
    function($resource){
        return $resource('users/:userid', {}, {
            query: {method:'GET', params:{userId:'users'}, isArray:true}
        });
    }
]);
