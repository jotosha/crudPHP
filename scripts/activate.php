<?php 

global $connection; 

    global $update_good, $good_update, $error;
    

    if(!empty($_GET['key'])){
        $key = $_GET['key'];
    }else{
        $key = "";
    }
    
    if($key != ''){

        $sql = mysqli_query($connection, "SELECT * FROM signup WHERE activation_key = '$key' ");
        $count = mysqli_num_rows($sql);
        

        if($count == 1){
            while($row = mysqli_fetch_array($sql)){
                $is_active = $row['is_active'];
                
                if($is_active == 0){

                    $update_sql = "UPDATE signup SET is_active = '1' WHERE activation_key = '$key' ";
                    $update_query = mysqli_query($connection, $update_sql);
                    

                    if($update_query){
                        $update_good = "<div class='alert alert-info email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        Your Email Has Been Verified Successfully.</div>";
                    }
                }else{
                    $good_update = "<div class='alert alert-info email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        Your Email Has Already Been verified.</div>";
                }
            }
        }else{
            $error = "<div class='alert alert-danger email_alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>
                        Error Occured</div>";
        }
        
    }
;?>