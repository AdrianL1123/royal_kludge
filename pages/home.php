<?php
    // Step 1: connect to the database
    $database = connectToDB();
 
?>  

<?php require "parts/header.php"; ?>
<?php require "parts/navbar.php"; ?>
   <div class="d-flex justify-content-center align-items-center flex-column">
   </div> 
<section id="carouselPage">
<div class="container-fluid">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../Images/carousel2.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../Images/carousel3.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../Images/carousel4.jpeg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
  </section>
  <style>
    .imgsize {
      padding:10px;
      height:auto;
      width:30%;
      object-fit:cover;
    }
  </style>
  <div id ="View Products">
    <div class="container mt-5">
      <h2>More From Royal Kludge</h2>
      <div class="">       
          <div class="row">
              <div class="card border-0 mb-5 pb-5">
               <div class="card-body pb-3 d-flex justify-content-center align-items-center">
                  <img class="imgsize" src="../Images/moreProducts.webp">
                  <img class="imgsize" src="../Images/moreProducts2.avif">
                  <em><p></p></em>
                  <img class="imgsize" src="../Images/moreProducts3.jpeg">
                </div>
                <a href="/products" id="btnstyle" class="btn btn-dark">View More...</a>
              </div>
             </div>
        </div>
      </div>
    </div>
  </div>
<?php require "parts/footer.php"; ?>
