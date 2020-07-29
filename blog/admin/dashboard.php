<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!--Link fontawesome-->
    <script src="https://kit.fontawesome.com/71263d29e3.js" crossorigin="anonymous"></script>

    <!--Link google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />

    <!--Link css custom-->
    <link rel="stylesheet" href="../assets/css/style.css" />

    <!--Link css admin-->
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
    <!-- admin header here -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left sidebar -->

        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

        <!-- Left sidebar -->

        <!-- Admin Content -->
        <div class="admin-content">

            <div class="content">
                <h2 class="page-title">Quan li tai khoan</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php");  ?>


            </div>
        </div>
        <!-- //Admin Content -->
    </div>
    <!-- // Page Wrapper -->

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

    <!--Custom script-->
    <script src="../assets/js/scripts.js"></script>
</body>

</html>