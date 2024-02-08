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
    $switch = $_POST["switch"];
    $backlight = $_POST["backlight"];
    $hot_swappable = $_POST["hot_swappable"];
    $status = $_POST["status"];

    // capture the image file
    $image_url = $_FILES["image_url"];


    // make sure that you only upload if image is available
    if ( !empty( $image_url['name'] ) ) {
        $target_dir = "uploads/";
        // add the image name to the uploads folder path
        $target_path = $target_dir . time() . '_' . basename( $image_url['name'] ); // uploads/892938829293_image.jpg
        // move the file to the uploads folder
        move_uploaded_file( $image_url["tmp_name"], $target_path );
    }


    // Step 3: error checking
    // 3.1 make sure all the fields are not empty
    if ( empty( $name ) || empty( $price ) || empty( $switch ) || empty( $backlight ) || empty( $hot_swappable ) || empty( $status )) {
        setError( 'All the fields are required', '/manage-products-add');
    } else { 
            // Step 5: update the user data
            $sql = "INSERT INTO products (`name`, `price`, `image_url`, `switch`, `backlight`, `hot_swappable`, `status`, `user_id`) 
                    VALUES (:name, :price, :image_url, :switch, :backlight, :hot_swappable, :status, :user_id)";
            $query = $database->prepare( $sql );
            $query->execute([
                'name' => $name,
                'price' => $price,
                'image_url' => !empty( $image_url['name'] ) ? $target_path : '',
                'switch' => $switch,
                'backlight' => $backlight,
                'hot_swappable' => $hot_swappable,
                'status' => $status,
                
                'user_id' => $_SESSION["user"]['id']
            ]);

            // Step 6: redirect back to /manage-posts page
            $_SESSION["success"] = "Product has been added successfully.";
            header("Location: /manage-products");
            exit;   

    } // end - step 3