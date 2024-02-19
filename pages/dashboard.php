<?php 
  // make sure the user is logged in
  if ( !isAdminOrEditor() ) {
    // if is not logged in, redirect to /login page
    header("Location: /login");
    exit;
  }
require "parts/header.php"; 
require "parts/navbar.php";?>

<style>
    * {   
  font-family: "Manrope", sans-serif;
  }
#dashboardBg {
  background-image: url(../Images/backgroundTOPO.webp);
  background-size: cover;
  background-position: center center;
  padding-left: 0px;
  padding-right: 0px;
  padding-top:50px;
  padding-bottom:50px;
}
</style>
<section id="dashboardBg">
  <div class="container mx-auto my-5" style="max-width: 800px">
    <h1 class="h1 mb-4 text-center">Dashboard</h1>
    <?php require "parts/message_success.php"; ?>
    <div class="row">
   
      <!-- manage posts -->
      <div class="col">
        <div class="card mb-2">
          <div class="card-body bg-secondary text-white">
            <h5 class="card-title text-center">
              <div class="mb-1">
                <i class="bi bi-pencil-square" style="font-size: 3rem"></i>
              </div>
              Manage Products
            </h5>
            <div class="text-center mt-3">
              <a href="/manage-products" class="btn btn-sm text-white border border-radius"
                >Access</a
              >
            </div>
          </div>
        </div>
      </div>
      <!-- manage users -->

<?php if (UserIsAdmin()) : ?>
      <div class="col">
        <div class="card mb-2">
          <div class="card-body bg-secondary text-white">
            <h5 class="card-title text-center">
              <div class="mb-1">
                <i class="bi bi-universal-access" style="font-size: 3rem"></i>
              </div>
              Manage Users
            </h5>
            <div class="text-center mt-3">
              <a href="/manage-users" class="btn text-white border border-radius btn-sm"
                >Access</a
              >
            </div>
          </div>
        </div>
      </div><!-- .col -->
<?php endif ; ?>


    </div>
    <div class="mt-4 text-center">
      <a href="/" class="btn btn-sm bg-secondary text-white border border-radius"
        ><i class="bi bi-arrow-left"></i> Back</a
      >
    </div>
  </div>
</section>
<?php require "parts/footer.php"; ?>