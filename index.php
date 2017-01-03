<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="js/lib/angular/angular.min.js"></script>
    <script src="js/lib/angular/angular-route.min.js"></script>
    <script src="js/lib/angular/angular-animate.min.js"></script>
    <script src="js/lib/angular/sanitize.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="wrapper">
        <div class="document-area">
            <div class="document-container">
                <div class="document-content">
                    <div class="left-header" ng-bind-html="recipientAddress">
                    </div>
                    <div class="right-header" ng-bind-html="senderAddress">
                    </div>
                    <div class="document-body" ng-bind-html="message">
                    </div>
                </div>
            </div>
        </div>
        <div class="content-area">
            <div class="content-container">
                <form>
                    <div class="form-group">
                        <label for="recipientAddress">Recipient Address</label><br/>
                        <select ng-model="recipientAddress" ng-init="recipientAddress = recipientAddresses[0].content" ng-options="recipientAddress.content as recipientAddress.id for recipientAddress in recipientAddresses">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="senderAddress">Recipient Address</label><br/>
                        <select ng-model="senderAddress" ng-init="senderAddress = senderAddresses[0].content" ng-options="senderAddress.content as senderAddress.id for senderAddress in senderAddresses">>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label><br/>
                    <textarea id="message" rows="10" type="text" ng-model="message">
                    </textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
</footer>
<script src="//cdn.ckeditor.com/4.6.1/basic/ckeditor.js"></script>
<script>
    //CKEDITOR.replace('message');
</script>
</body>
</html>