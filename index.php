<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Angular Document Generator</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/lib/angular/angular.min.js"></script>
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

                <form  id="download" action="download.php" method="post">

                    <div style="display:none;" >
                        <input type="text" name="fileContents" id="fileContents" value=''/>
                        <input type="text" name="fileName" id="fileName" value='mySitePage.pdf'/>
                        <input type="text" name="css" value='/css/pdf.css'/>

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

    /*$(function(){
        var pdfContent = $('.document-container')[0].innerHTML;
        $('#fileContents').val(pdfContent);
        $('#pdfForm').append('<input type="submit"  value="Download PDF" />');
    });*/
    $('#save').click(function() {

        event.preventDefault();

        var doc_clone = $('.document-container').clone();
        var doc = doc_clone.prop('outerHTML');

        $('#fileContents').val(doc);

        $('#createPdf').click();

    });
</script>
</body>
</html>