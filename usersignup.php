<?php
    include 'configs.php';

    if(isset($_POST['submit'])){
        $name =mysqli_real_escape_string($conn, $_POST['username']);
        $email =mysqli_real_escape_string($conn, $_POST['useremail']);
        $password =mysqli_real_escape_string($conn, md5($_POST['userpass']));
        $cpassword =mysqli_real_escape_string($conn, md5($_POST['usercpass']));
        $usertype =$_POST['usertype'];

        $userdb = mysqli_query($conn,"SELECT * FROM `user` WHERE user_email ='$email'  AND user_password = '$cpassword'") or die('Query Failed');
    
        if(mysqli_num_rows($userdb)>0){
            $message[]= 'Existing User, Please Login';

        }else{
            if($password!=$cpassword){
                $message[]='Passwords do not match.';
            }else{
                mysqli_query($conn,"INSERT INTO `user`(user_name,user_email,user_password,user_type) VALUES('$name','$email','$cpassword','$usertype')") or die('Query Failed');
                $message[]='Registered Successfully! Kindly Login to get access';
                header('location:userlogin.php');
            }
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
            <h3>Sign Up</h3>
            <p>Enter your Details</p>
                <form action="" method="POST">
                <input type="text" name="username" placeholder="Enter Name" required class="box">
                    <br>
                <input type="text" name="useremail" placeholder="Enter Email" required class="box">
                    <br>
                <input type="password" name="userpass" placeholder="Enter Password" required class="box">
                    <br>
                    
                <input type="password" name="usercpass" placeholder="Confirm Password" required class="box">
                    <br>
                <select name="usertype" class="box">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <br>
                <input type="submit" name="submit" value="Register">
                <p>Already a user?<a href="userlogin.php">Login</a></p>
                </form>
            </div>
        </div>
    
    
</body>
</html>