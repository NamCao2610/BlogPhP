<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Users</title>
    <!--Link fontawesome-->
    <script src="https://kit.fontawesome.com/71263d29e3.js" crossorigin="anonymous"></script>

    <!--Link google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />

    <!--Link css custom-->
    <link rel="stylesheet" href="../../assets/css/style.css" />

    <!--Link css admin-->
    <link rel="stylesheet" href="../../assets/css/admin.css" />
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
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Them nguoi dung</a>
                <a href="index.php" class="btn btn-big">Quan li nguoi dung</a>
            </div>
            <div class="content">
                <h2 class="page-title">Manage Users</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php");  ?>

                <table>
                    <thead>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>

                        <?php foreach ($admin_users as $key => $user) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $user['id']; ?>" class="delete">delete</a></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- //Admin Content -->
    </div>
    <!-- // Page Wrapper -->

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!--Custom script-->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>