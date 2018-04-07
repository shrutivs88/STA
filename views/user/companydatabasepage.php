<?php
session_start();
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$limit = $_POST["limitVal"];
$offset = $_POST["offsetVal"];
$companysql = "select * from company_details LIMIT $limit OFFSET $offset";
$res = mysqli_query($conn,$companysql);
$rows = array();
while($row = mysqli_fetch_assoc($res)){
    $rows[] = $row;
   }
   header('Content-Type: application/json');
   echo json_encode($rows);
  // header('Content-Type: application/json');
  // echo json_encode($row);
/*while($row = mysqli_fetch_object($res))
{

    echo "<tr>";
    echo "<td>$row->companyName</td>";
    echo "<td>$row->companyWebsite</td>";
    echo "<td>$row->companyEmail</td>";
    echo "<td>$row->companyPhone</td>";
    echo "<td>$row->companyLinkedIn</td>";
    echo "<td>$row->companyAddress</td>";
    echo "</tr>";
}
 $companyName  = $row->companyName;
     $companyWebsite  = $row->companyWebsite;
     $companyEmail  = $row->companyEmail;   
     $companyPhone  = $row->companyPhone;
     $companyLinkedIn  = $row->companyLinkedIn;
     $companyAddress  = $row->companyAddress;
*/

 
?>
