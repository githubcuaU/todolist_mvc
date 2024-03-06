
<section>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add_item">
        <label class="add-label" for="newItemTitle">Task Title:</label>
        <input class="add-form" type="text" id="newItemTitle" name="itemTitle" required>
        <label class="add-label" for="itemDesc">Task Description:</label>
        <input class="add-form" type="text" id="itemDesc" name="itemDesc" required>
        <button class="add-btn">Add</button>
    </form>
</section>



<?php if (($items)) 
{ ?>
    <?php
    foreach ($items as $item) : ?>
        
        <?php 
            if ($categoryName == NULL || $categoryName == FALSE) 
            { 
                $categoryName = "None";
            }
            else
            {
                echo $categoryName;
            }
        ?>

        <tr>            
            <form action="." method="POST">
                <input type="hidden" name="action" value="update_item">
                <input type="hidden" name="itemID" value="<?= $item["ItemNum"] ?>">
                <input class="task-form-title" type="text" name="itemTitle" value="<?php echo $item["Title"] ?>">
                <input class="task-form-desc" type="text" name="itemDesc" value="<?php echo $item["Description"] ?>">
                <button class="update-btn">Update</button>
            </form>
                    
            <form action="." method="POST">
                <input type="hidden" name="action" value="delete_item">
=                <input type="hidden" name="itemID" value="<?php echo $item["ItemNum"] ?>">
                <button class="delete-btn">Delete</button>
            </form>
        </tr>
        
    <?php endforeach; ?>
<?php }

else 
{ ?>
        <p>Task list is empty.</p>
<?php } ?>

<?php include("footer.php") ?>









