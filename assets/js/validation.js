
        var clients = [];
        var client = {
          "clientFirstName":"",
          "clientLastName":"",
          "clientEmail":"",
          "clientMobile":"",
          "clientCategory":"",
          "clientDesignation":"",
          "clientCity":"",
          "clientState":"",
          "clientCountry":"",
          "clientAddress":"",
          "clientLinkedInid":"",
          "clientFacebookid":"",
          "clientTwitterid":"",
          
        };

        var clientFirstNameErrorFlag = true;
        var clientLastNameErrorFlag = true;
        var clientEmailErrorFlag = true;
        var  clientMobileErrorFlag = true;
        var clientCategoryErrorFlag = true;
        var clientDesignationErrorFlag = true;
        var clientCityErrorFlag = true;
        var clientStateErrorFlag = true;
        var clientCountryErrorFlag  = true;
        var clientAddressErrorFlag = true;
        var clientLinkedInErrorFlag = true;
        var clientFacebookIdErrorFlag = true;
        var clientTwitterIdErrorFlag = true;

        var clientFirstNameErrorMsg = "";
        var clientLastNameErrorMsg = "";
        var clientEmailErrorMsg = "";
        var clientMobileErrorMsg = "";
        var clientCategoryErrorMsg = "";
        var clientDesignationErrorMsg = "";
        var clientCityErrorMsg = "";
        var clientStateErrorMsg = "";
        var clientCountryErrorMsg = "";
        var clientAddressErrorMsg = "";
        var clientLinkedInErrorMsg = "";
        var clientFacebookIdErrorMsg = "";
        var clientTwitterIdErrorMsg = "";

         function validateClientFirstName()
        {
            var clientFirstName = $("#clientFirstName").val().trim();
            clientFirstNameErrorFlag=false;
            clientFirstNameErrorMsg="";
            $("#clientFirstName").css({"border":"2px solid green"});
            if(clientFirstName=="")
            {
                clientFirstNameErrorFlag=true;
                $("#clientFirstName").css({"border":"2px solid red"}) ;
                clientFirstNameErrorMsg="Please Enter Your First Name";
            }
                $("#clientFirstNameError").text(clientFirstNameErrorMsg);
        }

        function validateClientLastName()
        {
            var clientLastName = $("#clientLastName").val().trim();
            clientLastNameErrorFlag=false;
            clientLastNameErrorMsg="";
            $("#clientLastName").css({"border":"2px solid green"});
            if(clientLastName=="")
            {
                clientLastNameErrorFlag=true;
                $("#clientLastName").css({"border":"2px solid red"}) ;
                clientLastNameErrorMsg="Please Enter Your Last Name";
            }
                 $("#clientLastNameError").text(clientLastNameErrorMsg);
        }

        function validateClientEmail()
        {
            var clientEmail = $("#clientEmail").val().trim();
            EmailRegEx= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            clientEmailErrorFlag=false;
            clientEmailErrorMsg="";
            $("#clientEmail").css({"border":"2px solid green"});
            if(clientEmail=="")
            {
                clientEmailErrorFlag=true;
                $("#clientEmail").css({"border":"2px solid red"}) ;
                clientEmailErrorMsg="Please Enter Your Email-Id";
            }
            else if(!EmailRegEx.test(clientEmail))
           {
                $("#clientEmail").css({"border":"2px solid red"}) ;
                clientEmailErrorMsg="Invalid Email format";
                
           }
                $("#clientEmailError").text(clientEmailErrorMsg);

        }

        function validateClientMobile()
        {
            var clientMobile = $("#clientMobile").val().trim();
            clientMobileErrorFlag=false;
            clientMobileErrorMsg="";
            $("#clientMobile").css({"border":"2px solid green"});
            if(clientMobile==""||clientMobile.length<10||clientMobile.length>10||isNaN(clientMobile))
            {
                clientMobileErrorFlag=true;
                $("#clientMobile").css({"border":"2px solid red"}) ;
                clientMobileErrorMsg="Please Enter Your Mobile number";
            }
                $("#clientMobileError").text(clientMobileErrorMsg);
        }

        function validateClientCategoty()
        {
            var clientCategory = $("#clientCategory").val().trim();
            clientCategoryErrorFlag=false;
            clientCategoryErrorMsg="";
            $("#clientCategory").css({"border":"2px solid green"});
            if(clientCategory=="")
            {
                clientCategoryErrorFlag=true;
                $("#clientCategory").css({"border":"2px solid red"}) ;
                clientCategoryErrorMsg="Please select your category";
            }
                $("#clientCategoryError").text(clientCategoryErrorMsg);
        }

        function validateClientDesignation()
        {
            var clientDesignation = $("#clientDesignation").val().trim();
            clientDesignationErrorFlag=false;
            clientDesignationErrorMsg="";
            $("#clientDesignation").css({"border":"2px solid green"});
            if(clientDesignation=="")
            {
                clientDesignationErrorFlag=true;
                $("#clientDesignation").css({"border":"2px solid red"}) ;
                clientDesignationErrorMsg="Please select your designation";
            }
                $("#clientDesignationError").text(clientDesignationErrorMsg);
        }

        function validateClientCity()
        {
            var clientCity = $("#clientCity").val().trim();
            clientCityErrorFlag=false;
            clientCityErrorMsg="";
            $("#clientCity").css({"border":"2px solid green"});
            if(clientCity=="")
            {
                clientCityErrorFlag=true;
                $("#clientCity").css({"border":"2px solid red"}) ;
                clientCityErrorMsg="Please select your city";
            }
                $("#clientCityError").text(clientCityErrorMsg);

        }
        function validateClientState()
        {
            var clientState = $("#clientState").val().trim();
            clientStateErrorFlag=false;
            clientStateErrorMsg="";
            $("#clientState").css({"border":"2px solid green"});
            if(clientState=="")
            {
                clientStateErrorFlag=true;
                $("#clientState").css({"border":"2px solid red"}) ;
                clientStateErrorMsg="Please select your state";
            }
                $("#clientStateError").text(clientStateErrorMsg);
        }

        function validateClientCountry()
        {
            var clientCountry = $("#clientCountry").val().trim();
            clientCountryErrorFlag=false;
            clientCountryErrorMsg="";
            $("#clientCountry").css({"border":"2px solid green"});
            if(clientCountry=="")
            {
                clientCountryErrorFlag=true;
                $("#clientCountry").css({"border":"2px solid red"}) ;
                clientCountryErrorMsg="Please select your country";
            }
                $("#clientCountryError").text(clientCountryErrorMsg);

        }
        function validateClientAddress()
        {
            var clientAddress = $("#clientAddress").val().trim();
            clientAddressErrorFlag=false;
            clientAddressErrorMsg="";
            $("#clientAddress").css({"border":"2px solid green"});
            if(clientAddress=="")
            {
                clientAddressErrorFlag=true;
                $("#clientAddress").css({"border":"2px solid red"}) ;
                clientAddressErrorMsg="Please select your Address";
            }
                $("#clientAddressError").text(clientAddressErrorMsg);
        }
        function validateClientLinkedIn()
        {
            var clientLinkedIn = $("#clientLinkedInid").val().trim();
            clientLinkedInErrorFlag=false;
            clientLinkedInErrorMsg="";
            $("#clientLinkedInid").css({"border":"2px solid green"});
            if(clientLinkedIn=="")
            {
                clientLinkedInErrorFlag=true;
                $("#clientLinkedInid").css({"border":"2px solid red"}) ;
                clientLinkedInErrorMsg="Please Enter Your Linkedin id";
            }
                $("#clientLinkedInError").text(clientLinkedInErrorMsg);
        }
        function validateClientFacebookId()
        {
            var clientFacebookId = $("#clientFacebookid").val().trim();
            clientFacebookIdErrorFlag=false;
            clientFacebookIdErrorMsg="";
            $("#clientFacebookid").css({"border":"2px solid green"});
            if(clientFacebookId=="")
            {
                clientFacebookIdErrorFlag=true;
                $("#clientFacebookid").css({"border":"2px solid red"}) ;
                clientFacebookIdErrorMsg="Please Enter Your FacebookmId";
            }
                $("#clientFacebookIdError").text(clientFacebookIdErrorMsg);
        }

        function validateClientTwitterId()
        {
            var clientTwitterId = $("#clientTwitterid").val().trim();
            clientTwitterIdErrorFlag=false;      
            clientTwitterIdErrorMsg="";
            $("#clientTwitterid").css({"border":"2px solid green"});
            if(clientTwitterId=="")
            {
                clientTwitterIdErrorFlag=true;
                $("#clientTwitterid").css({"border":"2px solid red"}) ;
                clientTwitterIdErrorMsg="Please Enter your TwitterId";
            }
                $("#clientTwitterIdError").text(clientTwitterIdErrorMsg);
        }

        function saveClient() {
            validateClientFirstName();
            validateClientLastName();
            validateClientEmail();
            validateClientMobile();
            validateClientCategoty();
            validateClientDesignation();
            validateClientCity();
            validateClientState();
            validateClientCountry();
            validateClientAddress();
            validateClientLinkedIn();
            validateClientFacebookId();
            validateClientTwitterId();

            //step1: get all input data from modal and save it in client object
           client.clientFirstName = $("#clientFirstName").val();
            client.clientLastName = $("#clientLastName").val();
            client.clientEmail = $("#clientEmail").val();
            client.clientMobile = $("#clientMobile").val();
            client.clientCategory = $("#clientCategory").val();
            client.clientDesignation = $("#clientDesignation").val();
            client.clientCity = $("#clientCity").val();
            client.clientState = $("#clientState").val();
            client.clientCountry = $("#clientCountry").val();
            client.clientAddress = $("#clientAddress").val();
            client.clientLinkedInid = $("#clientLinkedInid").val();
            client.clientFacebookid = $("#clientFacebookid").val();
            client.clientTwitterid = $("#clientTwitterid").val();
          
            //step2: deep copy client object to clients array
            var clientObj = jQuery.extend(true, {}, client);
            clients.push(clientObj);
            //step3: reset client object
            client.clientFirstName = ""; 
            client.clientLastName = "";
            client.clientEmail = "";
            client.clientMobile = "";
            client.clientCategory = "";
            client.clientDesignation = "";
            client.clientCity = "";
            client.clientState = "";
            client.clientCountry = "";
            client.clientAddress = "";
            client.clientLinkedInid = "";
            client.clientFacebookid = "";
            client.clientTwitterid = "";
         
            //step4: close modal(data-dismiss)
            $('#exampleModal').modal('hide');

            resetModal();

            //show number of contacts added
            $('#total-clients').html("Total " + clients.length + " client are successfully added ");
            
        }

        function resetInputField(){
            $("#clientFirstName").text("");
            $("#clientFirstName").val("");
            $("#clientFirstName").css({"border-color":"#ccc"});

            $("#clientLastName").text("");
            $("#clientLastName").val("");
            $("#clientLastName").css({"border-color":"#ccc"});

            $("#clientEmail").text("");
            $("#clientEmail").val("");
            $("#clientEmail").css({"border-color":"#ccc"});

            $("#clientMobile").text("");
            $("#clientMobile").val("");
            $("#clientMobile").css({"border-color":"#ccc"});

            $("#clientCategory").text("");
            $("#clientCategory").val("");
            $("#clientCategory").css({"border-color":"#ccc"});

            $("#clientDesignation").text("");
            $("#clientDesignation").val("");
            $("#clientDesignation").css({"border-color":"#ccc"});

            $("#clientCity").text("");
            $("#clientCity").val("");
            $("#clientCity").css({"border-color":"#ccc"});

            $("#clientState").text("");
            $("#clientState").val("");
            $("#clientState").css({"border-color":"#ccc"});

            $("#clientCountry").text("");
            $("#clientCountry").val("");
            $("#clientCountry").css({"border-color":"#ccc"});

            $("#clientAddress").text("");
            $("#clientAddress").val("");
            $("#clientAddress").css({"border-color":"#ccc"});

            $("#clientLinkedInid").text("");
            $("#clientLinkedInid").val("");
            $("#clientLinkedInid").css({"border-color":"#ccc"});

            
            $("#clientFacebookid").text("");
            $("#clientFacebookid").val("");
            $("#clientFacebookid").css({"border-color":"#ccc"});

            
            $("#clientTwitterid").text("");
            $("#clientTwitterid").val("");
            $("#clientTwitterid").css({"border-color":"#ccc"});
        }

        function resetModal(){
            $("#clientFirstName").val("");
            $("#clientLastName").val("");
            $("#clientEmail").val("");
            $("#clientMobile").val("");
            $("#clientCategory").val("");
            $("#clientDesignation").val("");
            $("#clientCity").val("");
            $("#clientState").val("");
            $("#clientCountry").val("");
            $("#clientAddress").val("");
            $("#clientLinkedInid").val("");
            $("#clientFacebookid").val("");
            $("#clientTwitterid").val("");
         
            
        } 

        

        var companyNameErrorFlag = true;
        var companyWebsiteErrorFlag = true;
        var companyAddressErrorFlag = true;
        var companyPhoneErrorFlag = true;
        var companyEmailErrorFlag = true;
        var companyLinkedInErrorFlag = true;
        

        var companyNameErrorMsg= "";
        var companyWebsiteErrorMsg="";
        var companyAddressErrorMsg = "";
        var companyPhoneErrorMsg = "";
        var companyEmailErrorMsg = "";
        var companyLinkedInErrorMsg = "";
         

        function validateCompanyName()
        {
            var companyName=$("#companyName").val().trim();
            companyNameErrorFlag=false;
            companyNameErrorMsg="";
            $("#companyName").css({"border":"2px solid green"});
            if(companyName=="")
            {
                companyNameErrorFlag=true;
                $("#companyName").css({"border":"2px solid red"}) ;
                companyNameErrorMsg="Please Enter Company Name";
            }
            //console.log($("#companyNameError"));
            $("#companyNameError").text(companyNameErrorMsg);

        }

        function validatecompanyWebsite()
        {
            var companyWebsite = $("#companyWebsite").val().trim();
           websiteRegEx = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
            companyWebsiteErrorFlag=false;
            companyWebsiteErrorMsg="";
            $("#companyWebsite").css({"border":"2px solid green"});
            if(companyWebsite=="")
            {
                companyWebsiteErrorFlag=true;
                $("#companyWebsite").css({"border":"2px solid red"}) ;
                companyWebsiteErrorMsg="Please Enter a Website URL";
            }
            else if(!websiteRegEx.test(companyWebsite))
           {
                $("#companyWebsite").css({"border":"2px solid red"}) ;
                companyWebsiteErrorMsg="Invalid website format";
                
           }
            //console.log($("#companyNameError"));
            $("#companyWebsiteError").text(companyWebsiteErrorMsg);

        }

        function validatecompanyAddress()
        {
            var companyAddress = $("#companyAddress").val().trim();
            companyAddressErrorFlag=false;
            companyAddressErrorMsg="";
            $("#companyAddress").css({"border":"2px solid green"});
            if(companyAddress=="")
            {
                companyAddressErrorFlag=true;
                $("#companyAddress").css({"border":"2px solid red"}) ;
                companyAddressErrorMsg="Please Enter Company Address";
            }
            //console.log($("#companyNameError"));
            $("#companyAddressError").text(companyAddressErrorMsg);
        }
        function validatecompanyPhone()
        {
            var companyPhone = $("#companyPhone").val().trim();
            companyPhoneErrorFlag=false;
            companyPhoneErrorMsg="";
            $("#companyPhone").css({"border":"2px solid green"});
            if(companyPhone==""||companyPhone.length<10||companyPhone.length>10||isNaN(companyPhone))
            {
                companyPhoneErrorFlag=true;
                $("#companyPhone").css({"border":"2px solid red"}) ;
                companyPhoneErrorMsg="Please Enter Company Phone";
            }
            //console.log($("#companyNameError"));
            $("#companyPhoneError").text(companyPhoneErrorMsg);
        }


        function validatecompanyEmail()
        {
            var companyEmail = $("#companyEmail").val().trim();
            companyEmailErrorFlag=false;
            companyEmailErrorMsg="";
            $("#companyEmail").css({"border":"2px solid green"});
            if(companyEmail=="")
            {
                companyEmailErrorFlag=true;
                $("#companyEmail").css({"border":"2px solid red"}) ;
                companyEmailErrorMsg="Please Enter Company Email-Id";
            }
            //console.log($("#companyNameError"));
            $("#companyEmailError").text(companyEmailErrorMsg);
        }


        function validatecompanyLinkedIn()
        {
            var companyLinkedIn = $("#companyLinkedIn").val().trim();
            companyLinkedInErrorFlag=false;
            companyLinkedInErrorMsg="";
            $("#companyLinkedIn").css({"border":"2px solid green"});
            if(companyLinkedIn=="")
            {
                companyLinkedInErrorFlag=true;
                $("#companyLinkedIn").css({"border":"2px solid red"}) ;
                companyLinkedInErrorMsg="Please Enter Your linked in ID";
            }
            //console.log($("#companyNameError"));
            $("#companyLinkedInError").text(companyLinkedInErrorMsg);
        }


      
       
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

        