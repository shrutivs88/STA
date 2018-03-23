<?php
session_start();
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$clientId = $_POST['clientId'];
$sql = "delete from client_details where clientId='$clientId'";

$result=mysqli_query($conn,$sql);

$_SESSION['server-msg'] = "<p style='color:red;'>Data Deleted Successfully!</p>";

?>