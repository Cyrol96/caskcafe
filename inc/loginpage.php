<?php

session_start();

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Login</h1>
            <p class="text-center">Please fill in the form below:</p>
            <form name="loginform2" action="./login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center" style="background-color:#f1f1f1;">
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </div>
</div>



</div>

<?php
include 'inc/footer.php';