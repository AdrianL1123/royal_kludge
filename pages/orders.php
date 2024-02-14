<?php
  if ( !isUserLoggedIn() ) {
    header("Location: /login");
    exit;
  }
    // connect to database
    $database = connectToDB();

    // get orders from orders table
    $sql ="SELECT * FROM orders
        WHERE user_id = :user_id";
         $query = $database->prepare( $sql );
         // execute
         $query->execute([
        
            'user_id' => $_SESSION['user']['id']
        ]);
    $orders = $query->fetchAll();

    require "parts/header.php";
    require "parts/navbar.php";

?>
<style>
#order{
  background-image: url(../Images/backgroundTOPO.webp);
  background-size: cover;
  background-position: center center;
  padding-left: 0px;
  padding-right: 0px;
  padding-top:50px;
  padding-bottom:50px;
  }
</style>
<section id="order">
    <div class="container mb-2 mx-auto" style="max-width: 1000px;">
      <div class="min-vh-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="text-dark"><?= $_SESSION['user']['name'] ?>'s Orders</h1>
        </div>

        <!-- List of orders placed by user  -->
        <table
          class="table table-bordered table-striped table-dark text-white"
        >
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Date</th>
              <th scope="col">Products Bought</th>
              <th scope="col">Total Amount</th>
            </tr>
          </thead>
          <tbody>
          <?php if ( !empty( $orders ) ) : ?>
            <?php foreach( $orders as $order ) : ?>
                <tr>
                <th scope="row"><?= $order['id']; ?></th>
                <td><?php echo $order['added_on']; ?></td>
                <td>
                    <ul class="list-unstyled">
                    <?php
                        $sql = "SELECT cart.*, 
                        products.name,
                        products.price 
                        FROM cart
                        JOIN products
                        ON cart.product_id = products.id
                        WHERE order_id = :order_id";

                        $query = $database->prepare($sql);

                        $query->execute([
                            'order_id' => $order['id'],
                        ]
                    );
                        $products_in_cart = $query->fetchAll();

                        foreach ( $products_in_cart as $product ) {
                            echo "<ul><li>{$product['name']} ({$product['quantity']})</li></ul>";
                        }
                    ?>
                    </ul>
                </td>
                <td>RM<?= $order['total_amount']; ?></td>
                </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">You have not placed any orders.</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>

        <div class="d-flex justify-content-center align-items-center ">
          <a href="/products" class="btn btn-secondary border border-radius btn-sm"
            >Continue Shopping</a
          >
        </div>
      </div>
    </div>
</section>

<?php require "parts/footer.php"; ?>