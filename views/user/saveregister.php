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

  $companyName = $_POST['companyName'];
  $companyWebsite =$_POST['companyWebsite'];
  $companyEmail=$_POST['companyEmail'];
  $companyPhone=$_POST['companyPhone'];
  $companyLinkedIn=$_POST['companyLinkedIn'];
  $companyAddress =$_POST['companyAddress'];
  //$offset = $_POST['offset'];

// check company details validation
if($companyName == "" || $companyWebsite =="" || $companyEmail == "" || $companyPhone == "" ||  $companyLinkedIn == "" || $companyAddress == "" )
{
  $_SESSION['server-msg']= "<p class='text-center' style='color:red;'>One or more fields are blank, fill all fields and even client details</p>";
  header('HTTP/1.0 404 Not Found');
  header('Content-Type: application/json; charset=UTF-8');
  die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
}
else{
  $_SESSION['server-msg'] = "<p class='text-center' style='color:red;> Enter the information </p>";
  $table_lock_sql = "lock tables company_details write";
  $res= mysqli_query($conn,$table_lock_sql);

//if this check fails echo company website already added

$company_sql =  "insert into company_details(companyName,companyWebsite,companyEmail,companyPhone,companyLinkedIn,companyAddress) 
             values('$companyName','$companyWebsite','$companyEmail','$companyPhone','$companyLinkedIn','$companyAddress')";
$res= mysqli_query($conn,$company_sql);

$company_max_id= "select max(companyId) from company_details";

$query = mysqli_query($conn,$company_max_id);
$max_id = $query->fetch_assoc()['max(companyId)'];

$table_unlock_sql="unlock tables";
$res= mysqli_query($conn,$table_unlock_sql);

}

//fetch insert id

          if(isset($_POST['clientDetails'])) {
  
     // echo "<h3> One or more fields are not filled </h3>";
         $clientDetails= $_POST['clientDetails'];
         $errors = [];
            foreach($clientDetails as $client) {
              //get all values
              $clientFirstName = $client["clientFirstName"];
              $clientLastName = $client["clientLastName"];
              $clientEmail = $client["clientEmail"];
              $clientMobile = $client["clientMobile"];
              $clientCategory = $client["clientCategory"];
              $clientDesignation = $client["clientDesignation"];
              $clientAddress = $client["clientAddress"];
              $clientCity = $client["clientCity"];
              $clientState = $client["clientState"];
              $clientCountry = $client["clientCountry"];
              $clientLinkedInid = $client["clientLinkedInid"];
              $clientFacebookid = $client["clientFacebookid"];
              $clientTwitterid = $client["clientTwitterid"];
             
//client details validation


    //check if client email already exits with same company id
    $client_sql = "insert into client_details(clientFirstName,clientLastName,clientEmail,clientMobile,clientCategory,clientDesignation,clientAddress,clientCity,clientState,clientCountry,clientLinkedInId,clientFacebookId,clientTwitterId,clientCompanyId,clientStatus,clientDateTime)
    values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCity','$clientState','$clientCountry','$clientLinkedInid','$clientFacebookid','$clientTwitterid','$max_id','New','$php_timestamp_date')";
    
    //execute query for each loop
    $client_query= mysqli_query($conn,$client_sql);

                                            }

  $_SESSION["server-msg"] = "<p class='text-center' style:'color:red;'>Client Added Successfully!</p>";
   
                            }

                          
                        

 
//var_dump($clientDetails);
//die;
  

  ?>