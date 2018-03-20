<?php
session_start();
include '../../config.php';
if(!isset($_SESSION["email"])) {
    header("Location:login.php");
}
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
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
            <!-- Admin Access Only -->
            <?php if ($_SESSION['role'] == "ADMIN") : ?>
                <div id="admin-container">
                    <h2 class="text-center">Admin</h2>
                </div>
            <?php endif; ?>
            <!-- BDM Access Only -->
            <?php if ($_SESSION['role'] == "BDM") : ?>
                <div id="bdm-container">
                    <h2 class="text-center">BDM</h2>
                </div>
            <?php endif; ?>
            <!-- BDE Access Only -->
            <?php if ($_SESSION['role'] == "BDE") : ?>
                <div id="bde-container">
                    <h2 class="text-center">BDE List Via CSV</h2>
                    <br>
                    <?php
                        
                        if(isset($_SESSION["server-msg"])) {
                            echo $_SESSION["server-msg"];
                            unset($_SESSION["server-msg"]);
                        }
                        
                    ?>

               <form action="savecsvfile.php" method="POST" enctype="multipart/form-data">     
                       <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                        <label> CSV File</label>
                                        <input type="file" name="file" id="file">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="import" name="import"> Upload File </div>
                                    </div>
                                   
                                </div>    
                            </div>
                            <div class="col-sm-4"></div>
                    </form>
                       </div>
                </div>
            <?php endif; ?>
        </div> 
    </div>
    <?php include 'footer.php';?>
</body>s
</html>