<?php
session_start();
$_SESSION['token'] = bin2hex(random_bytes(32));
$_SESSION['token-expire'] = time() + 3600; // 1 hour = 3600 secs
?>
   <?php
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') 
               {
                  $_SESSION['logged_in_user'] = true;
                  header("Location: index.php");
               }
             
            else 
               {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
<html>
<head>
<title>Tools Shop</title>
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel='stylesheet' type='text/css' href='css/font-login.css'>
<link rel="stylesheet" href="css/font-awesome.min.css">
<div class="wrapper">
  <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <p class="title">Log in</p>
    <input type="text" name="username" placeholder="Username" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" name="password" placeholder="Password" />
    <i class="fa fa-key"></i>

    <button name = "login" type="submit">
      <i class="spinner"></i>
      <span type="submit"class="state">Log in</span>
    </button>
  </form>

  </p>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
</body>
</html>