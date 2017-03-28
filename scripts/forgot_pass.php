<?php include("../config/db.php"); ?>
<?php include('../lib/swift_required.php'); ?>
    

<?php

    global $connection;
    global $error, $fail, $info;

    if(isset($_POST['forgot'])){
        
        $email = $_POST['email'];
        
        $email = mysqli_real_escape_string($connection, $email);
        $query_sql = "SELECT * FROM signup WHERE email = '{$email}'";
        $query = mysqli_query($connection, $query_sql);
        $user_row = mysqli_num_rows($query);
        
        if(!$query){
            die("QUERY FAILED. " . mysqli_error($connection));
        }
        
        if(!empty($email)){
            if($user_row <= 0){
                 $error = "<div class='alert alert-danger email_alert'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email not Found
                </div>";
            }else{
                while($row = mysqli_fetch_array($query)){
                    $user_email = $row['email'];
                    $user_key = $row['activation_key'];
                }
                
                        $msg = "Please set your new password using a link <a href='http://localhost/crud/user/reset_password.php?key=".$user_key."'>http://localhost/crud/user/reset_password.php?key=".$user_key."</a>";
                 // Create the Transport that call setUsername() and setPassword()
                        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                        ->setUsername('testowemailer93@gmail.com')
                        ->setPassword('jotosha123');

                        $mailer = Swift_Mailer::newInstance($transport);
                        // Create the message
                        $message = Swift_Message::newInstance('Test')
                        // Give the message a subject
                        ->setSubject('Retrive Your Password')
                        // Set the From address with an associative array
                        ->setFrom(array('testowemailer93@gmail.com' => 'Siema mordeczki'))
                        // Set the To addresses with an associative array
                        ->setTo(array($email))
                        // Give it a body
                        ->setBody('Body Message')
                        // And optionally an alternative body
                        ->addPart($msg, 'text/html');
                        // Optionally add any attachments
                        $result = $mailer->send($message);
                        
                        if(!$result){
                            $fail = "<div class='alert alert-danger email_alert'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                                Failed To Send Verification Email.</div>";
                        }else{
                            $info = "<div class='alert alert-info email_alert'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                                A Verification Email Has been Sent.</div>";
                        }
                
            }
        }
        
    }