
MyApp.controller('topper', function($scope,UserDetails,$http) {
    $scope.makeList = function() {
        
        var request = $http({
            method: "post",
            url: "ajax/topper.php",
            data: {
                
            },
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        /* Check whether the HTTP Request is Successfull or not. */
        request.success(function(data) {
              $scope.toppers=data;
        });
    }
    $scope.makeList();

    
   

});