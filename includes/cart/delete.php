<?php

    $database = connectToDB();

    $cart_id = $_POST["cart_id"]; 

    $sql =  "DELETE FROM cart WHERE id =:id";
    $query = $database->prepare( $sql );
    $query->execute([
        'id' => $cart_id
      ]);

    $cart = $query->fetch(); // get only one row of data

        //redirect to productr_description page
        header("Location: /cart");
        exit;

?>