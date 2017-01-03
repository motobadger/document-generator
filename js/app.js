var app = angular.module('myApp', ['ngSanitize']);
app.controller('myCtrl', function($scope) {
    $scope.recipientAddress = "Mr Recipient<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA";
    $scope.senderAddress = "Mr Recipient<br/>Some Lane<br/>Test Town<br/>Imaginary County<br/>AA1 1AA";
    $scope.message = "Message content goes here ";
});