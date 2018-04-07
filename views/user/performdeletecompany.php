<?php
session_start();
include '../../utility/DatabaseManager.php';
  $data = new DatabaseManager();
  $conn = $data->getconnection();


$companyId = $_POST['companyId'];

$sql ="delete from company_details where companyId='$companyId'";

$res = mysqli_query($conn,$sql);


    $_SESSION['serverMsg'] = "Company was not deleted!";
    return;

$_SESSION['serverMsg'] = "Company and it's associated contact was deleted Successfully!";
?>