var app = angular.module('myApp', ['ngSanitize']);
app.controller('myCtrl', function($scope, $http) {

    $scope.recipientName = "Sir/Madam";

    $http.get('js/data/recipientAddresses.json').success(function(data) {
        $scope.recipientAddresses = data;
    });
    $http.get('js/data/senderAddresses.json').success(function(data) {
        $scope.senderAddresses = data;
    });
    $http.get('js/data/users.json').success(function(data) {
        $scope.users = data;
    });

    $scope.message = "Message content goes here ";
    $scope.clientReference = 111;

    $scope.text1 = "Text 1";
    $scope.text2 = "Text 2";
    $scope.text3 = "Text 3";
    $scope.senderName = "Dan Elliott Industries";

});



angular.module('ck', []).directive('ckEditor', function() {
    return {
        require: '?ngModel',
        link: function(scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);

            if (!ngModel) return;

            ck.on('pasteState', function() {
                scope.$apply(function() {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function(value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});