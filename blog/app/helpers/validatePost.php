<?php

function validatePost($post)
{
    //Tao mang loi de kiem tra username va password
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Ten tieu de khong duoc de trong');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Noi dung khong duoc de trong');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Hay chon mot chu de');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        //Neu update thi can gi trung title -.-
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Tieu de nay da ton tai. Vui long chon 1 tieu de khac!');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Tieu de nay da ton tai vui long chon 1 tieu de khac');
        }
    }

    return $errors;
}
