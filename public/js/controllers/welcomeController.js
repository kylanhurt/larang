angular.module('dataGoMain')
    .controller('WelcomeController', ['$scope', '$http', 'dataGoAPI', '$rootScope',function($scope, $http, dataGoAPI, $rootScope){
        console.log('in HomeCtrl');
        $scope.registerUser = registerUser;
        $scope.registrationError = {"username" : false};

        function registerUser() {
            var data = {email: $scope.user.email, password: $scope.user.password}
            dataGoAPI.registerNewUser(data)
                .success(function (response) {
                    if(response.code === 1) {

                        $rootScope.login();
                    } else if(response.code === 0) {
                        $scope.registrationError.username = response.message;
                    }
                })
                .error (function(response) {
                    console.log(response)
                })
        }       
    }]);            


