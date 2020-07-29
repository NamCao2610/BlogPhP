<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Bài viết gần đây';

//Neu chon tim kiem se ra post tim kiem neu chon topics se ra list post neu ko hien tat ca
if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "Bài viết bạn đang tìm kiếm bài viết cho chủ đề '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
  $postsTitle = "Bài viết bạn đang tìm kiếm cho '" . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}


?>
<!--Menu response-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Blog</title>
  <!--Link fontawesome-->
  <script src="https://kit.fontawesome.com/71263d29e3.js" crossorigin="anonymous"></script>
  <!--Link google font-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />
  <!--Link css custom-->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <!-- Include header here -->
  <?php include(ROOT_PATH . "/app/includes/header.php");  ?>
  <!-- //Include header here -->

  <!--Sau khi dang nhap thanh cong hien 1 thong bao -->
  <?php include(ROOT_PATH . "/app/includes/messages.php");  ?>


  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <!-- Trending Posts with couselo -->
    <div class="post-slider">
      <h1 class="slider-title">Bài viết nổi bật</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

      <div class="post-wrapper">

        <?php foreach ($posts as $post) : ?>

          <div class="post">

            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image" />
            <div class="post-info">
              <h4>
                <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
              </h4>
              <i class="far fa-user"> <?php echo $post['username']; ?></i>
              &nbsp;
              <i class="far fa-calendar"> <?php echo date('F j , Y', strtotime($post['create_at'])); ?></i>
            </div>

          </div>

        <?php endforeach; ?>

      </div>

    </div>

    <!--//Trending Posts with couselo-->

    <!-- Content -->
    <div class="content clearfix">
      <!-- Main content -->
      <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

        <?php foreach ($posts as $post) : ?>

          <div class="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image" />
            <div class="post-preview">
              <h2>
                <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
              </h2>
              <i class="far fa-user"> <?php echo $post['username']; ?></i>
              &nbsp;
              <i class="far fa-calendar"> <?php echo date('F j , Y', strtotime($post['create_at'])); ?></i>
              <p class="preview-text">
                <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
              </p>
              <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Đọc tiếp</a>
            </div>
          </div>

        <?php endforeach; ?>


      </div>

      <!-- // Main content -->

      <!-- sidebar -->
      <div class="sidebar">
        <!-- Thanh search -->
        <div class="section search">
          <h2 class="section-title">Tìm kiếm</h2>
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search.." />
          </form>
        </div>
        <!-- // Thanh search-->
        <!-- Section topics-->
        <div class="section topics">
          <h2 class="section-title">Chủ đề</h2>
          <ul>


            <?php foreach ($topics as $key => $topic) : ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
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
  <?php include(ROOT_PATH . "/app/includes/footer.php");  ?>
  <!-- //Includes Footer  -->

  <!--Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--Slick JS-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!--Custom script-->
  <script src="assets/js/scripts.js"></script>
</body>

</html>