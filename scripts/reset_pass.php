
<?php include("../config/db.php"); ?>

<?php 


    global $connection;
    global $error, $update_good, $update_fail, $update_empty;

    if(isset($_POST['reset'])){
        if(!empty($_GET['key'])){
            $key = $_GET['key'];
        }else{
            $key = '';
        }
        
        if($key != ''){
            $pass_word = $_POST['password'];
            $pass = mysqli_real_escape_string($connection, $pass_word);
            
            $salt_query = mysqli_query($connection, "SELECT randSaltPass from signup");
            $row = mysqli_fetch_array($salt_query);
            $salt = $row['randSaltPass'];
            
            $password = crypt($pass, $salt);
            
            $sql = mysqli_query($connection, "SELECT * FROM signup WHERE activation_key = '{$key}' ");
            $count = mysqli_num_rows($sql);
            
            if(!empty($pass_word)){
                if($count == 1){
                    if(!preg_match("/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $pass_word)){
                            $error5 = "<div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Must Be Between 5 and 15 Characters and Must Contain At Least One Lowercase Letter One Uppercase Letter and One Digit.
                            </div>";
                    }else{
                        $update_sql = "UPDATE signup SET password = '{$password}' WHERE activation_key = '{$key}' ";
                        $update_query = mysqli_query($connection, $update_sql);
                    
                        if($update_query){
                        $update_good = "<div class='alert alert-succesfull email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        Your Password has been changed.</div>";
                        }
                    }
                }else{
                    $update_fail = "<div class='alert alert-danger email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        No data found.</div>";
                }
            }else{
                $update_empty = "<div class='alert alert-danger email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        Password field cannot be empty.</div>";
            }
        }
    }
           