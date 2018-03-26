<?php
session_start();
 include '../../utility/DatabaseManager.php';
 $data = new DatabaseManager();
 $conn = $data->getconnection();
 $userId = $_SESSION["userId"];

    if(function_exists('date_default_timezone_set')) 
                {
                date_default_timezone_set("Asia/Kolkata");
                $php_timestamp_date = date("Y-m-d H:i:s");
                }
      $companyId = $_POST['companyId'];
      $mang = "select * from users where user_id = '$userId'";       
      //$mang = "select user_manager_id from users where user_id = '$userId'";
      $mang_query= mysqli_query($conn,$mang);
      if($row = mysqli_fetch_object($mang_query)){
        $userManagerId  = $row->user_manager_id;
        $userEmpId  = $row->user_emp_id;
        //echo $userManagerId;
       // die;
       
      }
                if($_FILES['file']['name']=="")
                {
                    $_SESSION["server-msg"] = "<p class='text-center'style='color:red;'> Please Upload File !</p>";
                    error();
                }        
        $csvCheck =  array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        if(!empty($_FILES['file']['name'])&& in_array($_FILES['file']['type'],$csvCheck))
        {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);

            
            while(($data = fgetcsv($csvFile)) !==FALSE){
                  //fetch country id by country name and set id if exsits else set 0
                $clientCountry = 0;
                $countryName = $data[9];
                $country_sql="select * from countries where country_name='$countryName'";    
                $res = mysqli_query($conn, $country_sql);
                $row = mysqli_fetch_object($res);
                    
                $clientFirstName = $data[0];
                $clientLastName = $data[1];
                $clientEmail = $data[2];
                $clientMobile = $data[3];
                $clientCategory = $data[4];
                $clientDesignation = $data[5];
                $clientAddress = $data[6];
                $clientCity = $data[7];
                $clientState = $data[8];
                
                $clientLinkedInId = $data[10];
                $clientFacebookId = $data[11];
                $clientTwitterId = $data[12];
                $clientCompanyId = $companyId;
                $userManagerId =  $userManagerId;
                //$status = $data[15];  
              
          $sql_csv = "insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCity,clientState,clientCountry,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime,user_manager_id,bde_user_id)values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCity','$clientState','$clientCountry','$clientLinkedInId','$clientFacebookId','$clientTwitterId','$clientCompanyId','New','$php_timestamp_date','$userManagerId','$userEmpId')"; 
          $db = mysqli_query($conn,$sql_csv);

            }
        }     
         //  $prevSql = "select clientId from client_details where clientEmail ='$clientEmail'";  

                 // $prevRes = mysqli_query($conn,$prevSql);
                 // $prevResult = mysqli_num_rows($prevRes);
              //  if($prevResult==true){
                   //  var_dump($prevRes);
                    //  die;
                   // $d1="update client_details set clientFirstName ='$clientFirstName', clientLastName ='$clientLastName',clientEmail ='$clientEmail', clientMobile ='$clientMobile',clientCategory ='$clientCategory',clientDesignation ='$clientDesignation',clientAddress ='$clientAddress',clientCity ='$clientCity',clientState ='$clientState',clientCountry ='$clientCountry',clientLinkedInId ='$clientLinkedInId',clientFacebookId ='$clientFacebookId',clientTwitterId ='$clientTwitterId',clientCompanyId ='$clientCompanyId',clientStatus ='New',clientDateTime='$php_timestamp_date',user_manager_id='$userManagerId',bde_user_id='$userEmpId' where clientEmail ='$clientEmail' ";
                    // $d2 = mysqli_query($conn,$d1);

                  //}else{
                  //   $d3="insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCity,clientState,clientCountry,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime,user_manager_id,bde_user_id)values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCity','$clientState','$clientCountry','$clientLinkedInId','$clientFacebookId','$clientTwitterId','$clientCompanyId','New','$php_timestamp_date','$userManagerId','$userEmpId')";
                  //   $d4 = mysqli_query($conn,$d3);

                 // }
        
             // $_SESSION["server-msg"] ="<p class='text-center' style='color:green;'> File Uploaded Successffuly!</p>";
             // error();               

        //}else{
           // $_SESSION["server-msg"] ="<p class='text-center'style='color:red;'> Please Upload CSV file Only!</p>";
          //  error();
      //  }
    
       // function error(){
           // fclose($csvFile);
           // header("Location:csv.php"); 
           // exit(0);
       
       
 ?>