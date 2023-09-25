<?php

  // header
  $page_title = 'Admin Dashboard | Comments';
  include './inc/header_admin.php';

  echo '<p>Following is a list of current comments from the Contact Us form:</p>';

  echo "<p>(Click the button for a particular comment which are timestamps for when it was entered.)</p>";

  echo "<hr>";

  $dir = "comments";
  $check = 0;
  $nothing = "";

  if (is_dir($dir)) {
    $dirEntries = scandir($dir, 1);
    if (!empty($dirEntries)) {
      foreach ($dirEntries as $entry) {
        if (strpos($entry, '.txt') == TRUE) {
          $entry = substr($entry, 0, -4);
          $check = print "<a class='w3-btn w3-hover-light-green w3-round-xxlarge' style='margin: 5px;' href='viewcomment.php?commentnum=$entry'>" . $entry . "</a>";
        } else {
          $nothing = "<p><span class='error'>Oh No! There are no comment files to display!</span></p>";
        }
        if ($check != 1) {
          echo "$nothing";
        }
      }
    } else {
      echo "<p class='error'>No Comments directory to check.</p>";
    }
    echo '<hr>';
  }


  include './inc/footer_admin.php';
?>