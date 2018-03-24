<?php
session_start();
include '../../config.php';
if(!isset($_SESSION["email"])) {
    header("Location:login.php");
}
$userId = $_SESSION["userId"];
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
    <script src="<?php echo BASEURL; ?>assets/js/validation.js"></script>

    
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
                    <h2 class="text-center">Client Registration Page</h2>
                    <?php
            
                    if(isset($_SESSION['server-msg']))
                    {
                        echo $_SESSION['server-msg'];
                      
                        unset($_SESSION['server-msg']);
                    }
             
            ?>
          <br><br>          
        <form action="#" id="form1">
                    
            <div class="col-sm-6 col-sm-offset-3">
            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company Name : </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="companyName" name="companyName" type="text" class="form-control" placeholder="Enter Company Name" onfocusout="validateCompanyName()">
                                        <i style="color:red" id="companyNameError" ></i>
                                    </div>
                                </div>
                            </div><!-- row end -->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company Website: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="companyWebsite" name="companyWebsite" type="text" class="form-control" placeholder="Enter Website URL" onfocusout="validatecompanyWebsite()">
                                        <i style="color:red" id="companyWebsiteError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company Email id: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="companyEmail" name="companyEmail" class="form-control" type="text" placeholder="Enter Company email-id"  onfocusout="validatecompanyEmail()">
                                        <i style="color:red" id="companyEmailError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company Phone: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="companyPhone" name="companyPhone" type="text" class="form-control" placeholder="Enter Company phone number" onfocusout="validatecompanyPhone()">
                                        <i style="color:red" id="companyPhoneError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company LinkedIN Id: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input id="companyLinkedIn" name="companyLinkedIn" type="text" class="form-control" placeholder="Company linked in id" onfocusout="validatecompanyLinkedIn()">
                                        <i style="color:red" id="companyLinkedInError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Company Address: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea  id="companyAddress" name="companyAddress" class="form-control" placeholder="Enter Comapny address here" onfocusout="validatecompanyAddress()"></textarea>
                                        <i style="color:red" id="companyAddressError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
            </div>
           
        </form>   
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="myBtn">
            Add a Contact
            
            </button>
            <p id="total-clients"></p> 
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center" id="exampleModalLabel">Client Detalis</h2>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
          
          <!-- input field start here -->
          
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>First Name: </label>
                                                </div>
                                                <div class="col-sm-8">
                                                <input id="clientFirstName" name="clientFirstName" type="text" class="form-control" placeholder="Enter Your First Name"   form="form1" onfocusout="validateClientFirstName()">
                                                <i style="color:red" id="clientFirstNameError"></i>                                
                                                </div>
                                            </div>
                                        </div><!-- row end -->

                                        <div class="form-group">
                                            <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Last Name: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                    <input id="clientLastName" name="clientLastName" type="text" class="form-control" placeholder="Enter Your Last Name"    form="form1" onfocusout="validateClientLastName()">
                                                    <i style="color:red" id="clientLastNameError"></i>                               
                                                    </div>
                                                </div>
                                        </div><!-- row end -->

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Email id: </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="clientEmail" name="clientEmail" type="text" class="form-control" placeholder="Enter Your email-id "    form="form1" onfocusout="validateClientEmail()"> 
                                                    <i style="color:red" id="clientEmailError"></i>
                                                </div>
                                            </div>
                                        </div><!-- row end -->

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Mobile No.: </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="clientMobile" name="clientMobile" type="text" class="form-control" placeholder="Enter Your contact number "    form="form1" onfocusout="validateClientMobile()">
                                                <i style="color:red" id="clientMobileError"></i>
                                            </div>
                                        </div>
                                    </div><!-- row end -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Category: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input  id="clientCategory" name="clientCategory"   class="form-control"  onfocusout="validateClientCategoty()">
                                                <i style="color:red" id="clientCategoryError"></i>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Designation: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input  id="clientDesignation" name="clientDesignation"  class="form-control" onfocusout="validateClientDesignation()">
                                                
                                            <i style="color:red" id="clientDesignationError"></i>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Address: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" placeholder="Enter your address here" name="clientAddress" id="clientAddress" form="form1" onfocusout="validateClientAddress()"></textarea>
                                        <i style="color:red" id="clientAddressError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->

                               
                                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Country: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select id="clientCountry" name="clientCountry"  class="form-control" onfocusout="validateClientCountry()">
                                            <option value="">Choose Country</option>
                                            <option value="india">India</option>
                                            <option value="america">America</option>
                                            <option value="europe">Europe</option>
                                        </select>
                                        <i style="color:red" id="clientCountryError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->

                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>State: </label>
                                        </div>
                                    <div class="col-sm-8">
                                        <select  id="clientState" name="clientState"  class="form-control" onfocusout="validateClientState()">
                                            <option value="">Choose State</option>
                                            <option value="karanataka">Karnataka</option>
                                            <option value="maharashtra">Maharashtra</option>
                                            <option value="tamilnadu">Tamilnadu</option>
                                        </select>
                                        <i style="color:red" id="clientStateError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->
                           
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>City: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="clientCity" name="clientCity"  class="form-control" onfocusout="validateClientCity()">
                                                <option value="">Choose City</option>
                                                <option value="bangalore">Bangalore</option>
                                                <option value="pune">Pune</option>
                                                <option value="chennai">Chennai</option>
                                            </select>
                                            <i style="color:red" id="clientCityError"></i>
                                        </div>
                                    </div>
                                </div><!-- row end -->  

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>LinkedIn Id: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input  id="clientLinkedInid"  name="clientLinkedInid" type="text"  class="form-control" placeholder="Please Provide Linkedin id"    form="form1" onfocusout="validateClientLinkedIn()">
                                        <i style="color:red" id="clientLinkedInError"></i>
                                </div>
                            </div>
                        </div><!-- row end -->            

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Facebook Id: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="clientFacebookid" name="clientFacebookid" type="text" class="form-control" placeholder="Please Provide facebook id"    form="form1"  onfocusout="validateClientFacebookId()">
                                    <i style="color:red" id="clientFacebookIdError"></i>
                                </div>
                            </div>
                        </div><!-- row end -->    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Twitter Id: </label>
                                </div>
                                    <div class="col-sm-8">
                                        <input id="clientTwitterid" name="clientTwitterid" type="text"  class="form-control" placeholder="Please Provide twitter id"    form="form1" onfocusout="validateClientTwitterId()">
                                        <i style="color:red" id="clientTwitterIdError"></i>
                                    </div>
                            </div>
                        </div><!-- row end -->

                    <div class="form-group">
                        <div class="row text-center">
                            <input type="button" value="SaveContact"  class="btn btn-success"  onClick="saveClient()">
                            <input  type="button" value="Reset"  class="btn btn-danger" onclick="resetInputField()">  
                        </div>
                    </div><!-- row end -->
                <!-- input field end here -->
      </div>
    </div>
  </div>
