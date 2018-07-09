
MyApp.controller('Loader', function Loader($scope, UserDetails,$rootScope) {
    
    $rootScope.loader =function(style){document.getElementById("loadingbar").style.display = style;}


});

MyApp.config(function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/login/signin');
    $stateProvider.
    state('login',{
        url:'/login',
        templateUrl:'mains/login.html',
        abstract:true
    }).state('login.signup',{
        url:'/signup',
        views:{
            'form':{
                templateUrl:'partials/signup.html',
                controller:'signUpController'
            }
        }
    })
    .state('login.signin',{
        url:'/signin',
        views:{
            'form':{
                templateUrl:'partials/signin.html',
                controller:'signInController'
            }
        }
    })
    .state('login.forgot',{
        url:'/forgot',
        views:{
            'form':{
                templateUrl:'partials/forgot.html',
                controller:'forgotController'
            }
        }
    })
    .state('dashboard',{
        url: '/dashboard',
        templateUrl:'mains/dashboard.html',
        abstract:true,
        controller: 'dashboardController'
        
    })
        .state('dashboard.game', {
        url: '/game'
        , views: {
            'panel': {
                templateUrl: 'panels/game.html'
                , controller: 'GameController'
            }
        }
    }).state('dashboard.help', {
        url: '/help'
        , views: {
            'panel': {
                templateUrl: 'panels/help.html'
            }
        }
    }).state('dashboard.profile', {
        url: '/profile'
        , views: {
            'panel': {
                templateUrl: 'panels/profile.html',
                controller: 'profileController'
                
            }
        }
    }).state('dashboard.top_players', {
        url: '/top_players'
        , views: {
            'panel': {
                templateUrl: 'panels/top_players.html'
                , controller: 'topper'
            }
        }
    }).state('dashboard.electrific', {
        url: '/electrific'
        , views: {
            'panel': {
                templateUrl: 'panels/electrific.html'
            }
        }
    });
});