<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add post</title>
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
                <a href="create.php" class="btn btn-big">Them bai viet</a>
                <a href="index.php" class="btn btn-big">Quan li bai viet</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add Post</h2>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php");  ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $title ?>" class="text-input" />
                    </div>
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body" value="<?php echo $body ?>"></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input" />
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>

                            <?php foreach ($topics as $key => $topic) : ?>
                                <?php if (!empty($topic_id) && $topic_id == $topic['id']) : ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div>

                        <?php if (empty($published)) : ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else : ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif; ?>


                    </div>
                    <div>
                        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                    </div>
                </form>
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
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>