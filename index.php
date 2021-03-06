<?php include("./config/db.php"); ?>


<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- JQUERY-->
        <script
			  src="https://code.jquery.com/jquery-1.12.4.min.js"
			  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
			  crossorigin="anonymous"></script>
		

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="./css/custom.css">
        
    </head>
<script>
        $(document).ready(function(){
        //This code is written so as to always make the currently selected tab to be active

            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');

                //If the current tab is not active, remove every errors if they exist on the page.
                if(("#myTab a") !== $(this)){
                    $("#errorFirstname").html("");
                    $("#errorLastname").html("");
                    $("#errorEmail").html("");
                    $("#errorPassword").html("");
                    $("#error_Email").html("");
                    $("#error_Password").html("");
                    $(".alert-danger").remove();
                    $(".alert").remove();
                    //$(".email_alert").remove();
                }
            });

            // store the currently selected tab in the hash value
            $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
                var id = $(e.target).attr("href").substr(1);
                window.location.hash = id;
            });

            // on load of the page: switch to the currently selected tab
            var hash = window.location.hash;
            $('#myTab a[href="' + hash + '"]').tab('show');

            $("#typed_text").typed({
                strings: ["This is a system that allows users to create read update and delete information."],
                typeSpeed: 0
            });


        });

</script> 
    <body>
        <nav class="navbar" style="background-color: #19aff5;">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand crud" href="#">CRUD SYSTEM</a>
            </div>

          </div>
        </nav>
        
        <div class="container">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle='tab' href="#index">Index</a></li>
                <li><a data-toggle='tab' href="#login">Login</a></li>
                <li><a data-toggle='tab' href="#signup">Sign Up</a></li>
                <li><a data-toggle='tab' href="#admin">Admin</a></li>
            </ul>
            
            <div class="tab-content">
                <div id="index" class="tab-pane fade in active in">
                    <p>Index</p>
                </div>
                <div id="login" class="tab-pane fade">
                    <?php include('./user/login_form.php');?>
                </div>
                <div id="signup" class="tab-pane fade">
                    <?php include('./user/signup.php');?>
                </div>
                <div id="admin" class="tab-pane fade">
                    <?php include('./admin/admin_login.php');?>>
                </div>
            </div>
            
        </div>
        <script src="./js/login.js"></script>
        <script src="./js/reg.js"></script>
    </body>
</html>