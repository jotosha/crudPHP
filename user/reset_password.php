<?php include("../config/db.php"); ?>
<?php include("../scripts/reset_pass.php"); ?>
<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <title>Reset password.</title>
       
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
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
           <div class="row" style="text-align: center;">
        <h3>Reset password</h3>
    </div>
    
    
    <div class="row signup">
      
       <?php echo $error; ?>
       <?php echo $update_good; ?>
       <?php echo $update_fail; ?>
       <?php echo $update_empty; ?>
        
        <form action="" method="POST" class="form-horizontal">

           
            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control">
                    <span id="error_Email"></span>
                </div>
            </div>
            
            
            <div class="row form-group" style="margin: 0px 10px 20px 10px;">
                <div class="col-xs-12">
                    <input type="submit" name="reset" id="reset" class="form-control" value="RESET PASSWORD">
                </div>
            </div>
        </form>
        
    </div>
    
        </div>
    </body>
</html>