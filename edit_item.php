<?php
    session_start();
    
    include('config.php');

    $keys = array_keys($_POST);
    $_SESSION['ITEM_ID'] = $keys[2];

    // Update item name
    $sql = "UPDATE Item SET item_name=:item_name WHERE item_id=:id;";
    $prepared = $db1->prepare($sql);
    $prepared->execute(array('item_name' => $_POST['name'], 'id' => $_SESSION['ITEM_ID']));

    // Update item price
    $sql = "UPDATE Item SET price=:price WHERE item_id=:id;";
    $prepared = $db1->prepare($sql);
    $prepared->execute(array('price' => $_POST['price'], 'id' => $_SESSION['ITEM_ID']));

    // Redirect to quote page
    header("Location: quote.php");
?>