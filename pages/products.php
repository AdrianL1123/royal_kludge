
<?php
  // make sure the user is logged in
  if ( !isUserLoggedIn() ) {
    // if is not logged in, redirect to /login page
    header("Location: /login");
    exit;
  }
  // Step 1: connect to the database
  $database = connectToDB();
   // Step 2: load the data from the database 
   $sql = "SELECT * FROM products ORDER BY id DESC";
   $query = $database->prepare ( $sql );
    // 3. execute
   $query->execute();
    // 4. fetchAll
    $products = $query->fetchAll();
    require "parts/navbar.php"; 
    require "parts/header.php"; 
?>      
<style>
      * {   
  font-family: "Manrope", sans-serif;
  }
#productBg {
  background-image: url(../Images/backgroundTOPO.webp);
  background-size: cover;
  background-position: center center;
  padding-left: 0px;
  padding-right: 0px;
  padding-top:50px;
  padding-bottom:50px;
}
</style>
<section id="productBg">
    <div class="container mx-auto my-5" style="max-width: 1200px;">
      <h1 class="h1 mb-4 text-center">RK Keyboards</h1>
      <div class="row d-flex align-items-center justify-content-center row-cols-1 row-cols-md-4 gap-3">
      <?php foreach ( $products as $product ) : ?>
        <div class="card mb-2 text-center bg-secondary text-white border border-radius">
            <div class="card-body">
            <?php if ( !empty( $product["image_url"] ) ) : ?>
           <img src="/<?= $product["image_url"]; ?>" class="img-fluid"/>
            <?php endif; ?>
            <p class="card-title fs-3"><?= $product['name']; ?></p>
            <p class="card-text">MYR <?= $product['price']; ?></p>
<ul>
        <!-- switch -->
    <li><?php if ( $product["switch"] === 'Blue Switch' ) : ?>
            <p class="card-text">
            Switch:<span class="badge bg-primary">Blue</span> 
            </p>
          <?php endif; ?>

           <?php if ( $product["switch"] === 'Red Switch' ) : ?>
            <p class="card-text">
            <p>Switch:<span class="badge bg-danger">Red</span></p>
            </p>
    </li><?php endif; ?>
        <!-- switch -->

        <!-- backlight -->
      <li><?php if ( $product["backlight"] === 'Yes' ) : ?>
            <p class="card-text">
            <p>Backlight:  <span class="badge bg-success">Yes</span> </p>
            </p>
            <?php endif; ?>

           <?php if ( $product["backlight"] === 'No' ) : ?>
            <p class="card-text">
            <p>Backlight:  <span class="badge bg-danger">No</span> </p>
           
      </li><?php endif; ?>
        <!-- backlight -->

        <!-- hot-swappable -->
        <li><?php if ( $product["hot_swappable"] === 'No' ) : ?>
            <p class="card-text">
            <p>Hot Swappable:  <span class="badge bg-danger">No</span> </p>
           
            </p>
         <?php endif; ?>

          <?php if ( $product["hot_swappable"] === 'Yes' ) : ?>
            <p class="card-text">
            <p>Hot Swappable:  <span class="badge bg-success">Yes</span> </p>  
            </p>
        </li><?php endif; ?>
        <!-- hot-swappable -->

        <!-- status -->
        <li> <?php if ( $product["status"] === 'No Stock' ) : ?>
            <p class="card-text">
            <p>Status: <span class="badge bg-danger">No Stock</span> </p>
            </p>
         <?php endif; ?>

        <?php if ( $product["status"] === 'In Stock' ) : ?>
            <p class="card-text">
            <p>Status: <span class="badge bg-success">In Stock</span> </p>
            </p>
        </li><?php endif; ?>
        <!--status -->
</ul>
          <div class="text-center">
            <a href="/product_description?id=<?= $product['id']; ?>" class="btn btn-secondary border border-radius btn-sm my-2">Read More</a>
          </div>
           </div>
         </div>
        <?php endforeach; ?>
      </div>
    </div>
        </section>
    <?php require "parts/footer.php" ?>