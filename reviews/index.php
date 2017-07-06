<?php 
  ob_start();
  session_start();
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
  include('form_process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Support</title>
  <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
  <div class="container">  
  <form id="contact" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <h1>Quick Contact</h1>
    <h4>Contact us today, and get reply<br> with in 24 hours!</h4>
    <h4>
      <?php
        if ( $_SESSION['logged_in'] == 1 ) { 
        echo "Welcome", ' ', $first_name, ' ', $last_name;}
      ?>
    </h4>
    <fieldset>
      <input placeholder="Full name" type="text" name="name" value="<?= $name ?>" autofocus/>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Email address" type="text" name="email" value="<?= $email ?>" tabindex="2">
      <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." type="text" name="message" value="<?= $message ?>" tabindex="5"></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data
    <div class="success"><?= $success ?></div>
  </form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>  
</body>
</html>
