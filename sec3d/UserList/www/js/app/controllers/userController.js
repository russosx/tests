app.controller("userController", ['$scope', 'UsersStore', function($scope, UsersStore) {

    $scope.init = function() {
        $scope.users = UsersStore.query();
        $scope.currentUser = null;
        $scope.userToUpdateRef = null
        angular.element('#load-progress').hide();
        angular.element('#user-list').show();
    };

    $scope.editUser = function(user) {
        $scope.currentUser = angular.copy(user);
        $scope.userToUpdateRef = user;
        angular.element('#userFormDiv').modal();
    };

    $scope.createUser = function() {
        $scope.currentUser = {};
        $scope.userForm.$setPristine();
        angular.element('#userFormDiv').modal();
    };

    $scope.deleteUser = function(user) {
        var confirmed = confirm("Удалить пользователя " + user.name + ' ' + user.surname + '?');
        if (confirmed) {
            UsersStore.delete({userId: user.id});
            var i = $scope.users.indexOf(user);
            if (i !== -1) {
                $scope.users.splice(i, 1);
            }
        }
    };

    $scope.userDataChanged = function(user) {
        if ( ! user.dataChanged) {
            user.dataChanged = true;
        }
    };

    $scope.saveUser = function(user) {
        angular.element('#userFormDiv').modal('hide');
        if ( ! user.dataChanged) return;
        user.dataChanged = false;
        if (isNewUser(user)) {
            UsersStore.add(user);
            var new_user = angular.copy(user);
            console.log('user:', user);
            $scope.users.push(new_user);
        } else {
            UsersStore.save(user);
            copyUserData(user, $scope.userToUpdateRef);
        }
    };

    var copyUserData = function(from, to) {
        var fromProps = Object.getOwnPropertyNames(from),
            toProps = Object.getOwnPropertyNames(to),
            sharedProps = arrayIntersect(toProps, fromProps);
        angular.forEach(sharedProps, function(prop) {
           to[prop] = from[prop];
        });
    }

    var isNewUser = function(user) {
        return typeof user.id === "undefined";
    };

    var arrayIntersect = function(arr1, arr2) {
        return arr1.filter(function(v) {
           return arr2.indexOf(v) !== -1;
        });
    }
}]);