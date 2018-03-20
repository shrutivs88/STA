<?php
session_start();
 include '../../utility/DatabaseManager.php';
 $data = new DatabaseManager();
 $conn = $data->getconnection();


    if(function_exists('date_default_timezone_set')) 
                {
                date_default_timezone_set("Asia/Kolkata");
                $php_timestamp_date = date("Y-m-d H:i:s");
  
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
                  
                $clientFirstName = $data[0];
                $clientLastName = $data[1];
                $clientEmail = $data[2];
                $clientMobile = $data[3];
                $clientCategory = $data[4];
                $clientDesignation = $data[5];
                $clientAddress = $data[6];
                $clientCity = $data[7];
                $clientState = $data[8];
                $clientCountry = $data[9];
                $clientLinkedInId = $data[10];
                $clientFacebookId = $data[11];
                $clientTwitterId = $data[12];
                $clientCompanyId = $data[13];
                //$status = $data[15];  
              
          $sql_csv = "insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCity,clientState,clientCountry,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime)values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCity','$clientState','$clientCountry','$clientLinkedInId','$clientFacebookId','$clientTwitterId','$clientCompanyId','Active','$php_timestamp_date')"; 
          $db = mysqli_query($conn,$sql_csv);
           $prevSql = "select clientId from client_details where clientEmail ='$clientEmail'";  

                  $prevRes = mysqli_query($conn,$prevSql);
                  $prevResult = mysqli_num_rows($prevRes);
                if($prevResult==true){
                   //  var_dump($prevRes);
                    //  die;
                    $d1="update client_details set clientFirstName ='$clientFirstName', clientLastName ='$clientLastName',clientEmail ='$clientEmail', clientMobile ='$clientMobile',clientCategory ='$clientCategory',clientDesignation ='$clientDesignation',clientAddress ='$clientAddress',clientCity ='$clientCity',clientState ='$clientState',clientCountry ='$clientCountry',clientLinkedInId ='$clientLinkedInId',clientFacebookId ='$clientFacebookId',clientTwitterId ='$clientTwitterId',clientCompanyId ='$clientCompanyId',clientStatus ='Active',clientDateTime='$php_timestamp_date' where clientEmail ='$clientEmail' ";
                     $d2 = mysqli_query($conn,$d1);

                  }else{
                     $d3="insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCity,clientState,clientCountry,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime)values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCity','$clientState','$clientCountry','$clientLinkedInId','$clientFacebookId','$clientTwitterId','$clientCompanyId','Active','$php_timestamp_date')";
                     $d4 = mysqli_query($conn,$d3);

                  }
              }
              $_SESSION["server-msg"] ="<p class='text-center' style='color:green;'> File Uploaded Successffuly!</p>";
              error();               

        }else{
            $_SESSION["server-msg"] ="<p class='text-center'style='color:red;'> Please Upload CSV file Only!</p>";
            error();
        }
    
        function error(){
           // fclose($csvFile);
            header("Location:csv.php"); 
            exit(0);
        }
        
 ?>