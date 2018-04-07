<?php
session_start();
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$companyId=$_POST['companyId'];
$companyName=$_POST['companyName'];
$companyWebsite=$_POST['companyWebsite'];
$companyEmail=$_POST['companyEmail'];
$companyPhone=$_POST['companyPhone'];
$companyLinkedIn=$_POST['companyLinkedIn'];
$companyAddress=$_POST['companyAddress'];

$sql ="update company_details set companyName='$companyName', companyWebsite='$companyWebsite', companyEmail='$companyEmail', companyPhone='$companyPhone', companyLinkedIn='$companyLinkedIn',companyAddress='$companyAddress' where companyId='$companyId'";
mysqli_query($conn, $sql);
exit();



?>


