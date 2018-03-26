<?php
session_start();
  include '../../utility/DatabaseManager.php';
  $data = new DatabaseManager();
  $conn = $data->getconnection();


  $companyId = $_POST["companyId"];
$sql ="select * from company_details where companyId='$companyId'";

$res = mysqli_query($conn,$sql);
$response = new stdClass();
if($row = mysqli_fetch_object($res))
{   
   //echo " $CompanyName = $row->companyName";
    //$userEmpId  = $row->user_emp_id;
    $response->companyName = $row->companyName;
    $response->companyWebsite = $row->companyWebsite;
    $response->companyEmail = $row->companyEmail;
    $response->companyPhone = $row->companyPhone;
    $response->companyLinkedIn = $row->companyLinkedIn;
    $response->companyAddress = $row->companyAddress;
   
}

header('Content-Type: application/json');
echo json_encode($response);



  ?>
