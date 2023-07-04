<?php
    include 'configs.php';
    session_start();
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</head>
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
<header class="header">
    <div class="container">
      
        <a href="home_page.php" class="logo">
          <img src="assets/mini_pjt_logo-removebg-preview.png" class="tby_logo" width="150" height="150">
        </a>
      

        <ul class="nav-content">
          <a href="admin_page.php">Home</a>
          <a href="admin_products.php">Products</a>
          <a href="admin_orders.php">Orders</a>
          <a href="admin_users.php">Users</a>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="icon">
        
          <div id="user-btn" class="fa fa-user-circle"></div>
        
        </div>

        <div class="user-box">
          
          
          <div class="user-dd">  
             
                <p>username: <span><?php echo $_SESSION['adminname']; ?></span></p>
                <p>email: <span><?php echo $_SESSION['adminemail']; ?></span></p>
                <a class="delete-btn" href="logout.php">Sign out</a>
          </div>
        </div>
      
    </div>
  </header>
