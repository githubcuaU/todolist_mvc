<?php include("header.php") ?>

<!-- page is first opened, no category has been created yet
    allow user to enter the first category -->

<section>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add_category">
        <label class="add-label" for="newCategoryName">Category:</label>
        <input class="add-form" type="text" id="newCategoryName" name="categoryName" required>
        <button class="add-btn">Add</button>
    </form>

</section>

<?php include("footer.php") ?>
