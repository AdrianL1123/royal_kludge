<?php

    $database = connectToDB();

    $product_id = $_POST["product_id"]; 

    $sql =  "INSERT INTO cart (`product_id`, `quantity`, `user_id`) VALUES (:product_id, :quantity, :user_id)";
    
    $query = $database->prepare($sql);

    $query->execute([
        'product_id' => $product_id,
        'quantity' => 1,
        'user_id' => $_SESSION['user']['id']
      ]);

    // 4 - fetch 
    $product = $query->fetch(); // get only one row of data

        //redirect to productr_description page
        header("Location: /cart");
        exit;

?>