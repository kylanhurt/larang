angular.module("dataGoMain", ['ngRoute', 'ui.router', 'satellizer'])
        .factory('dataGoAPI', dataGoAPI)
        .config(function ($routeProvider, $stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {
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
            });