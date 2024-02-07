<?php

//    // make sure the user is logged in
//    if ( !isUserLoggedIn() ) {
//      // if is not logged in, redirect to /login page
//      header("Location: /login");
//      exit;
//    }
 
    // Step 1: connect to the database
    $database = connectToDB();

    // Step 2: get all the data from the form using $_POST
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image_url = $_POST["image_url"];
    $switch = $_POST["switch"];
    $backlight = $_POST["backlight"];
    $hotSwappable = $_POST["hot-swappable"];
    $status = $_POST["status"];
    


    // Step 3: error checking
    // 3.1 make sure all the fields are not empty
    if ( empty( $name ) || empty( $price ) || empty( $image_url ) || empty( $switch ) || empty( $backlight ) || empty( $hotSwappable ) || empty( $status )) {
        setError( 'All the fields are required', '/manage-products-add');
    } else { 
            // Step 5: update the user data
            $sql = "INSERT INTO products (`name`, `price`, `image_url`, `switch`, `backlight`, `hot-swappable`, `status`, `user_id`) 
                    VALUES (:name, :price, :image_url, :switch, :backlight, :hot-swappable, :status :user_id)";
            $query = $database->prepare( $sql );
            $query->execute([
                'name' => $name,
                'price' => $price,
                'image_url' => $image_url,
                'switch' => $switch,
                'backlight' => $backlight,
                'hot-swappable' => $hotSwappable,
                'status' => $status,
                
                'user_id' => $_SESSION["user"]['id']
            ]);

            // Step 6: redirect back to /manage-posts page
            $_SESSION["success"] = "User post has been added successfully.";
            header("Location: /manage-products");
            exit;   

    } // end - step 3