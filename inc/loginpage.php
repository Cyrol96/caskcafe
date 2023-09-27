<?php

$self=basename(($_SERVER['PHP_SELF']));
$page_title="Log in | by User";
include("header.php");


if(isset($errors) && !empty($errors)){
    echo('<div class="container"><h1>Hey wait a minute...</h1><p>you may have forgotten:</p><p class="w3-red">');
    foreach($errors as $msg){
        echo "- $msg<br>";
    }
    echo '</p><p>Let\'s try that again!</p>';

}

//display the login form
?>
<div class="indent"><br>
<h2>Login</h2>
<form action="./loggedin.php" method="post">
  <div class="container">
    <label for="uname"></label>
    <input type="text" placeholder="Email" name="uname" required>

    <label for="psw"></label>
    <input type="password" placeholder="Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>

</form>

</div>

<?php
include 'inc/footer.php';