<?php
session_start();
include '../../config.php';
if(!isset($_SESSION["email"])) {
    header("Location:login.php");
}
?>`
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
   <script>
     var limit = 10
      var offset = 0;
      var isUpdateOffsetPristine = true;
  $(document).ready(function() {
    loadByLimit();
    $("#ajaxButton").click(function() {
      
        loadByLimit();
    });
});

function loadByLimit(){
    $.ajax({
              type: "Post",
              url: "clientdatabasepage.php",
              data: {
            limitVal: limit,
            offsetVal: offset,
                 },
              success: function(data) {
                   //alert(data);
              //  console.log(data);
                //  $v = json_decode(data);
                if(data.length == 0 && isUpdateOffsetPristine == true) {
                        $("#bde-list").html("<h4 class='text-center'>No Clients Are Available!</h4>");
                        $("#ajaxButton").hide();
                        return;
                    } else if(data.length == 0 && isUpdateOffsetPristine == false) {
                        $("#bde-list").append("<h4 class='text-center'>No More Clients Are Available!</h4>");
                        $("#ajaxButton").hide();
                        return;
                    }
                    var bdeListBuilder = "";
                    if(data.length == 0) {
                        $("#bde-list").html("<h4 class='text-center'>No Client Are Available!</h4>");
                        return;
                    }
          var status = false;
          
          for(var i=0; i<data.length; i++) { 

                        var bdeListBuilder = "";
                        bdeListBuilder += "<tr>";

                        bdeListBuilder += "<td>" + data[i].clientId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientFirstName + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientLastName + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientEmail + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientMobile + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCategory + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientDesignation + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientAddress + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCity + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientState + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCountry + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientLinkedInId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientFacebookId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientTwitterId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCompanyId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientStatus + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientDateTime + "</td>";
                        bdeListBuilder += "</tr>";
                        $("#bde-list-table").append(bdeListBuilder);
                    }
                  
                    offset += limit;
                    isUpdateOffsetPristine = false;
                    
              }
        }); 
}
   </script>
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
                   
                    <h2 class="text-center">Client List</h2>
                    <div class="row">
                    <p id="clients" class="text-center" style="color:red;">
                        <?php
                        if(isset($_SESSION["server-msg"])) {
                            echo $_SESSION["server-msg"];
                            unset($_SESSION["server-msg"]);
                        }
                        ?>
                    </p>
                        
                             <div  id="bde-list" class="col-md-12">
                                <div style="overflow-x:auto;">
                       <table class="table table-bordered text-center">
                       <thead>
                            <tr>
                                 <th>ID </th>
                                <th>First Name </th>
                                <th>Last Name </th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Category</th>
                                <th>Designation</th>
                                <th> Address </th>
                                <th> City </th>
                                <th> State </th>
                                <th> Country</th>
                                <th> LinkedIn Id </th>
                                <th> Facebook Id </th>
                                <th> Twitter Id </th>
                                <th> Comapny Id </th>
                                <th> Status </th>
                                <th> Date And Time </th>
                                
                            </tr>  </thead>
                           <tbody  id="bde-list-table">
                                  
                              </tbody>
                            </table> 
                              
                    </div>
                                
        </div><!-- row end --> 

   
   <input type="button" class="btn btn-primary" value="Click Here" id="ajaxButton"/>
        <div id="result"></div>
            <?php endif; ?>
           </div>     
        </div> 
    </div>
 </div>
          
        
       
    <?php include 'footer.php';?>
    
</body>
</html>




