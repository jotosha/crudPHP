<?php include("../config/db.php"); ?>
   

<?php 
    global $connection;

    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        
        if(!empty($search)){
            
            $query = "SELECT * FROM profile WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%' ";
            $query_search = mysqli_query($connection, $query);
            $count = mysqli_num_rows($query_search);
            
            if(!$query_search){
                die("ERROR" . mysqli_error($connection));
            }
            
            if($count <= 0 ){
                "<div class='alert alert-danger alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No such result was found.
                </div>";
            }
            
        }else{
    
                 while($row = mysqli_fetch_array($select_query)){
                $user_id = $row['user_id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $gender = $row['gender'];
                $intro = $row['intro'];
                $img = $row['image'];
        
                $search_result = <<<DELIMETER
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="thumbnail">

                            <a href="../users/user.php?id=$user_id&&$firstname&&$lastname">
                                <img class="img-responsive" src="../images/$img">
                            </a>

                            <div class="caption">
                                <center>
                                    <a href="../users/user.php?id=$user_id&&$firstname&&$lastname">
                                        <h4>{$firstname} {$lastname}</h4>
                                    </a>
                                </center>
                            </div>

                        </div>
                    </div>

                DELIMETER;
                        echo $search_result;

                }


            }
        
        
    }

