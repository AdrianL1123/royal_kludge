<?php require "parts/header.php"; ?>
<?php require "parts/navbar.php"; ?>
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
<div class="container my-5 mx-auto" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center signupWord">Sign Up a New Account</h1>
      <div class="card p-4 bg-secondary">
      <?php require "parts/message_error.php"; ?>
        <form method="POST" action="/auth/signup">
          <div class="mb-3">
            <label for="name" class="form-label text-white">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label text-white">Email address</label>
            <input type="email" class="form-control" id="email" name="email" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
            />
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label text-white"
              >Confirm Password</label
            >
            <input
              type="password"
              class="form-control"
              id="confirm_password"
              name="confirm_password"
            />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-fu text-white">
              Sign Up
            </button>
          </div>
        </form>
      </div>

      <!-- links -->
      <div
        class="d-flex justify-content-center align-items-center gap-3 mx-auto pt-3"
      >
        <a href="/login" class="text-decoration-none small text-dark bg-white p-1"
          >Already have an account? Login here
          <i class="bi bi-arrow-right-circle text-dark"></i
        ></a>
      </div>
    </div>
</section>
    <?php require "parts/footer.php" ?>
