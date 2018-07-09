MyApp.controller('signUpController', function ($scope, $mdMedia, $mdDialog, UserDetails, $http, $state) {
    $scope.errorMsg = "";
    $scope.branches = ["Aeronautical", "Automobile", "BioMedical", "Chemical"
        , "E&E", "CSE", "Mechanical", "Mechatroincs", "Civil", "IP", "IT", "Bio-Tech", "ECE", "CCE", "ICE","Print and Media","Others"
    ];
    $scope.setValues = function (data) {
        UserDetails.name = data.name;
        UserDetails.score = data.score;
        UserDetails.outOf = data.outOf;
        UserDetails.rank = data.rank;
        UserDetails.branch = data.branch;
        UserDetails.totalLeft = data.totalLeft;
        UserDetails.gender = data.gender;
        UserDetails.avator = data.avator;
        UserDetails.code = data.code;
        UserDetails.id = data.id;
        UserDetails.lives = data.lives;
        return UserDetails;
    }
    $scope.customFullscreen = $mdMedia('xs') || $mdMedia('sm');
    $scope.signUp = function (ev) {
        var useFullScreen = ($mdMedia('sm') || $mdMedia('xs')) && $scope.customFullscreen;
        var errors = 0;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if ($scope.Name == null) {
            $scope.errorMsg = "Your name can only have 5-20 letters";
        }
        else {
            if (!emailReg.test($scope.Email)) {
                $scope.errorMsg = "Your email doesn't look valid";
                Materialize.toast('Your email looks invalid', 4000);
            }
            else {
                if ($scope.Password == null || $scope.Password.length < 6) {
                    $scope.errorMsg = "Your password should be atleast 6 letters";
                    Materialize.toast('Your password should be atleast 6 letters', 4000);
                }
                else {
                    if ($scope.Password != $scope.ConfirmPassword) {
                        $scope.errorMsg = "Your magic word is not the same in both places";
                        Materialize.toast('Your magic word is not the same in both places', 4000);
                    }
                    else {
                        if ($scope.Branch == null) {
                            $scope.errorMsg = "You must know your branch don't you?";
                            Materialize.toast("You must know your branch don't you?", 4000);
                        }
                        else {
                            var isnum = /^\d+$/.test($scope.regno);
                            if ($scope.regno == "" || $scope.regno == null || !isnum) {
                                errors = 4;
                                $scope.message = "Your Registration number doesn't seem right!!";
                                Materialize.toast("Your Registration number doesn't seem right!!", 4000);
                            }
                            else {
                                isnum = /^\d+$/.test($scope.Code)
                                if($scope.Code != null && !isnum ){
                                    $scope.message = "Your invite code doesn't seem right!!";
                                Materialize.toast("Your invite code doesn't seem right!!", 4000);
                                    errors=5;
                                }
                                if (errors == 0) {
                                    $mdDialog.show({
                                        controller: DialogController
                                        , templateUrl: 'partials/avator.html'
                                        , parent: angular.element(document.body)
                                        , targetEvent: ev
                                        , clickOutsideToClose: false
                                        , fullscreen: useFullScreen
                                    }).then(function (answer) {
                                        $scope.gender = answer.substring(0, 1);
                                        $scope.avator = answer.substring(1);
                                        /* to signUp php */
                                        var request = $http({
                                            method: "post"
                                            , url: "ajax/signup.php"
                                            , data: {
                                                email: $scope.Email
                                                , pass: $scope.Password
                                                , branch: $scope.Branch
                                                , name: $scope.Name
                                                , avator: $scope.avator
                                                , gender: $scope.gender
                                                , code: $scope.Code
                                                , regno: $scope.regno
                                            }
                                            , headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                            }
                                        });
                                        /* Check whether the HTTP Request is Successfull or not. */
                                        request.success(function (data) {
                                            if (!data.success) {
                                                $scope.errorMsg = data.type;
                                                if (data.error == 101) {
                                                    Materialize.toast('Your account already exists!!', 4000);
                                                    $state.go("login.signin");
                                                }
                                            }
                                            else {
                                                $scope.setValues(data);
                                                $scope.errorMsg = data.type;
                                                $state.go("dashboard.help");
                                            }
                                        });
                                    }, function () {
                                        $scope.status = 'You cancelled the dialog.';
                                    });
                                    $scope.$watch(function () {
                                        return $mdMedia('xs') || $mdMedia('sm');
                                    }, function (wantsFullScreen) {
                                        $scope.customFullscreen = (wantsFullScreen === true);
                                    });
                                };
                            }
                        }
                    }
                }
            }
        }
    }
});

function DialogController($scope, $mdDialog) {
    $scope.boys = 31;
    $scope.girls = 35;
    $scope.getNumber = function (num) {
        return new Array(num);
    }
    $scope.clicked = function (which, who) {
        $mdDialog.hide(who + which);
    }
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.answer = function (answer) {
        $mdDialog.hide(answer);
    };
}
MyApp.controller('forgotController', function ($scope, $state) {
    $scope.data = {}
    $scope.submitForm = function (email, hithesh) {
        var request = $http({
            method: "post"
            , url: "ajax/forgot.php"
            , data: {
                email: email
            , }
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function (data) {
            if (!data.success) {
                $scope.message = data.type;
            }
            else {
                $state.go("login.signin");
            }
        });
    };
});
MyApp.value('UserDetails', {
    name: ''
    , score: 0
    , outOf: 0
    , rank: 0
    , branch: ''
    , lives: 0
    , totalLeft: 0
    , gender: ''
    , avator: 0
    , code: ''
    , id: ''
});
MyApp.controller('signInController', function ($scope, $http, $state, UserDetails, $rootScope) {
    $scope.data = {};
    $scope.setValues = function (data) {
        UserDetails.name = data.name;
        UserDetails.score = data.score;
        UserDetails.outOf = data.outOf;
        UserDetails.rank = data.rank;
        UserDetails.branch = data.branch;
        UserDetails.totalLeft = data.totalLeft;
        UserDetails.gender = data.gender;
        UserDetails.avator = data.avator;
        UserDetails.code = data.code;
        UserDetails.id = data.id;
        UserDetails.lives = data.lives;
        return UserDetails;
    }
    $scope.check_credentials = function () {
        $scope.message = "";
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var error = 0;
        if ($scope.email == "" || $scope.email == null) {
            error = 1;
            $scope.message = "Your email woundn't be nothing!";
        }
        if (!emailReg.test($scope.email)) {
            error = 2;
            $scope.message = "Your email does'nt look valid!";
        }
        /*---- Email is validated ------ */
        if ($scope.password == "" || $scope.password == null) {
            error = 3;
            $scope.message = "Your password woundn't be nothing!";
        }
        if (error == 0) {
            var request = $http({
                method: "post"
                , url: "ajax/login.php"
                , data: {
                    email: $scope.email
                    , pass: $scope.password
                }
                , headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
            /* Check whether the HTTP Request is Successfull or not. */
            request.success(function (data) {
                if (!data.success) {
                    $scope.message = data.type;
                }
                else {
                    $scope.message = "Login Successfull";
                    $scope.setValues(data);
                    $state.go("dashboard.game");
                }
            });
        }
    }
});