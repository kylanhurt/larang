//currently empLog has no dependencies, it may also define the module that bootstraps the HTML page (ng-app)
angular.module("dataGoMain", ['ngRoute', 'ui.router', 'satellizer'])
        .controller('mainCtrl', MainCtrl)
        .factory('dataGoAPI', dataGoAPI)
        .constant('apiUrl', 'http://localhost/api/')
        .config(function ($routeProvider, $stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {
            function redirectWhenLoggedOut($q, $injector) {
                return {
                    responseError: function (rejection) {
                        var $state = $injector.get('$state');
                        var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];
                        angular.forEach(rejectionReasons, function (value, key) {
                            if (rejection.data.error === value) {
                                localStorage.removeItem('user');
                                $rootScope.authenticated = false;
                            }
                        });
                        return $q.reject(rejection);
                    }
                }
            }
            // Setup for the $httpInterceptor
            $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);
            $authProvider.loginUrl = '/api/authenticate';
            $stateProvider
                .state('home', {
                    url: '',
                    views:{
                        'main-cont': {
                            templateUrl: '/views/home.html'
                        }
                    },
                    controller: "WelcomeController as wc"

                })
                .state('submit-new-entity', {
                    url: 'entity/new',
                    views: {
                        'main-cont': {
                            templateUrl: '/views/entity.new.html'
                        }
                    },
                    controller: 'entitySubmissionController'
                });
        })
        .run(function ($rootScope, $state) {
            console.log(localStorage);
            if(localStorage.getItem('satellizer_token')) {
                $rootScope.authenticated = true;
            }
            $rootScope.$on('$stateChangeStart', function (event, toState) {
                var user = JSON.parse(localStorage.getItem('user'));
                if (user) {
                    $rootScope.authenticated = true;
                    $rootScope.currentUser = user;
                }
            })
        })

function MainCtrl($scope, $rootScope, $state, $auth,$http) {
    $scope.user = {
        email: '',
        password: ''
    }
    
    var vm = this;
    vm.loginError = false;
    vm.loginErrorText;  
    $rootScope.login = login;
    $rootScope.logout = logout;
    $scope.login = login;
    
    function login()  {
        var credentials = {
            email: $scope.user.email,
            password: $scope.user.password
        }

        $auth.login(credentials).then(function() {
            return $http.get('/api/authenticate/user')
        .then(function(response) {
            var user = JSON.stringify(response.data.user);
            localStorage.setItem('user', user);
            $rootScope.authenticated = true;
            $rootScope.currentUser = response.data.user;
            });
        }, 
            // Handle errors
            function(error) {
            vm.loginError = true;
            vm.loginErrorText = error.data.error;
        });
    }


    function logout() {
        //$auth.logout() itself will remove satellizer_token from local storage.
        $auth.logout().then(function() {
            localStorage.removeItem('user');
            $rootScope.authenticated = false;
            $rootScope.currentUser = null;

        });
    }
}

function dataGoAPI($http, apiUrl) {
    return {
        registerNewUser: function (data) {
            var url = apiUrl + 'user/register';
            var postData = data;
            console.log('url', url);
            var req = {
                method: 'POST',
                url: url,
                data: postData
            }
            return $http(req);
        },
        apiReq: function (endpoint, method, data) {
            var url = apiUrl + endpoint;
            var data = data;
            var req = {
                method: method,
                url: url,
                data: data
            }
            return $http(req);
        }
    }
}