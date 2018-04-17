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

    <script>
        $(document).ready(function(){
            companyList();
            $("#ajaxButton").click(function() {
                companyList();
            });  
        });  //end of the Scriptfunction         
        
        var offset = 0;
        var limit = 4;
        var isUpdateOffsetPristine = true;
        var count =0;
            
        //displaying client Company List when edit btn is used 
        function companyList()
        {
            count++;
            $("#ajaxButton").prop("disabled", "true");
            $.ajax({
                    type: "Post",
                    url: "companydatabasepage.php",
                    data: { 
                        limitVal: limit,
                        offsetVal: offset,
                            },
                    success: function(response){
                        var companyBdeListBuilder = "";
                        if(response.length == 0 && isUpdateOffsetPristine == true)
                                    {
                                        $("#company-bde-list").html("<h4 class='text-center'>No Companies Are Available!</h4>");
                                        $("#ajaxButton").hide();
                                        return;
                                    } else if(response.length == 0 && isUpdateOffsetPristine == false) {
                                        $("#company-bde-list").append("<h4 class='text-center'>No More Companies Are Available!</h4>");
                                        $("#ajaxButton").hide();
                                        return;
                                    }
                        if(response.length == 0) 
                                    {
                                        $("#company-bde-list").html("<h4 class='text-center'>No Companies Are Available!</h4>");
                                        return;
                                    }   
                    for(var i=0; i<response.length; i++) { 
                                    var bdeListBuilder = "";
                                    bdeListBuilder += "<tr>";
                                    bdeListBuilder += "<td>"+ parseInt(count+i) +"</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_name + "</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_website + "</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_email + "</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_phone + "</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_linkedin + "</td>";
                                    bdeListBuilder += "<td>" + response[i].client_company_address + "</td>";
                                    bdeListBuilder += "<td><button class='btn btn-info action-btn' onclick='showEditCompany(" + response[i].client_company_id + ")'><span class='glyphicon glyphicon-edit'></span></button></td>'";
                                    bdeListBuilder += "<td><button class='btn btn-primary' id='add-btn' onclick=addContentOfClient(" + response[i].client_company_id + ")><span class='glyphicon glyphicon-plus'></span></button>&nbsp;&nbsp;</td>";
                                    bdeListBuilder += "<td><button class='btn btn-danger action-btn' onclick='showDeleteCompany(" + response[i].client_company_id + ")'><span class='glyphicon glyphicon-trash'></span></button></td>'";
                                    bdeListBuilder += "<td><button class='btn btn-primary action-btn' onclick='showContacts(" + response[i].client_company_id + ")'><span class='glyphicon glyphicon-pawn'></span></button></td>'";
                                    bdeListBuilder += "</tr>";
                                    $("#companyBde-list").append(bdeListBuilder);
                                    }
                                    offset += limit;
                                    isUpdateOffsetPristine = false;  
                                    count = count+limit-1;
                                    $("#ajaxButton").prop("disabled", ""); 

                            }//end of the response function
                    });
        }//end of the function  

//showing company list in modal with addcontact and edit company btns
        function showEditCompany(client_company_id) {
        $("#myModalCompany").modal('toggle');
        //alert(companyId);
        $.ajax({
                type: "post",
                url:"showCompany.php",
                data: {
                    companyId:client_company_id
                },
                success: function(companyresult){
                  //  console.log(companyresult);
                   // return;

                    var editContactButtonBuilder = "<button id='edit-btn' value='Edit Company' class='btn btn-info' onclick='editCompany(" + companyresult.companyId + ")'>Edit Company</button>";
                    var saveCompanyButtonBuilder="<button id='save-btn' class='btn btn-success action-btn btn-identical-dimension' onclick='saveCompany(" + companyresult.companyId + ")'>Save</button>";
                    var resetCompanyButtonBuilder="<button id='reset-btn' class='btn btn-danger action-btn btn-identical-dimension' onclick='resetCompany()'>Cancel</button>";
                    $("#modal-action-btns").html(editContactButtonBuilder+saveCompanyButtonBuilder+resetCompanyButtonBuilder);

                    //$("#companyId").val(companyresult.companyId);
                    $("#companyName").val(companyresult.companyName);
                    $("#companyWebsite").val(companyresult.companyWebsite);
                    $("#companyEmail").val(companyresult.companyEmail);
                    $("#companyPhone").val(companyresult.companyPhone);
                    $("#companyLinkedIn").val(companyresult.companyLinkedIn);
                    $("#companyAddress").val(companyresult.companyAddress);

                    $("#save-btn").hide();

                    $("#companyName").prop("readonly", true);
                    $("#companyWebsite").prop("readonly", true);
                    $("#companyEmail").prop("readonly", true);
                    $("#companyPhone").prop("readonly", true);
                    $("#companyLinkedIn").prop("readonly", true);
                    $("#companyAddress").prop("readonly", true);
              
                } 
        });
    }

