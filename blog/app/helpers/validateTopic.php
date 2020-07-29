<?php

//KIem tra loi dang ki
function validateTopic($topic)
{
    //Tao mang loi de kiem tra username va password
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Ten topic ko dc de trong');
    }


    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic) {
        //Neu update thi can gi trung title -.-
        if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Topic nay da ton tai');
        }

        if (isset($topic['add-topic'])) {
            array_push($errors, 'Topic nay da ton tai');
        }
    }

    return $errors;
}
