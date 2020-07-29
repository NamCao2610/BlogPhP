<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');

$posts = selectAll('posts', ['published' => 1]);
?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $post['title']; ?> | Nam Cao</title>
    <!--Link fontawesome-->
    <script src="https://kit.fontawesome.com/71263d29e3.js" crossorigin="anonymous"></script>
    <!--Link google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />
    <!--Link css custom-->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <!-- Facebook plugin SDK -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="xQms4lGh">
    </script>
    <!-- // Facebook plugin SDK -->

    <!-- Includes Header  -->
    <?php include(ROOT_PATH . "/app/includes/header.php");  ?>
    <!-- //Includes Header -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix">
            <!-- Main content wrapper -->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title']; ?></h1>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?>
                    </div>
                </div>
            </div>
            <!-- // Main content wrapper -->

            <!-- sidebar -->
            <div class="sidebar single">

                <!-- Embed Facebook Plugin -->
                <div class="section section-fb fb-page" data-href="https://www.facebook.com/MTP.Fan" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/MTP.Fan" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/MTP.Fan">M-TP</a>
                    </blockquote>
                </div>
                <!-- //Embed Facebook Plugin -->

                <!-- Section Pupular-->
                <div class="section popular">
                    <h2 class="section-title">Phổ biến</h2>

                    <?php foreach ($posts as $p) : ?>

                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                            <a href="single.php?id=<?php echo $p['id']; ?>" class="title">
                                <h4><?php echo $p['title']; ?></h4>
                            </a>
                        </div>

                    <?php endforeach; ?>


                </div>
                <!-- //Section Pupular-->
                <!-- Section topics-->
                <div class="section topics">
                    <h2 class="section-title">Chủ đề</h2>
                    <ul>
                        <?php foreach ($topics as $topic) : ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- // Section topics-->
            </div>
            <!-- // sidebar -->
        </div>
        <!-- // Content -->
    </div>
    <!-- // Page Wrapper -->

    <!-- Includes Footer  -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- //Includes Footer  -->

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!--Slick JS-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!--Custom script-->
    <script src="./js/scripts.js"></script>
</body>

</html>