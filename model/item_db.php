<?php

function get_items_by_category($categoryID) 
{ 
    global $db;
   
    if ($categoryID == NULL || $categoryID == FALSE)
    {  
        $query = 'SELECT * FROM todoitems;';
    }
    else
    { 
        $query = 'SELECT * FROM todoitems WHERE todoitems.categoryID = :categoryID ORDER BY ItemNum'; 
    }
    
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID); 
    $statement->execute();
    $items = $statement->fetchAll(); 
    $statement->closeCursor(); 
    return $items;
}

function get_item($itemID) 
{ 
    global $db;
    $query = 'SELECT * FROM todoitems WHERE ItemNum = :itemID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID); 
    $statement->execute(); 
    $item = $statement->fetch(); 
    $statement->closeCursor(); 
    return $item;
}

function add_item($itemTitle, $itemDesc) 
{ 
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description) 
    VALUES (:itemTitle, :itemDesc)';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemTitle', $itemTitle); 
    $statement->bindValue(':itemDesc', $itemDesc); 
    $statement->execute();
    $statement->closeCursor();
} 

function delete_item($itemID) 
{ 
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID); 
    $statement->execute(); 
    $statement->closeCursor();
}

?>