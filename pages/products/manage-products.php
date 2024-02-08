<?php

// if ( !isAdminOrEditor() ) {
//     // if current user is not an admin, redirect to dashboard
//     header("Location: /");
//     exit;
//   }
 
$database = connectToDb();
$sql = "SELECT * FROM products";
$query = $database->prepare($sql);
$query->execute();

// fetch the data from query
$products = $query->fetchAll();

  require "parts/header.php";
  require "parts/navbar.php";
?>

<div class="container p-5" style="max-width: 1500px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1 text-dark">Manage Products</h1>
        <div class="text-end">
          <a href="/manage-products-add" class="btn btn-secondary btn-sm"
            >Add New Product</a>
        </div>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_success.php" ?>
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Keyboard Name</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col">Switch</th>
              <th scope="col">Hotswappable</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $products as $product ) { ?>
              <tr>
                <th scope="row"><?= $product['id']; ?></th>
                    <td>
                    <img src="/<?= $product["image_url"]; ?>" width="150px"class="mt-1" />
                    </td>         
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['price']; ?></td>
                  <td>
                <span class="
                <?php
                if($product["status"] == "No Stock"){
                    echo "badge bg-danger";
                } else if($product['status'] == "In Stock"){
                    echo "badge bg-success";
                }
                ?>"><?= $product['status']; ?></span>

                <td>
                <span class="<?php
                if($product["switch"] == "Red Switch"){
                    echo "badge bg-danger";
                } else if($product['switch'] == "Blue Switch"){
                    echo "badge bg-primary";
                }
                ?>"><?= $product['switch']; ?></span>
                </td>

                <td>
                <span class="<?php
                if($product["hot_swappable"] == "Yes"){
                    echo "badge bg-success";
                } else if($product['hot_swappable'] == "No"){
                    echo "badge bg-danger";
                }
                ?>"><?= $product['hot_swappable']; ?></span>
                </td>
            </td>
            <td class="d-flex justify-content-end align-items-center">
                <div class="buttons">
                    <a
                        href="/product?id=<?= $product['id']; ?>"
                        id="btnstyle"
                        class="btn btn-primary btn-sm me-2 <?= $product['status'] === 'pending' ? 'disabled' : ''?>"
                    ><i class="bi bi-eye"></i
                        ></a>
                    <a
                        href="/manage-products-edit?id=<?= $product['id']; ?>"
                        id="btnstyle"
                        class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                        ></a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $product['id']; ?>"id="btnstyle">
                        <i class="bi bi-trash"></i
                        >
                    </button>
                    <div class="modal fade" id="delete-modal-<?= $product['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete: <?= $product['name']; ?>?</h1>
                                    <button type="button" id="btnstyle" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body me-auto">
                                You're currently deleting <?= $product['name']; ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <form method= "POST" action="/product/delete">
                                        <input type="hidden" name="id" value= "<?= $product['id']; ?>" />
                                        <button type="submit" id="" class="btn btn-danger">Yes, Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
          </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
      <div class="text-center ">
        <a href="/manage" class="btn btn-dark btn-sm text-decoration-none"
          ><i class="bi bi-arrow-left"></i> Back to Manage</a
        >
      </div>
    </div>

<?php 
require "parts/footer.php"; 
?>
