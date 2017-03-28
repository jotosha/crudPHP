<?php 

    global $connection;
    global $error1, $error2,$error3, $error4,$error5, $error6;


    if(isset($_POST['login'])){
            $email_login = $_POST['email_login'];
            $pass_login = $_POST['password_login'];
        
        $email = filter_var($email_login, FILTER_SANITIZE_EMAIL);
        $pass = mysqli_real_escape_string($connection, $pass_login);
        
        $sql_query = "SELECT * FROM signup WHERE email ='{$email_login}'";
        $query = mysqli_query($connection,$sql_query);
        $count = mysqli_num_rows($query);
        
        if(!$query){
            die("QUERY FAILED. " . mysqli_error($connection));
        }
        
        if(!empty($email_login) && !empty($pass_login)){
            
            
            if(!preg_match("/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $pass_login)){
                    $error1 = "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password is incorrect.
                </div>";
                }
            
            if($count <= 0){
                $error2 = "<div class='alert alert-danger email_alert'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>User not Found
                </div>";
            }else{
                while($row = mysqli_fetch_array($query)){
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $user_email = $row['email'];
                    $user_password = $row['password'];
                    $activation_key = $row['activation_key'];
                    $is_active = $row['is_active'];
                    
                }
                
               $password = crypt($pass, $user_password);
        
                if($is_active == '1'){
                   if($email == $user_email && $password == $user_password){
                        header("Location: ./user/home.php");

                        $_SESSION['id'] = $id;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $user_email;
                        $_SESSION['activation_key'] = $activation_key;
                    }else{
                        $error3 = "<div class='alert alert-dangers alert-dismissable'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>User not found.
                    </div>";
                    }  
                }
                else{
                    $error6 = "<div class='alert alert-danger alert-dismissable'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Active your account by verification email that been sent when you registered.
                    </div>";
                    } 
                }

        }else{
            if(empty($email_login)){
                $error4 = "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email field cannot be empty.
                </div>";
            }
            
            if(empty($pass_login)){
                $error5 = "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password field cannot be empty.
                </div>";
            }
        }
    }

?>
