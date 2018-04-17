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

  
  $companyName = $_POST['companyName'];
  $companyWebsite =$_POST['companyWebsite'];
  $companyEmail=$_POST['companyEmail'];
  $companyPhone=$_POST['companyPhone'];
  $companyLinkedIn=$_POST['companyLinkedIn'];
  $companyAddress =$_POST['companyAddress'];
  

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
  $table_lock_sql = "lock tables client_companies write";
  $res= mysqli_query($conn,$table_lock_sql);

//if this check fails echo company website already added

$company_sql =  "insert into client_companies(client_company_name,client_company_website,client_company_address,client_company_phone,client_company_email,client_company_linkedin) 
             values('$companyName','$companyWebsite','$companyAddress','$companyPhone','$companyEmail','$companyLinkedIn')";
$res= mysqli_query($conn,$company_sql);

$company_max_id= "select max(client_company_id) from client_companies";

$query = mysqli_query($conn,$company_max_id);
$max_id = $query->fetch_assoc()['max(client_company_id)'];

$table_unlock_sql="unlock tables";
$res= mysqli_query($conn,$table_unlock_sql);

}

$mang = "select * from users where user_id ='$userId'";

//$mang = "select user_manager_id from users where user_id = '$userId'";
$mang_query= mysqli_query($conn,$mang);

//if($row = $mang_query->fetch_assoc())
if($row = mysqli_fetch_object($mang_query)){
  $userManagerId  = $row->user_manager_id;
  $userEmpId  = $row->user_emp_id;
 
}
//fetch insert id

          if(isset($_POST['clientDetails'])) {
  
     // echo "<h3> One or more fields are not filled </h3>";
         $clientDetails= $_POST['clientDetails'];
        
         $errors = [];
         $email = array();
            foreach($clientDetails as $client) {
              //get all values
              $clientFirstName = $client["clientFirstName"];
              $clientLastName = $client["clientLastName"];
              $Email = $client["clientEmail"];
              $Email2 = $client["clientEmail2"];
              $Email3 = $client["clientEmail3"];
              array_push($email,$Email);
              if(isset($Email2)&&($Email3)){
                array_push($email,$Email2,$Email3);
                $clientEmail = implode(',',$email);
              }else{
                array_push($email,$Email2);
                $clientEmail = implode(',',$email);
              }
             // $Email2 = $client["clientEmail2"];
             // array_push($email,$Email2);
             // $Email3 = $client["clientEmail3"];
             // array_push($email,$Email3);
              //$clientEmail = implode(',',$email);
              $clientMobile = $client["clientMobile"];
              $clientCategory = $client["clientCategory"];
              $clientDesignation = $client["clientDesignation"];
              $clientAddress = $client["clientAddress"];
              $clientCountry = $client["clientCountry"];
              $clientState = $client["clientState"];
              $clientCity = $client["clientCity"];
              $clientLinkedInid = $client["clientLinkedInid"];
              $clientFacebookid = $client["clientFacebookid"];
              $clientTwitterid = $client["clientTwitterid"];
              
              
//client details validation


    //check if client email already exits with same company id
    $client_sql = "insert into client_contacts(client_contact_first_name,client_contact_last_name,client_contact_email,client_contact_mobile,client_contact_category,client_contact_designation,client_contact_address,country_id,state_id,city_id,client_contact_linkedin,client_contact_facebook,client_contact_twitter,client_company_id,client_contact_status,client_contact_added,assoc_manager_id,assoc_user_id)
    values('$clientFirstName','$clientLastName','$clientEmail','$clientMobile','$clientCategory','$clientDesignation','$clientAddress','$clientCountry','$clientState','$clientCity','$clientLinkedInid','$clientFacebookid','$clientTwitterid','$max_id','New','$php_timestamp_date','$userManagerId','$userEmpId')";
    
   
    //execute query for each loop
    $client_query= mysqli_query($conn,$client_sql);
    $email = array();
   
                                            }

  $_SESSION["server-msg"] = "<p class='text-center' style='color:green;'>Client Added Successfully!</p>";
   
                            }

                          
                        

 
//var_dump($clientDetails);
//die;
  

  ?>