<?php
$page_title = 'Cask Cafe | Contact';
include './inc/header.php';
// if(isset($_POST['submit'])){
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['email']) && !empty($_POST['comment'])) {

        // send to sanitize form data
        $firstName = ($_POST['fName']);
        $lastName = ($_POST['lName']);
        $email = ($_POST['email']);

        $comment = ($_POST['comment']);
        $fullName = $firstName . " " . $lastName;

        // turn flag off to not display the form again
        //to save to a file
        $timeStamp = time();
        $commentString = $fullName . "\r\n";
        $commentString .= $email . "\r\n";
        $commentString .= $timeStamp . "\r\n";
        $commentString .= $comment . "\r\n";
        $commentString .= "<hr>" . "\r\n";

        // check to see if the admin and comments folders exist
        if (!file_exists("admin"))
            mkdir("admin");
        if (!file_exists("./admin/comments"))
            mkdir("./admin/comments");

        //  check to see if the comments folder exists and create a folder if not
        if (!file_exists("admin")) {
            mkdir("admin");
        }
        if (!file_exists("./admin/comments")) {
            mkdir("./admin/comments");
        }
        //open a stream to the text file
        $commentFile = fopen('./admin/comments/' . $timeStamp . ".txt", "w") or die("<div class='w3-container w3-red'>sorry, unable to write to the file at this time, please try again soon</div>");
        if (flock($commentFile, LOCK_EX)) {
            // write to file
            if (@fwrite($commentFile, $commentString)) {
                flock($commentFile, LOCK_UN);

                // Connect to the database
                require('./dbconnect/dbconnect.php');

                // Make the query
                $q = "INSERT INTO contact_commenet (f_name, l_name, email, comment) VALUES ('$firstName', '$lastName', '$email', '$comment')";


                // Run the query
                $r = @mysqli_query($dbc, $q);
                // success
                echo "<div class='w3-container w3-khaki'><h1>Success!</h1>";
                echo "<p>Thank you, $fullName for contacting us. We will reply in 3-5 business days.The time was <span class='w3-text-teal'>" . date('g:i:s A m/d/Y') . "</span>.</p></div>";
            } else {
                // failure
                echo "<div class='w3-container w3-red'><h1>Oh No!</h1>";
                echo "<p>There seems to be a problem on our end. You message could not be written to the file. Please call (204)555-1234 to speak with a representative.</p></div>";
            }
        } else {
            // failure
            echo "<div class='w3-container w3-red'><h1>Oh No!</h1>";
            echo "<p>There seems to be a problem on our end. You message could not be sent. Please call (204)555-1234 to speak with a representative.</p></div>";
        }
        echo "<h3 class='success'>Your request has been accepted, you will be contacted shortly.</h3>";
        $displayForm = TRUE;
    } else {
        // failure message
        echo "<h3 class='error'>You will need to complete all form fields.</h3>";
        $displayForm = TRUE; // just in case the flag is set to FALSE
    }
} else {
    $displayForm = true;
}


?>

<h2 class="text-white">You can contact us</h2>
<?php
if ($displayForm) {
    echo '<form class="w3-container" action="contact.php" method="POST" novalidate>

    <p>*Please fill in all fields before sending your comments.</p>
    <table>

        <tr>
            <td>First Name:</td>
            <td><input class="w3-input" type="text" name="fName" id="firstname" required placeholder="First name"></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input class="w3-input" type="text" name="lName" id="lastname" required placeholder="Last name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input class="w3-input" type="text" name="email" id="email" required placeholder="Email"></td>
        </tr>
        <tr><br>
            <td valign="top">Comment:</td>
            <td><textarea row="5" cols="100" placeholder="Write your comments here ..." name="comment" id="comment"
                    required></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="w3-button w3-black" style="background-color:skyblue ;" type="submit" name="submit"
                    value="contact us"> <input class="w3-button w3-red" type="reset" value="clear"></td>
        </tr>

    </table>
    <p id="admin"><a href="./admin/dashboard2.php">Admin</a></p>';
}

?>
<?php
include './inc/footer.php';
?>