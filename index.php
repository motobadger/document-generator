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
                    <label for="recipientAddress">Recipient Address</label><br/>
                    <textarea id="recipientAddress" type="text" ng-model="recipientAddress">
                    </textarea>

                    <label for="message">Message</label><br/>
                    <textarea id="message" type="text" ng-model="message">
                    </textarea>

                </form>
            </div>
        </div>
    </div>
</div>
<footer>
</footer>
<script src="//cdn.ckeditor.com/4.6.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'message' );
</script>
</body>
</html>