</div>
        
                <div class="form-group">
                    <div class="row text-center">
                         <button type="button" onclick="submitForm1()" id="submitbtn" class="btn btn-success" value="submit" form="form1">Submit</button>
                    </div>
                </div><!-- row end -->

        
        </div> 
                </div>
            <?php endif; ?>
        </div> 
    </div>
    <script>
    function submitForm1() 
        {
           
            validateCompanyName();
            validatecompanyWebsite();
            validatecompanyEmail();
            validatecompanyPhone();
            validatecompanyLinkedIn();
            validatecompanyAddress();

            
            
            
            if((companyNameErrorFlag == false)&&(companyWebsiteErrorFlag == false)&&(companyEmailErrorFlag == false)&&(companyPhoneErrorFlag == false)&&(companyLinkedInErrorFlag == false)&&(companyAddressErrorFlag == false))
            {
            $("#companyName").prop('readonly',true);
            $("#companyWebsite").prop('readonly',true);
            $("#companyEmail").prop('readonly',true);
            $("#companyPhone").prop('readonly',true);
            $("#companyLinkedIn").prop('readonly',true);
            $("#companyAddress").prop('readonly',true);

            $("#clientFirstName").prop('readonly',true);
            $("#clientLastName").prop('readonly',true);
            $("#clientEmail").prop('readonly',true);
            $("#clientMobile").prop('readonly',true);
            $("#clientCategory").prop('readonly',true);
            $("#clientDesignation").prop('readonly',true);
            $("#clientAddress").prop('readonly',true);
            $("#clientCity").prop('readonly',true);
            $("#clientState").prop('readonly',true);
            $("#clientCountry").prop('readonly',true);
            $("#clientLinkedInid").prop('readonly',true);
            $("#clientFacebookid").prop('readonly',true);
            $("#clientTwitterid").prop('readonly',true);
            //console.log($("#submitbtn"));
            $("#submitbtn").attr('onclick','');

            
            


                $.ajax({
                            data: {
                                userId: <?php echo $userId; ?>,
                                companyName: "" + $("#companyName").val(),
                                companyWebsite: "" + $("#companyWebsite").val(),
                                companyEmail: "" + $("#companyEmail").val(),
                                companyPhone : "" + $("#companyPhone").val(),
                                companyLinkedIn: "" + $("#companyLinkedIn").val(),
                                companyAddress: "" + $("#companyAddress").val(),
                                /*clientFirstName: $("#clientFirstName").val(),
                                clientLastName: $("#clientLastName").val(),
                                clientEmail: $("#clientEmail").val(),*/

                                clientDetails: clients
                                
                                
                                
                            },
                            url: 'saveregister.php',
                            method: 'POST', 
                           
                            success: function(response) {
                           // alert("successs");
                                
                              window.location.href="clientlist.php";
                                
                            }, 
                            error: function(response) {
                               // alert("error");
                                window.location.reload();
                            }
                        });

               }
            
        }
    </script>
    <?php include 'footer.php';?>
    

</body>
</html>