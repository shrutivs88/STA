<?php
session_start();
  include '../../config.php';
  include '../../utility/DatabaseManager.php';
  $data = new DatabaseManager();
  $conn = $data->getconnection();

  $companyId = $_GET['companyId'];

  ?>
  
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sales Team Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo BASEURL; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo BASEURL; ?>assets/css/styles.css" />
    <script src="<?php echo BASEURL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASEURL; ?>assets/js/bootstrap.min.js"></script>
    <style>
     button a{color:white;}
    </style>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
        <a href="companyclientlist.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span></button></a>
            <!-- BDE Access Only -->
            <?php if ($_SESSION['role'] == "BDE") : ?>
                <div id="bde-container">
                    <h2 class="text-center"> Contacts List</h2>
                    <?php

                      $contactSql = "select * from client_details where clientCompanyId='$companyId'";
                      $result = mysqli_query($conn,$contactSql);
                      //var_dump($result);
                      //die;


                      echo "<table class='table table-bordered text-center'>";
                      echo "<tr bgcolor='lightgray'>";
                      echo "<th>First Name </th>";
                      echo "<th>LastName</th>";
                      echo "<th>Email</th>";
                      echo "<th>Mobile</th>";
                      echo "<th>Category</th>";
                      echo "<th>Address</th>";
                      echo "<th>Country</th>";
                      echo "<th>State</th>";
                      echo "<th>City</th>";
                      echo "<th> LinkedIn ID</th>";
                      echo "<th> Facebook ID</th>";
                      echo "<th>Twitter ID</th>";
                      echo "</tr>";
                      while($row=mysqli_fetch_object($result))
                      {
                        echo "<tr>";
                        echo "<td>$row->clientFirstName</td>";
                        echo "<td>$row->clientLastName</td>";
                        echo "<td>$row->clientEmail</td>";
                        echo "<td>$row->clientMobile</td>";
                        echo "<td>$row->clientCategory</td>";
                        echo "<td>$row->clientAddress</td>";
                        echo "<td>$row->clientCountry</td>";
                        echo "<td>$row->clientState</td>";
                        echo "<td>$row->clientCity</td>";
                        echo "<td>$row->clientLinkedInId</td>";
                        echo "<td>$row->clientFacebookId</td>";
                        echo "<td>$row->clientTwitterId</td>";
                        echo "</tr>";
                      }
                      echo "</table>";
                      ?>
                </div>
                
            <?php endif; ?>
        </div> 
    </div>
    <?php include 'footer.php';?> 
</body>
</html>