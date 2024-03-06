<?php

require('model/database.php'); 
require('model/category_db.php');
require('model/item_db.php'); 

$categoryID = filter_input(INPUT_POST, "categoryID", FILTER_VALIDATE_INT);
$categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_SPECIAL_CHARS);
$itemID = filter_input(INPUT_POST, "itemID", FILTER_VALIDATE_INT);
$itemTitle = filter_input(INPUT_POST, "itemTitle", FILTER_SANITIZE_SPECIAL_CHARS);
$itemDesc = filter_input(INPUT_POST, "itemDesc", FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_SPECIAL_CHARS);



if (!$action) 
{
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_SPECIAL_CHARS);
    
    // page is first opened, no category has been created yet, allow user to enter the first category
    if (!$action) 
    {
        echo "No category has been created yet.";
        include("view/first_category.php");
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////

switch ($action) 
{
    case 'list_categories': 
        $categories = get_categories();
        include('view/category_list.php'); 
        include('view/item_list.php'); 
    break;

    case 'add_category':
        add_category($categoryName); 
        header("Location: .?action=list_categories");
        break;


    case 'delete_category':
        if ($categoryID) 
        { 
            delete_category($categoryID); 
            header("Location: .?action=list_categories");
        } 
        // else 
        // {      
        //     $error = "Missing or incorrect category id."; 
        //     include('view/error.php');
        // }
    break;


////////////////////////////////////////////////////////////////////////////////////////////////////////////


    case 'list_items':
        $items = get_items_by_category($categoryID); 
        include('view/category_list.php'); 
        include('view/item_list.php'); 
    break;

    case 'add_item':
    {
        // if ($categoryID == NULL || $categoryID == FALSE || $itemID == NULL || $itemTitle == NULL || $itemDesc == NULL) 
        // { 
        //     $error = "Invalid item data. Check all fields and try again."; 
        //     include('view/error.php');
        // } 

            add_item($itemTitle, $itemDesc); 
            header("Location: .?action=list_items");
    }
    break;

    case 'delete_item':
    { 
        // if ($categoryID == NULL || $categoryID == FALSE || $itemID == NULL || $itemID == FALSE) 
        // { 
        //     $error = "Missing or incorrect item id or category id."; 
        //     include('view/error.php');
        // } 

            delete_item($itemID); 
            header("Location: .?categoryID=$categoryID"); 

    }
    break;
}

?>