<?php 


  // load the database
  $database = connectToDB();

  // get the user id from the url query
  $id = $_GET["id"];

  // load the user data based on the provided id
  // 1 - sql command (recipe)
  $sql = "SELECT * FROM products WHERE id = :id";
  // 2 - prepare
  $query = $database->prepare($sql);
  // 3 - execute
  $query->execute([
      'id' => $id
  ]);
  // 4 - fetch 
  $product = $query->fetch(); // get only one row of data

require "parts/header.php" ?>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Products</h1>
      </div>
      <div class="card mb-2 p-4">
      <?php require "parts/message_error.php"; ?>
        <form 
        class="row g-3"
        method="POST" 
        action="/products/edit" 
        enctype="multipart/form-data"
        >
        <div class="col-md-6">
            <label class="form-label">Keyboard Name</label>
            <input 
            type="name" 
            class="form-control" 
            id="product-name" 
            name="name" 
            value="<?= $product["name"]; ?>"
            />
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Price</label>
            <input
              type="text" 
            class="form-control" 
            id="product-price" 
            name="price"
            value="<?= $product["price"]; ?>"
            />
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Switch</label>
            <select id="inputState" class="form-select" name="switch">
            <option value="Red Switch" <?= $product["switch"] === 'Red Switch' ? "selected" : "" ?>>
            Red Switch
            </option>
            <option value="Blue Switch" <?= $product["switch"] === 'Blue Switch' ? "selected" : "" ?>>
            Blue Switch
            </option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Hotswappable</label>
            <select id="inputState" class="form-select" name="hot_swappable">
            <option value="Yes" <?= $product["hot_swappable"] === 'Yes' ? "selected" : "" ?>>
            Yes
            </option>
            <option value="No" <?= $product["hot_swappable"] === 'No' ? "selected" : "" ?>>
            No
            </option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Backlight</label>
            <select id="inputState" class="form-select" name="backlight">
            <option value="Yes" <?= $product["backlight"] === 'Yes' ? "selected" : "" ?>>
            Yes
            </option>
            <option value="No" <?= $product["backlight"] === 'No' ? "selected" : "" ?>>
            No
            </option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Status</label>
            <select id="inputState" class="form-select" name="status">
            <option value="In Stock" <?= $product["status"] === 'In Stock' ? "selected" : "" ?>>
            In Stock
            </option>
            <option value="No Stock" <?= $product["status"] === 'No Stock' ? "selected" : "" ?>>
            No Stock
            </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <div>
              <input type="file" name="image_url" />
              <?php if ( !empty( $product["image_url"] ) ) : ?>
                <div>
                  <img src="/<?= $product["image_url"]; ?>" width="150px" class="mt-1" />
                  <input type="hidden" name="original_image" value="<?= $product["image_url"]; ?>" />
                </div>
              <?php endif; ?>
             </div>
          </div>

          <div class="text-end">
            <input
              type="hidden"
              name="product_id"
              value="<?= $product["id"]; ?>"
              />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>
    <?php require "parts/footer.php" ?>