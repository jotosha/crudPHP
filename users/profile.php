<?php include("../config/db.php"); ?>
<?php include("../scripts/view_profile.php"); ?>


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
        
        <link rel="stylesheet" href="../css/custom.css">
        
    </head>
    <body>
        <nav class="navbar" style="background-color: #19aff5; border-radius: 0; margin-bottom: 0;">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand crud" href="../user/home.php">CRUD SYSTEM</a>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 ">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown ">
                      <a href="#" style="color: white; background-color: #19aff5;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstname']; ?> <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="../users/complete_profile.php?firstname=<?php echo $_SESSION['firstname'];?>">Profile Information.</a></li>
                        <li><a href="../users/edit.php?firstname=<?php echo $_SESSION['firstname'];?>">Edit profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../user/logout.php">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>   
          </div>
        </nav>
        
<div class="jumbotron jumbo">
    <h2 class="text-center" style="font-size:70px; font-weight: 600;">Welcome <?php echo $_SESSION['firstname']; ?></h2>
    <h4 class="text-center" style="font-size: 30px;">(View Your profile)</h4>
</div>

<div class="container rowData">
    <br>
    <p class="text-center" style="font-size:30px; font-style:italic"></p>
    <br>
    
    <div class="row" style="border: 1px solid #e7e7e7;">
        <div class="col-sm-4" style="margin-top:20px;">
            <div class="form-group">
                <?php profile_img(); ?>
            </div>
        </div>
        
        <div class="col-sm-8" style="margin-top:20px;">
            <div class="row form-group">
                <?php profile_data(); ?>
            </div>
        </div>
</div>
    
    
</div>   
    </body>
</html>