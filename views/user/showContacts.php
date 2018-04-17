<?php
session_start();
  include '../../config.php';
  include '../../utility/DatabaseManager.php';
  $data = new DatabaseManager();
  $conn = $data->getconnection();

  
  $companyId = $_POST['companyId'];
  
  $contactSql = "SELECT * FROM client_contacts  where  client_company_id='$companyId'";
  
  $result = mysqli_query($conn,$contactSql); 
  //print_r ($result); 
  $rows = array();
  while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
     }
     header('Content-Type: application/json');
     echo json_encode($rows);
     
?>