<?php
    $content = '
<p>Thank you for attending our event {{text1}}.</p>
<p>We appreciate your interest in {{text2}}, and will register your details for future reference.</p>
<p>Please see us again at {{text3}}.</p>
';
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Angular Document Generator</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/lib/angular/angular.min.js"></script>
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
                    <div class="document-body">
                        <p>Client Ref: {{recipient.id}}</p>
                        <p>Dear {{recipient.name}},</p>
                        <?php
                            echo($content);
                        ?>
                        <p>Yours sincerely,<br/>{{senderName}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-area">
            <div class="content-container">
                <form>
                    <div class="form-group">
                        <label for="userFilter">Recipient</label>
                        <select id="userFilter" size="1" ng-model="recipient" ng-options="y.name for (x, y) in users | filter:query">
                        </select>
                        Filter Users<input id="userFilter" placeholder="filter users" autofocus ng-model="query"/>
                    </div>
                    <div class="form-group">
                        <label for="recipientAddress">Recipient Address</label>
                        <select id="recipientAddress" ng-model="recipientAddress" ng-options="recipientAddress.content as recipientAddress.id for recipientAddress in recipientAddresses">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="senderAddress">Sender Address</label>
                        <select id="senderAddress" ng-model="senderAddress" ng-init="senderAddress = senderAddresses[0].content" ng-options="senderAddress.content as senderAddress.id for senderAddress in senderAddresses">>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text1">Text 1</label>
                        <textarea id="text1" rows="3" type="text" ng-model="text1">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="text2">Text 2</label>
                        <textarea id="text2" rows="3" type="text" ng-model="text2">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="text3">Text 3</label>
                        <textarea id="text3" rows="3" type="text" ng-model="text3">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="senderName">Sender Name</label>
                        <input type="text" id="senderName" ng-model="senderName"/>
                    </div>

                </form>

                <form  id="download" action="download.php" method="post">

                    <div style="display:none;" >
                        <input type="text" name="fileContents" id="fileContents" value=''/>
                        <input type="text" name="fileName" id="fileName" value='mySitePage.pdf'/>
                        <input type="text" name="css" value='css/pdf.css'/>

                    </div>
                    <input type="submit" id="createPdf" value="Download PDF" hidden="hidden"/>
                </form>
                <button id="save">Download</button>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.6.1/basic/ckeditor.js"></script>
<script>
    //CKEDITOR.replace('message');
    //TODO - Add directive to take care of populating message from CKEditor
    $('#save').click(function() {
        event.preventDefault();
        var doc_clone = $('.document-container').clone();
        var doc = doc_clone.prop('innerHTML');
        $('#fileContents').val(doc);
        $('#createPdf').click();
    });
</script>
</body>
</html>