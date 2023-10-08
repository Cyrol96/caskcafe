<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $page_title ?>
    </title>
    <!-- latest compile and minified css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.min.css">
</head>

<body>
    <!-- header -->
    <header>
        <div id="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">
                        <?php
                        if (isset($_SESSION['userid'])) {
                            echo "Logout-" . $_SESSION['firstname'] . " " . $_SESSION['lastname'];
                        } else {
                            echo 'Login';
                        }
                        ?>
                    </a></li>
            </ul>
        </div>
    </header>
    <article id="content" class="mx-auto">
        <div class="container-fluid ">
        </div>
    </article>
</body>

</html>
