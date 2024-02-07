<?php
    // Step 1: connect to the database
    $database = connectToDB();
   // Step 2: load the data from the database 
   $sql = "SELECT * FROM products WHERE status = :status, backlight = :backlight, hot-swappable = :hot-swappable, switch = :switch ORDER BY id DESC";
   $query = $database->prepare($sql);
    // 3. execute
   $query->execute([
       'status' => 'no-stock',
       'backlight' => 'yes',
       'hot-swappable' => 'yes',
       'switch' => 'red-switch'
   ]);
    // 4. fetchAll
    $posts = $query->fetchAll();
    require "parts/navbar.php"; 
    require "parts/header.php"; 
?>     
    <div class="container mx-auto my-5" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">RK Keyboards</h1>
      <?php foreach ( $products as $product ) : ?>
        <div class="card mb-2 text-center">
            <div class="card-body">
            <img />
            <p class="card-title fs-3"><?= $product['name']; ?></p>
            <p class="card-text"><?= $product['price']; ?></p>

        <!-- switch -->
          <?php if ( $product["switch"] === 'blue-switch' ) : ?>
            <p class="card-text">
            <?= $product['switch']; ?>
            <p>Switch:</p>
            <span class="badge bg-primary">Blue</span>
            </p>
          <?php endif; ?>

           <?php if ( $product["switch"] === 'red-switch' ) : ?>
            <p class="card-text">
            <?= $product['switch']; ?>
            <p>Switch:</p>
            <span class="badge bg-danger">Red</span>
            </p>
           <?php endif; ?>
        <!-- switch -->

        <!-- backlight -->
            <?php if ( $product["backlight"] === 'yes' ) : ?>
            <p class="card-text">
            <?= $product['backlight']; ?>
            <p>Backlight:</p>
            <span class="badge bg-danger">Yes</span>
            </p>
            <?php endif; ?>

           <?php if ( $product["backlight"] === 'No' ) : ?>
            <p class="card-text">
            <?= $product['backlight']; ?>
            <p>Backlight:</p>
            <span class="badge bg-success">No</span></td>
           <?php endif; ?>
        <!-- backlight -->

        <!-- hot-swappable -->
          <?php if ( $product["hot-swappable"] === 'no' ) : ?>
            <p class="card-text">
            <?= $product['hot-swappable']; ?>
            <p>Hot-Swappable:</p>
            <span class="badge bg-danger">No</span>
            </p>
          <?php endif; ?>

           <?php if ( $product["hot-swappable"] === 'yes' ) : ?>
            <p class="card-text">
            <?= $product['hot-swappable']; ?>
            <p>Hot-Swappable:</p>
            <span class="badge bg-success">Yes</span>
            </p>
           <?php endif; ?>
        <!-- hot-swappable -->

        <!-- status -->
          <?php if ( $product["status"] === 'no-stock' ) : ?>
            <p class="card-text">
            <?= $product['status']; ?>
            <p>Status:</p>
            <span class="badge bg-danger">No-Stock</span>
            </p>
          <?php endif; ?>

           <?php if ( $product["status"] === 'in-stock' ) : ?>
            <p class="card-text">
            <?= $product['status']; ?>
            <p>Status:</p>
            <span class="badge bg-success">In Stock</span>
            </p>
           <?php endif; ?>
        <!--status -->

        </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php require "parts/footer.php" ?>