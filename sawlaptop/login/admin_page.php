<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Hallo, <span>Admin</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>" Ini adalah Website SPK Pemilihan Laptop menggunakan metode SAW"</p>
      <a href="../index.php" class="btn">Masuk</a>
      <!-- <a href="register_form.php" class="btn">register</a> -->
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>