var app = angular.module('myApp', ['ngSanitize']);
app.controller('myCtrl', function($scope) {
    $scope.recipientAddresses = [
        {id: 'Recipient Home', content: 'Mr Recipient<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'},
        {id: 'Recipient Office', content: 'Mr Recipient 2<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'},
        {id: 'Recipient Reception', content: 'Mr Recipient 3<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'}
    ];
    $scope.senderAddresses = [
        {id: 'Sender Office', content: 'Mr Sender<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'},
        {id: 'Sender Home', content: 'Mr Sender 2<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'},
        {id: 'Sender Reception', content: 'Mr Sender 3<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA'}
    ];
    $scope.message = "Message content goes here ";
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