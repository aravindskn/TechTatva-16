MyApp.controller('NavCtrl', function ($scope, $timeout, $state,$mdSidenav, $log,UserDetails) {
    $scope.sidebar = {  //
        name: 'sidenav.html'
        , url: 'partials/sidenav.html'
    };
    $scope.Logout = function(){
        UserDetails=null;
        $state.go("login.signin");
    }
    $scope.User=UserDetails; //
    $scope.items = [ //items in the menu and assets
        {
            title: 'Game'
            , link: 'game'
            , icon: 'videogame_asset',
            colour: 'blue'
        },
        {
            title: 'Profile'
            , link: 'profile'
            , icon: 'account_circle',
            colour: 'green'
        }
        ,  {
            title: 'Top Players'
            , link: 'top_players'
            , icon: 'grade',
            colour: 'violet'
        }, {
            title: 'Electrific'
            , link: 'electrific'
            , icon: 'home',
            colour: 'yellow'
        }
        , {
            title: 'Help'
            , link: 'help'
            , icon: 'help',
            colour: 'purple'
        }
    ];
    $scope.toggleLeft = buildDelayedToggler('left');
   
    function debounce(func, wait, context) {
        var timer;
        return function debounced() {
            var context = $scope
                , args = Array.prototype.slice.call(arguments);
            $timeout.cancel(timer);
            timer = $timeout(function () {
                timer = undefined;
                func.apply(context, args);
            }, wait || 10);
        };
    }
   
    function buildDelayedToggler(navID) {
        return debounce(function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav(navID).toggle().then(function () {});
        }, 200);
    }

    function buildToggler(navID) {
        return function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav(navID).toggle().then(function () {});
        }
    }
});
