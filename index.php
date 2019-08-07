<?php
/**
 * User: peymanvalikhanli
 * Date: 8/3/19 AD
 * Time: 00:14
 *
 * https://github.com/dompdf/dompdf
 */

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

$file = file_get_contents(__DIR__.'/aset/template/main.html');

$file = str_replace("[date]",$_REQUEST["date"],$file);
$file = str_replace("[PI_Validity]",$_REQUEST["PI_Validity"],$file);
$file = str_replace("[Shipper_Exporter]",$_REQUEST["Shipper_Exporter"],$file);
$file = str_replace("[Invoice_No]",$_REQUEST["Invoice_No"],$file);
$file = str_replace("[Applicant_title]",$_REQUEST["Applicant_title"],$file);
$file = str_replace("[Applicant_text]",$_REQUEST["Applicant_text"],$file);
//TODO: implement table row
$file = str_replace("[Total_Payment]",$_REQUEST["Total_Payment"],$file);
$file = str_replace("[Amount_in_Words]",$_REQUEST["Amount_in_Words"],$file);
$file = str_replace("[Packing]",$_REQUEST["Packing"],$file);
$file = str_replace("[HarmonisedCode]",$_REQUEST["HarmonisedCode"],$file);
$file = str_replace("[Delivery_Terms]",$_REQUEST["Delivery_Terms"],$file);
$file = str_replace("[Shipment_Date]",$_REQUEST["Shipment_Date"],$file);
$file = str_replace("[Transshipment]",$_REQUEST["Transshipment"],$file);
$file = str_replace("[Final_Destination]",$_REQUEST["Final_Destination"],$file);
$file = str_replace("[Payment_Terms]",$_REQUEST["Payment_Terms"],$file);
$file = str_replace("[Bank_Name]",$_REQUEST["Bank_Name"],$file);
$file = str_replace("[SWIFT]",$_REQUEST["SWIFT"],$file);
$file = str_replace("[BRANCH]",$_REQUEST["BRANCH"],$file);
$file = str_replace("[BRANCH_CODE]",$_REQUEST["BRANCH_CODE"],$file);
$file = str_replace("[IBAN_NUMBER]",$_REQUEST["IBAN_NUMBER"],$file);
$file = str_replace("[ACCOUNT_NAME]",$_REQUEST["ACCOUNT_NAME"],$file);
$file = str_replace("[For_Elite_Industries]",$_REQUEST["For_Elite_Industries"],$file);


// instantiate and use the dompdf class
$dompdf = new Dompdf();
//load tamplate file
$dompdf->loadHtml($file);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();