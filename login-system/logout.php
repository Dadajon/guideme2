<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
<img src="css/fone2.jpeg" style="width: 100%">
    <div class="form">
          <h1>Thanks for using our services</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="/guideme/index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
