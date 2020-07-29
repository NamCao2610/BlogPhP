<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");


$table = 'posts';

$topics = selectAll('topics');
$posts = get_posts_with_username();

$errors = array();

$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

//Tim post den trang edit theo get
if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

//Tim post va xoa post
if (isset($_GET['del_id'])) {
    adminOnly();
    $count = delete($table, $_GET['del_id']);
    $_SESSION['message'] = "Ban da xoa post nay thanh cong";
    $_SESSION['type'] = "success";
    header('location:' . BASE_URL . '/admin/posts/index.php');
    exit();
}

//Thiet lap published
if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    $count = update($table, $p_id, ['published' => $published]);

    $_SESSION['message'] = "Ban da update trang thai thanh cong";
    $_SESSION['type'] = "success";
    header('location:' . BASE_URL . '/admin/posts/index.php');
    exit();
}

//Them post moi
if (isset($_POST['add-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result =  move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, 'Loi up anh vui long thu lai');
        }
    } else {
        array_push($errors, "Dang bai nen dang kem anh chu thich");
    }


    if (count($errors) === 0) {

        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Ban da tao post thanh cong";
        $_SESSION['type'] = "success";
        header('location:' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

//Chinh sua edit post

if (isset($_POST['update-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result =  move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, 'Loi up anh vui long thu lai');
        }
    } else {
        array_push($errors, "Dang bai nen dang kem anh chu thich");
    }

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Ban da update thanh cong";
        $_SESSION['type'] = "success";
        header('location:' . BASE_URL . '/admin/posts/index.php');
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}
