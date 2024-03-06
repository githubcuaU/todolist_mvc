
<?php include("header.php") ?>

<section>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add_category">
        <label class="add-label" for="newCategoryName">Category:</label>
        <input class="add-form" type="text" id="newCategoryName" name="categoryName" required>
        <button class="add-btn">Add</button>
    </form>
</section>


<?php if (($categories)) 
{ ?>
<h3>Categories</h3>       

        <?php foreach ($categories as $category) : ?>
        
            <form action="." method="POST"> 
                <input type="hidden" name="action" value="show_category"> 
                <input type="hidden" name="categoryID" value="<?= $category["categoryID"] ?>">
                <input class="task-form-desc" type="text" name="categoryName" value="<?php echo $category["categoryName"] ?>">
            </form>

            <form action="." method="POST">
                <input type="hidden" name="action" value="delete_category">
                <input type="hidden" name="categoryID" value="<?php echo $category["categoryID"] ?>">
                <button class="delete-btn">Delete</button>
            </form>

        <?php endforeach; ?>    
<?php } 

else 
{ ?>
        <p>Category list is empty.</p>
<?php } ?>




