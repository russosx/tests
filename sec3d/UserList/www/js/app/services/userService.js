/**
 * Created by russ on 28/07/14.
 */

var userService = angular.module('userService', ['ngResource']);

userService.factory('UsersStore', ['$resource',
    function($resource){
        return $resource('users/:userId', {}, {
            query:      { method: 'GET', isArray:true },
            get:        { method: 'GET', params:{userId:'@id'} },
            add:        { method: 'POST' },
            save:       { method: 'PUT' },
            delete:     { method: 'DELETE', params:{userId:'@id'} }
        });
    }
]);
