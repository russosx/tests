app.controller("mainController", function($scope, $http){

    $scope.users = [];

    $scope.init = function() {
        $http.get('/api/list')
            .success(function(data) {
                $scope.users = data;
            })
            .error(function(error){
                console.log(error);
            });
    };

});

