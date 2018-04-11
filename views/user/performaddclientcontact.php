<?php
session_start();
  include '../../utility/DatabaseManager.php';
  $data = new DatabaseManager();
  $conn = $data->getconnection();

  $userId = $_SESSION["userId"];
  $companyId = $_GET['companyId'];

  if(function_exists('date_default_timezone_set')) 
  {
  date_default_timezone_set("Asia/Kolkata");
  $php_timestamp_date = date("Y-m-d H:i:s");

  }


  $clientFirstName = $_POST['clientFirstName'];  
  $clientLastName = $_POST['clientLastName'];
  $clientEmail = $_POST['clientEmail'];
  $clientMobile = $_POST["clientMobile"];
  $clientCategory =$_POST["clientCategory"];
  $clientDesignation = $_POST["clientDesignation"];
  $clientAddress = $_POST["clientAddress"];
  $clientCountry = $_POST["clientCountry"];
  $clientState = $_POST["clientState"];
  $clientCity =$_POST["clientCity"];
  $clientLinkedInId = $_POST["clientLinkedInId"];
  $clientFacebookId = $_POST["clientFacebookId"];
  $clientTwitterId = $_POST["clientTwitterId"];
  $clientCompanyId = $_POST["companyId"];
  $clientCompanyName = $_POST["companyName"];


  //run query and get manager id and employeej is
  $mang = "select * from users where user_id ='$userId'";
  $mang_query= mysqli_query($conn,$mang);
  if($row = mysqli_fetch_object($mang_query)){
    $userManagerId  = $row->user_manager_id;
    $userEmpId  = $row->user_emp_id;
  }
  // set it to below query
  $clientCompanysql = "insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCountry,clientState,clientCity,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime,user_manager_id,bde_user_id)
  values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCountry','$clientState','$clientCity','$clientLinkedInId','$clientFacebookId','$clientTwitterId','$clientCompanyId','New','$php_timestamp_date','$userManagerId','$userEmpId')";

  $companyClientquery= mysqli_query($conn,$clientCompanysql);

 //header("Location:AddCompanyClientDetalis.php?companyId=".$clientCompanyId."&companyName=".clientCompanyName);
   
  $_SESSION["server-msg"] = "<p class='text-center' style='color:green;'>Client Added Successfully!</p>";
  //header("Location:clientlist.php");
  header("Location:showContactsDetails.php?companyId=$companyId");

  ?>