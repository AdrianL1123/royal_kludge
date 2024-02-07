<?php 

    $database = connectToDB();

    require "parts/header.php";
    require "parts/navbar.php";
?>
<style>
    .productRK{
        color:#000000;
        text-decoration:underline;
        display:flex;
        justify-content:center;
        align-items:center;
    }

</style>

<div id="products">
    <div class="container mx-auto pt-5 pb-2" style="max-width: 1400px">
        <div class="allproducts">
            <h1>RK KEYBOARDS<h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product):?>
                <div class="col">
        <div class="card h-100 border-0">
          <img
            src="<?= $product['image_url']; ?>"
            class="card-img-top"
            alt="product <?= $product['id']; ?>"
            style="height: 420px;"
          />
          <div class="container">
            <h5 class="card-title"><?= $product['name']; ?></h5>
            <p class="card-text">RM
              <?= $product['price']; ?>
            </p>
            <ul>
                <li><?= $product['switch']; ?></li>
                <li><?= $product['backlight']; ?></li>
                <li><?= $product['Hot-swappable']; ?></li>
            </ul>
          <div class="text-end">
            <a href="/post?id=<?= $product['id']; ?>" class="btn btn-dark btn-sm my-2">Read More</a>
          </div>
          </div>
          <form method="POST" action="">
          <input 
                    type="hidden"
                    name="product_id"
                    value="<?php echo $product['id']; ?>"
                  >
          <div class="d-grid">
            <button type="submit" id="btnstyle" class="btn btn-danger">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?php require "parts/footer.php"?>