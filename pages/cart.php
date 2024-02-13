<?php

  // make sure the user is logged in
  if ( !isUserLoggedIn() ) {
    // if is not logged in, redirect to /login page
    header("Location: /login");
    exit;
  }

   $database = connectToDb();


   $sql ="SELECT cart.*,
          products.image_url,
          products.name,
          products.price
          FROM cart 
          JOIN products
          ON cart.product_id = products.id
          WHERE cart.user_id = :user_id AND order_id IS NULL";

   $query = $database->prepare($sql);

   $query->execute([
    'user_id' => $_SESSION['user']['id']
]);
   
   // fetch the data from query
   $products_in_cart = $query->fetchAll();

   $total_in_cart = 0;

   require "parts/header.php"; 
   require "parts/navbar.php"; 
?>
  <style>
    * {   
  font-family: "Manrope", sans-serif;
  }
#cart{
  background-image: url(../Images/backgroundTOPO.webp);
  background-size: cover;
  background-position: center center;
  padding-left: 0px;
  padding-right: 0px;
  padding-top:50px;
  padding-bottom:50px;
}
</style>
<section id="cart">
<div class="container p-5" style="max-width: 1500px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1 text-dark">My Cart</h1>
      </div>
      <div class="card mb-2 p-4 bg-secondary">
        <?php require "parts/message_success.php" ?>
        <table class="table text-center">
          <thead class="text-white">
            <tr>
              <th scope="col">Keyboard Name</th>
              <th scope="col">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="text-white">
          <?php if ( empty( $products_in_cart ) ) : ?>
            <tr>
            <td colspan="5" class="text-center">Your cart is empty.</td>
            </tr>
          <?php else : ?>
            <?php foreach( $products_in_cart as $product ) : 
                  // get the total price of the product
                  $product_total =  $product['price'] * $product['quantity'];
                  // add the total price to the total in cart
                  $total_in_cart += $product_total;
            ?>
              <tr>
                <th scope="row"><?= $product['name']; ?></th>
                    <td>MYR <?= $product['price']; ?></td>
                    <td>
                    <img src="/<?= $product["image_url"]; ?>" width="150px"class="mt-1" />
                    </td> 
                    <td><?= $product['quantity']; ?></td>
                    <td>MYR <?php echo $product_total; ?></td>
            <td>
                <div class="buttons">
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
                                This action is not reversible.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <form method= "POST" action="/cart/delete">
                                        <input type="hidden" name="cart_id" value= "<?= $product['id']; ?>" />
                                        <button type="submit" id="" class="btn btn-danger">Yes, Delete</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <tr class="d-flex justify-content-end align-items-right" >
            <td colspan="3" class="text-end">Total</td>
            <td> MYR<?=$total_in_cart; ?> </td>
          </tr>
          <?php endif; // end - empty( $products_in_cart ) ?>
                </tbody>
            </table>

        </div>

        <div class="d-flex justify-content-between align-items-center my-3">
                    <a href="/products" class="btn btn-secondary border border-radius btn-sm">Continue Shopping</a>
                    <!-- if there is product in cart, then only display the checkout button -->
                    <?php if ( !empty( $products_in_cart ) ) : ?>
                        <form
                            method="POST"
                            action="cart/check_out"
                            >
                            <input type="hidden" name="total_amount" value="<?= $total_in_cart; ?>" />
                            <button type="submit" class="btn btn-secondary border border-radius btn-sm">Checkout</a>
                        </form>
                    <?php endif; ?>
                </div>

    </div>
              </section>

  <?php require "parts/footer.php"; ?>



 
