MyApp.controller('GameController', function GameController($scope, UserDetails, $http, $state) {
    $scope.template = {
        name: 'card.html'
        , url: 'partials/card.html'
    };
    $scope.Answer = function (qid, answer) {
        var request = $http({
            method: "post"
            , url: "ajax/validate.php"
            , data: {
                uid: UserDetails.id
                , qid: qid
                , answer: answer
            }
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function (data) {
            if (!data.success) {
                Materialize.toast(data.type, 1000);
                if (data.error == 101) {
                    $scope.setValues(data.user);
                    Materialize.toast(data.answer, 1000);
                }
            }
            else {
                Materialize.toast(data.answer, 1000);
                $scope.setValues(data);
            }
            $scope.makeQuestions();
        });
    }
    $scope.ClearAll = function () {
        var request = $http({
            method: "post"
            , url: "ajax/UseLife.php"
            , data: {
                uid: UserDetails.id
            }
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function (data) {
            if (!data.success) {
                Materialize.toast(data.type, 4000);
            }
            else {
                $scope.setValues(data);
                $scope.makeQuestions();
                Materialize.toast('Your questions are reset, Have fun playing', 4000);
                $state.go("dashboard.profile");
            }
        });
    }
    $scope.makeQuestions();
});
MyApp.controller('dashboardController', function GameController($scope, UserDetails, $http, $state) {
    $scope.checkOnline = function () {
        if (UserDetails.id == null) {
            $state.go("login.signin");
        }
    }
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
    $scope.makeQuestions = function () {
        var request = $http({
            method: "post"
            , url: "ajax/questions.php"
            , data: {
                uid: UserDetails.id
            }
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function (data) {
            if (!data.success) {
                if (data.error == 101) {
                    $state.go("login.signin");
                }
                if (data.error == 102) {
                    Materialize.toast(data.type, 4000);
                    $scope.Questions = null;
                }
                else {
                    Materialize.toast(data.type, 4000);
                }
            }
            else {
                $scope.Questions = data.questions;
            }
        });
    }
    $scope.helpClick1 = function () {
        $state.go("dashboard.game");
        Materialize.toast("You need to Sign In to play..", 4000);
    }
    $scope.helpClick2 = function () {
        Materialize.toast("You need to Sign In to play..", 4000);
        $state.go("dashboard.profile");
    }
    $scope.checkOnline();
});
MyApp.controller('profileController', function GameController($scope, UserDetails, $http, $state) {
    $scope.ClaimQuestions = function () {
        var request = $http({
            method: "post"
            , url: "ajax/reset.php"
            , data: {
                uid: UserDetails.id
            }
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function (data) {
            if (!data.success) {
                Materialize.toast(data.type, 4000);
            }
            else {
                $scope.setValues(data);
                Materialize.toast("Your questions have been claimed", 4000);
                $scope.makeQuestions();
                $state.go("dashboard.game");
            }
        });
    }
});