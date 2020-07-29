<?php

//KIem tra loi dang ki
function validateUser($user)
{
    //Tao mang loi de kiem tra username va password
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Ten tai khoan duoc yeu cau');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email duoc yeu cau');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Mat khau duoc yeu cau');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Mat khau nhap lai khong dung');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        //Neu update thi can gi trung title -.-
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email nay da ton tai');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email nay da ton tai');
        }
    }

    return $errors;
}

//Kiem tra loi dang nhap
function validateLogin($user)
{
    //Tao mang loi de kiem tra username va password
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Ten tai khoan duoc yeu cau');
    }


    if (empty($user['password'])) {
        array_push($errors, 'Mat khau duoc yeu cau');
    }


    return $errors;
}
