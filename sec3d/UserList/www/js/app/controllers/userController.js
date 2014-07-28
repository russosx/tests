app.controller("userController", ['$scope', 'User', function($scope, User) {

    $scope.users = User.query();

}]);

//    $scope.nowEditingUser = null;
//
//    $scope.init = function() {
//        $http.get('/users')
//            .success(function(data) {
//                $scope.users = data;
//                $scope.initUserActions();
//            })
//            .error(function(error){
//                console.log(error);
//            });
//    };
//
//    $scope.initUserActions = function() {
//        angular.forEach($scope.users, function(user) {
//            user.edit = function() {
//                $scope.nowEditingUser = angular.copy(user);
//                angular.element('#idEditUserFormDiv').modal();
//            };
//            user.save = function() {
//                user = angular.copy($scope.nowEditingUser);
//                angular.element('#idEditUserFormDiv').modal('hide');
//            }
//        });
//    };

