<!-- header  -->
<?php
    // Step 1: connect to the database

   
?>  
<header>
  <nav class="navbar navbar-expand-lg">
    <div id="font-hero" class="container-fluid px-5">
      <a class="logo navbar-brand link-dark" href="/">
        <img src="../Images/rkimageBG-removebg-preview.png" width="150px" />
      </a>
      <?php if ( isset( $_SESSION["user"] ) ) : ?>
      <span class="fs-5 text-dark"><p>User: <?= $_SESSION["user"]["name"]; ?> </p></span>
      <?php endif ; ?>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-end"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/products">ALL PRODUCTS</a>
          </li>
         <?php if ( isAdminOrEditor() ) : ?>
         <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/dashboard">DASHBOARD</a>
          </li>
        <?php endif ; ?>
          <?php if ( isset( $_SESSION["user"] ) ) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout">LOGOUT</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="/signup">START HERE</a>
          </li>
          <?php endif ; ?>

          <li class="nav-item">
            <a class="nav-link fs-4" href="/">
              <i class="bi bi-search"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link fs-4" href="/cart">
              <i class="bi bi-cart-plus"></i>
              <span><sup>0</sup></span>
            </a>
          </li>
        </ul>
        <!-- navbar collapse -->
      </div>
      <!-- container  -->
    </div>
  </nav>
</header>
<!-- header  -->