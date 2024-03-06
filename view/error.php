<?php include("header.php") ?>

<p><?php echo $error_message ?></p>

<?php
    // the link redirects to the last-visited page
    $goBack = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href='$goBack'>Go back to task list</a>";
?>

<?php include("footer.php") ?>


