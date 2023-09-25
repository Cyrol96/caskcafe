<?php
$pageTitle = "Admin Dashboard | Comments";
include('./inc/header_admin.php');

echo '<h2>Viewing individual comment';
if (empty($_GET['commentnum'])) {
    echo "<p class='error'>That is not a valid comment number. Please try again!</p>";

} else if (is_readable("comments/" . $_GET['commentnum'] . ".txt")) {
    $commentFields = fopen("comments/" . $_GET['commentnum'] . ".txt", "r");
    $name = fgets($commentFields);
    $email = fgets($commentFields);
    $time = fgets($commentFields);
    $time = date('m/d/y', $time) . " at " . date('g:i:s A', $time);
    $subject = fgets($commentFields);
    $comment = fgets($commentFields);
    $comment = "";
    while (!feof($commentFields)) {
    $comment .= fgets($commentFields);
    }
    fclose($commentFields);

    // output to page
    echo "<h3>A comment was submitted from the web site:</h3><table>";
    echo "<tr><td>Name:</td></tr><td>$name</td></tr>";
    echo "<tr><td>Email:</td><a href='mailto:$name<$email>?
    subject=RE:$subject'>$email</a></td></tr>";
    echo "<tr><td>Time:</td></tr><td>$time</td></tr>";
    echo "<tr><td>Subject:</td></tr><td>$subject</td></tr>";
    echo "<tr><td valign='top'>Comment:</td></tr><td>$comment</td></tr>";

} else {
    echo "<p><span> class='error'>No comment directory to check(the comment file seems to be empty or missing)</p>";
}

include('./inc/footer_admin.php');
?>