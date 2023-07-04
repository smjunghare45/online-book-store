<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/admin_styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBY:Admin Page</title>
    <script src="assets/admin_script.js"></script>
</head>
<body>
<?php   include 'admin_header.php';?>

<section class="dashboard">
    <h1 class="head">Dashboard</h1>

    <div class="container-box">
        
        <!-- Payment Pending -->
        <div class="box">
            <h3>Payment Pendings</h3>

            <?php 
        $total_pending=0;
        $select_pending=mysqli_query($conn,"SELECT total_price FROM `orders` WHERE pay_status ='pending' ") or die('query failed');
        if(mysqli_num_rows($select_pending)>0){
            while($fetch_pending = mysqli_fetch_assoc($select_pending)){
                $total_price=$fetch_pending['total_price'];
                $total_pending+=$total_price;
            };
        }
        ?>

        <p><?php echo $total_pending; ?></p>
        </div>
            
        <!-- Payments completed -->
        <div class="box">
            <h3>Completed Payments</h3>

            <?php 
        $total_completed=0;
        $select_completed=mysqli_query($conn,"SELECT total_price FROM `orders` WHERE pay_status ='completed' ") or die('query failed');
        if(mysqli_num_rows($select_completed)>0){
            while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                $total_price=$fetch_completed['total_price'];
                $total_completed+=$total_price;
            };
        }
        ?>

        <p><?php echo $total_completed; ?></p>
        </div>

        <!-- ORDER -->
        <div class="box">
        <h3>Orders placed:</h3>
            <?php
            $select_orders =mysqli_query($conn,"SELECT * FROM `orders` ") or die('query failed');
            $no_orders =mysqli_num_rows($select_orders);
            
            ?>
            <p><?php echo $no_orders;    ?></p>
        </div>

        <!-- USER -->
        <div class="box">
        <h3>Total users:</h3>
            <?php
            $select_users =mysqli_query($conn,"SELECT * FROM `user` WHERE user_type ='user' ") or die('query failed');
            $no_users =mysqli_num_rows($select_users);
            
            ?>
            <p><?php echo $no_users;    ?></p>
        </div>

        <!-- ADMIN -->
        <div class="box">
        <h3>Total Admins:</h3>
            <?php
            $select_admin =mysqli_query($conn,"SELECT * FROM `user` WHERE user_type ='admin' ") or die('query failed');
            $no_admin =mysqli_num_rows($select_admin);
            
            ?>
            <p><?php echo $no_admin;    ?></p>
        </div>
        <!-- Feedbacks -->
        <div class="box">
        <h3>Feedbacks:</h3>
            <?php
            $select_fb =mysqli_query($conn,"SELECT * FROM `feedback` ") or die('query failed');
            $no_fb =mysqli_num_rows($select_fb);
            
            ?>
            <p><?php echo $no_fb;    ?></p>
        </div>

        

    </div>

</section>

    
</body>
</html>