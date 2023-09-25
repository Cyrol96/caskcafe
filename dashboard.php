<?php
// header
    $page_title = 'Admin Dashboard | Comments';
include './inc/header_admin.php';

    echo '<p>Following is a list of current comments from the Contact Us form:</p>';

    if (is_readable("./comments/comments.txt")) {

    // file is readable so display data
    echo "<pre>";
    readfile("./comments/comments.txt");
    echo "</pre>";
    
} else {

    // file is not readable
    echo "<p class='error'>Cannot read from the [comments] file.</p>";

}

    include './inc/footer_admin.php';