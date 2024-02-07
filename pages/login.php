<?php 
 require "parts/header.php";
 require "parts/navbar.php"; 
 ?>
<style>
  * {   
  font-family: "Manrope", sans-serif;
  }
#signupBg {
  background-image: url(../Images/backgroundTOPO.webp);
  background-size: cover;
  background-position: center center;
  padding-left: 0px;
  padding-right: 0px;
  padding-top:50px;
  padding-bottom:50px;
}
.signupWord {
  padding-top: 10px;
  color: black;
}
</style>
<section id="signupBg">
<div class="container my-5 mx-auto" style="max-width: 500px">
  <h1 class="h1 mb-4 text-center">Login</h1>
  <div class="card p-4 bg-secondary">
    <?php require "parts/message_error.php"; ?>
    <?php require "parts/message_success.php"; ?>
    <form method="POST" action="/auth/login">
      <div class="mb-2">
        <label for="email" class="visually-hidden">Email</label>
        <input
          type="text"
          class="form-control"
          id="email"
          name="email"
          placeholder="email@example.com"
        />
      </div>
      <div class="mb-2">
        <label for="password" class="visually-hidden">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          name="password"
          placeholder="Password"
        />
      </div>
      <div class="d-grid">
        <button type="submit" class="btn text-white">Login</button>
      </div>
    </form>
  </div>

  <!-- links -->
  <div
    class="d-flex justify-content-center align-items-center gap-3 mx-auto pt-3 "
  >
    <a href="/signup" class="text-decoration-none small text-dark bg-white p-1"
      >Don't have an account? Sign up here
      <i class="bi bi-arrow-right-circle text-dark"></i
    ></a>
  </div>
</div>
</section>
<?php require "parts/footer.php" ?>
