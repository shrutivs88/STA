<?php
session_start();
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$clientId = $_POST['clientId'];
$clientFirstName = $_POST['clientFirstName'];
$clientLastName = $_POST['clientLastName'];
$clientEmail = $_POST['clientEmail'];
$clientMobile = $_POST['clientMobile'];
$clientCategory = $_POST['clientCategory'];
$clientDesignation = $_POST['clientDesignation'];
$clientAddress = $_POST['clientAddress'];
$clientCity = $_POST['clientCity'];
$clientState = $_POST['clientState'];
$clientCountry = $_POST['clientCountry'];
$clientLinkedInId = $_POST['clientLinkedInId'];
$clientFacebookId = $_POST['clientFacebookId'];
$clientTwitterId = $_POST['clientTwitterId'];
//$clientCompanyId = $_POST['clientCompanyId'];
//$clientDateTime = $_POST['clientDateTime'];

$sql = "update client_details set clientFirstName='$clientFirstName',clientLastName='$clientLastName',clientEmail='$clientEmail',clientMobile='$clientMobile',clientCategory='$clientCategory',clientDesignation='$clientDesignation',clientAddress='$clientAddress',clientCity='$clientCity',clientState ='$clientState',clientCountry='$clientCountry',clientLinkedInId='$clientLinkedInId',clientFacebookId='$clientFacebookId',clientTwitterId='$clientTwitterId' where clientId='$clientId'";


$result = mysqli_query($conn,$sql);
 

if($result==true)
{
    $_SESSION['server-msg'] = "<p class='text-center' style='color:green; font-size:18px;'> Client Details edited successfuly</p>";

}else{

    $_SESSION['server-msg'] = "<p class='text-center' style='color:red; font-size:18px;'> No Edit is done</p>";
}

?>
