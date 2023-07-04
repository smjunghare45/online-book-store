<?php
    include 'configs.php';
    session_start();

    if(isset($_POST['submit'])){
        
        $email =mysqli_real_escape_string($conn, $_POST['useremail']);
        $password =mysqli_real_escape_string($conn, md5($_POST['userpass']));
        

        $userdb = mysqli_query($conn,"SELECT * FROM `user` WHERE user_email ='$email'  AND user_password = '$password'") or die('Query Failed');
    
        if(mysqli_num_rows($userdb)>0){
            $row = mysqli_fetch_assoc($userdb);
                if($row['user_type']=='admin'){
                        $_SESSION['adminname']=$row['user_name'];
                        $_SESSION['adminemail']=$row['user_email'];
                        $_SESSION['adminid']=$row['user_id'];
                        header('location:admin_page.php');

                }elseif($row['user_type']=='user'){
                        $_SESSION['username']=$row['user_name'];
                        $_SESSION['useremail']=$row['user_email'];
                        $_SESSION['userid']=$row['user_id'];
                        header('location:home_page.php');

                }
        }else{
            $message[]= 'Incorrect Mail or Password.Try Again';
            
        }
    
    
    
    }   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheBookYard</title>
    <link rel="stylesheet" href="assets/user_styles.css">
</head>
<body>
    <div class="message">
        <span>'.$message.'</span>
        <i class="fa fa-bell" aria-hidden="true" onclick="this.parentElement.remove();"></i>

    </div>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fa fa-bell" aria-hidden="true" onclick="this.parentElement.remove();"></i>
        
            </div>';
        }
    }
    ?>


    <div class="container">
        
            <div class="form">
            <h3>Login</h3>
            <p>Enter your Details</p>
                <form action="" method="POST">
                
                <input type="text" name="useremail" placeholder="Enter Email" required class="box">
                    <br>
                <input type="password" name="userpass" placeholder="Enter Password" required class="box">
                    <br>
                <input type="submit" name="submit" value="Login">
                <p>New User?<a href="usersignup.php">sign up</a></p>
                </form>
            </div>
        </div>
    
    
</body>
</html>