//Delete company 
function showDeleteCompany(client_company_id){
        var result = confirm("Are You Sure?");
        if(result) {
            $.ajax({
                type: "POST",
                url: "performdeletecompany.php",
                data: {
                    companyId:client_company_id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    }

//adding contact person for particular company
   function addContentOfClient(client_company_id)
    {
        window.location = 'AddCompanyClientDetalis.php?companyId=' + client_company_id;
    }

//editing company details which is in modal
    function editCompany(client_company_id){
      // alert("okay");
       $("#companyName").prop("readonly", "");
       $("#companyWebsite").prop("readonly", "");
       $("#companyEmail").prop("readonly", "");
       $("#companyPhone").prop("readonly", "");
       $("#companyLinkedIn").prop("readonly", "");
       $("#companyAddress").prop("readonly", "");
            $("#add-btn").hide();
            $("#edit-btn").hide();
            $("#save-btn").show();
    }

   function saveCompany(client_company_id){
       //alert("okay");
       $.ajax({
                type: "Post",
                url: "companyupdatedatabase.php",
                data: {
                    companyId:client_company_id,
                    companyName:$("#companyName").val(),
                    companyWebsite:$("#companyWebsite").val(),
                    companyEmail:$("#companyEmail").val(),
                    companyPhone:$("#companyPhone").val(),
                    companyLinkedIn:$("#companyLinkedIn").val(),
                    companyAddress:$("#companyAddress").val()
                },
                success: function(result){
                    window.location.reload();
                }
           });
        }

    function resetCompany(){
        $("#myModalCompany").modal('toggle');
    }

//showing contact from company details
    function showContacts(client_company_id){
        window.location = 'showContactsDetails.php?companyId=' + client_company_id;
    }      
 </script>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
            <!-- BDE Access Only -->
            <?php if ($_SESSION['role'] == "BDE") : ?>
                <div id="bde-container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2 class="text-center">Company List </h2>
                            <?php
                            if(isset($_SESSION["serverMsg"])) 
                            {
                                echo $_SESSION["serverMsg"];
                                
                                unset($_SESSION["serverMsg"]);
                            }
                            ?>
                                <table class="table table-bordered  text-center" >
                                        <div  id="company-bde-list">
                                            <div style="overflow-x:auto;">
                                                <thead>  
                                                    <tr bgcolor="lightgray">
                                                        <th> Sl No. </th>    
                                                        <th>Company Name</th>
                                                        <th>Company Website</th>
                                                        <th>Company Email</th>
                                                        <th>Company Phone</th>
                                                        <th>Company Linked In</th>
                                                        <th>Company Address</th>
                                                        <th> Edit </th>
                                                        <th>Add Contact </th>
                                                        <th> Delete </th>
                                                        <th> Contacts </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="companyBde-list"></tbody>    
                                            </div>
                                        </div>        
                                    </table>
                                <div class="text-center" style="margin-top: 10px;">
                                    <input type="button" class="btn btn-default" value="Load More" id="ajaxButton"/>
                                </div>            
                        </div>
                        <div class="col-sm-2"></div>  
                    </div><!--row end-->   
                </div>
            <?php endif; ?>
        </div> 
    </div>
    <?php include 'footer.php';?>
</body>
</html>

<!--MODAL TO DISPLAY PARTICULAR COMPANY--> 

<p  data-toggle="modal" data-target="#myModalCompany"></p>
<div id="myModalCompany" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Add Client Company Details</h4>
      </div>
      <div class="modal-body">
      <!-- modal body starts here -->
        <div id="modal-action-btns"></div>
     <table class="table table-bordered" top-margin="5px;"  >
                        <tr>
                        <th>Company Name : </th>
<td><input id="companyName" name="companyName" type="text" class="form-control" placeholder="Enter Company Name" readonly></td>
                        </tr>   <br>
                        <tr>            
                        <th>Company Website: </th>
<td><input id="companyWebsite" name="companyWebsite" type="text" class="form-control" placeholder="Enter Website URL" readonly></td>
                          </tr>    
                          <tr>
                        <th>Company Email id: </th>
<td><input id="companyEmail" name="companyEmail" class="form-control" type="text" placeholder="Enter Company email-id" readonly></td>
                             </tr>        
                             <tr>
                        <th>Company Phone: </th>
<td><input id="companyPhone" name="companyPhone" type="text" class="form-control" placeholder="Enter Company phone number" readonly></td>
                                   </tr>   
                                   <tr>
                        <th>Company LinkedIN Id: </th>
<td><input id="companyLinkedIn" name="companyLinkedIn" type="text" class="form-control" placeholder="Company linked in id" readonly></td>
                                     </tr> 
                                    <tr>
                        <th>Company Address: </th>
<td><textarea  id="companyAddress" name="companyAddress" class="form-control" placeholder="Enter Comapny address here" readonly></textarea></td>
                          </tr>            
      
          </table>
      </div>
      <!-- modal body ends here -->
             
    </div>

  </div>
</div>