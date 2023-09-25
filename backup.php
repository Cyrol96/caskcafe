<?php

  // header
$page_title = 'Admin Dashboard | Backup';
include './inc/header_admin.php';

$source = "comments";
$destination = "backup";

if (!file_exists("backup"))
    mkdir("backup");

  // check if source folder is a directory
if (is_dir($source)) {

    $dirEntries = scandir($source);
    foreach ($dirEntries as $entry) {
        if (strpos($entry, '.txt') == TRUE) {
        copy ("$source/" . $entry, "$destination/" . $entry);
        }
    }

      // success message
    echo "<p class='success'>The comment file(s) were successfully backed up!</p>";

} else {

    // failure message
    echo "<p class='error'>The comment file(s) could not be backed up.</p>";
}

include './inc/footer_admin.php';