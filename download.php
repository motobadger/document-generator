<?php
$fileContents = stripslashes($_POST['fileContents']);
$css = $_POST['css'];
$fileName = $_POST['fileName'];

//==============================================================
//==============================================================
//==============================================================
include("mpdf/mpdf.php");
//settup
$mpdf=new mPDF('c'); 
$mpdf->SetDisplayMode('fullpage');
// LOAD a stylesheet
$stylesheet = file_get_contents($css);
$mpdf->WriteHTML($stylesheet,1);	
// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($fileContents);
$mpdf->Output($fileName,'D');
//I: send the file inline to the browser. The plug-in is used if available. The name given by filename is used when one selects the "Save as" option on the link generating the PDF.
//D: send to the browser and force a file download with the name given by filename.
//F: save to a local file with the name given by filename (may include a path).
//S: return the document as a string. filename is ignored.
exit;
//==============================================================
//==============================================================
//==============================================================
?>