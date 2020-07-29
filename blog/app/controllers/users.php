<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");


$table = 'users';
$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';


//Tao function khi dang nhap voi dang ki thanh cong set session va chuyen huong
function loginUser($user)
{
    //Tao seesion login
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Ban da duoc dang nhap ngay bay gio';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }

    exit();
}

//LENH THUC THI KHI NHAN BUTTON
if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {

    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        //Bo 2 thuoc tinh ko can thiet khi gan POST
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        //Hash mat khau
        $_POST['password'] = password_hash(
            $_POST['password'],
            PASSWORD_DEFAULT
        );

        //kiem tra check admin
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user da tao thanh cong';
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            //Gan admin = 0;
            $_POST['admin'] = 0;
            //Tao user import vao database
            $user_id = create($table, $_POST);
            //Lua chon users de dang nhap
            $user = selectOne($table, ['id' => $user_id]);

            //log in user in
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

//Dang nhap 
if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        //Lay ra user trung voi post username
        $user = selectOne($table, ['username' => $_POST['username']]);
        //Kiem tra so sanh 2 mat khau database voi password post-login
        if ($user && password_verify($_POST['password'], $user['password'])) {
            //Dang nhap, chuyen huong
            //log in user in
            loginUser($user);
        } else {
            array_push($errors, 'Sai thong tin dang nhap');
        }
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
}

//Lay duong dan id den trang edit
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

//Edit user
if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        //Bo 2 thuoc tinh ko can thiet khi gan POST
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);
        //Hash mat khau
        $_POST['password'] = password_hash(
            $_POST['password'],
            PASSWORD_DEFAULT
        );

        //kiem tra check admin
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin user da update thanh cong';
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

//xoa user
if (isset($_GET['del_id'])) {
    adminOnly();
    $count = delete($table, $_GET['del_id']);
    $_SESSION['message'] = 'Ban da xoa user thanh cong';
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
