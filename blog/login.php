<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestOnly();
?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!--Link fontawesome-->
  <script src="https://kit.fontawesome.com/71263d29e3.js" crossorigin="anonymous"></script>
  <!--Link google font-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />
  <!--Link css custom-->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <!-- Includes Header  -->
  <?php include(ROOT_PATH . "/app/includes/header.php");  ?>
  <!-- //Includes Header -->

  <!-- FORM CONTENT -->
  <div class="auth-content">
    <form action="login.php" method="post">
      <h2 class="form-title">Login</h2>

      <!-- Xuat loi -->
      <?php include(ROOT_PATH . "/app/helpers/formErrors.php");  ?>

      <div>
        <label>Ten tai khoan:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input" />
      </div>

      <div>
        <label>Mat khau:</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input" />
      </div>

      <div>
        <button type="submit" name="login-btn" class="btn btn-big">
          Dang nhap
        </button>
      </div>

      <p>hoac <a href="<?php echo BASE_URL . '/register.php'; ?>">Dang ki</a></p>
    </form>
  </div>
  <!-- //FORM CONTENT -->

  <!--Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <!--Custom script-->
  <script src="assets/js/scripts.js"></script>
</body>

</html>