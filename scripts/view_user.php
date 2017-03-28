<?php include('../config/db.php'); ?>


<?php

    global $connection;
    global $firstname,$lastname,$email,$gender,$intro,$user_image;

    $query_select = "SELECT * FROM profile WHERE user_id = {$_GET['id']} ";
    $query = mysqli_query($connection, $query_select);
    $count = mysqli_num_rows($query);

    while($row = mysqli_fetch_array($query)){
        
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $gender = $row['gender'];
        $intro = $row['intro'];
        $user_image = $row['image'];
    }

    function profile_img(){
        global $count, $user_image;
        
        if($count < 0){
            echo "<img src='http://placehold.it/250x250' style='margin left:40px;' >";
        }else{
            echo "<img src='../images/$user_image' class='thumbnail img-responsive' style='height:250px;'>";
        }
    }

    function profile_data(){
        global $count,$firstname,$lastname,$email,$gender,$intro;
        
        if($count < 0){
            echo "<div class='alert alert-info alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Firstname, Lastname, Email, Gender, About me has not been updated.
                </div>";
        }else{
            echo "<label class='control-label col-sm-3'>Firstname:</label>
                <div class='col-sm-9'>$firstname</div><br><br>";
            
            echo "<label class='control-label col-sm-3'>Lastname:</label>
                    <div class='col-sm-9'>$lastname</div><br><br>";
            
            echo "<label class='control-label col-sm-3'>Email:</label>
                    <div class='col-sm-9'>$email</div><br><br>";
            
            echo "<label class='control-label col-sm-3'>Gender:</label>
                    <div class='col-sm-9'>$gender</div><br><br>";
            
            echo "<label class='control-label col-sm-3'>About Me:</label>
                    <div class='col-sm-9'>$intro</div><br><br>";
            
        }
        
        
    }


?>
