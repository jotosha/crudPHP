<?php include("./scripts/login.php");?>
   

   <div class="container">
    <div class="row" style="text-align: center;">
        <h3>Log in!</h3>
    </div>
    
    <div class="row sub_msg">
        <p>This is a system that allows users to creates, read, update and delete information.</p>
    </div>
    
    <div class="row signup">
        <div class="row"><p>Welcome, please log in.</p></div>
        
        <?php echo $error1 ?>
        <?php echo $error2 ?>
        <?php echo $error3 ?>
        <?php echo $error4 ?>
        <?php echo $error5 ?>
        <?php echo $error6 ?>
        
        
        <form action="" method="POST" class="form-horizontal">

           
            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="text" name="email_login" id="email_login" class="form-control">
                    <span id="error_Email"></span>
                </div>
            </div>
            
            
            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="password_login" id="password_login" class="form-control">
                    <span id="error_Password"></span>
                </div>
            </div>
            
            <div class="row form-group" style="margin: 0px 10px 20px 10px;">
                <div class="col-xs-12">
                    <input type="submit" name="login" id="log_in" class="form-control" value="LOGIN">
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="./user/forgot_password.php">Forgot your password?</a>
            </div>
        </div>
    </div>
    
</div>