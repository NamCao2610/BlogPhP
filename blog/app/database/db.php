<?php

session_start();
require('connect.php');

function dd($value)
{
  echo "<pre>", print_r($value, true), "</pre>";
  die();
}

//ham thuc hien truy van
function executeQuery($sql, $data)
{
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values); //This is line error hope you help me fix it 
  $stmt->execute();
  return $stmt;
}
//Lay tat ca user
function selectAll($table, $conditions = [])
{

  global $conn;
  $sql = "SELECT * FROM $table";

  if (empty($conditions)) {
    //Thuc thi truy van lay tat ca
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //Tra ve ket qua truy van
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  } else {
    //  $sql = "SELECT * FROM $table WHERE username='Nam' AND admin=1";
    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?";
      } else {
        $sql = $sql . " AND $key=?";
      }
      $i++;
    }

    //Truyen cau truy van an danh $key = ?
    $stmt = executeQuery($sql, $conditions);
    //Tra ket qua truy van
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  }
}

//Lay 1 user
function selectOne($table, $conditions)
{

  //Khai bao ket noi de no hieu mysql
  global $conn;
  //Cau lenh truy van toi sql
  $sql = "SELECT * FROM $table";

  //  $sql = "SELECT * FROM $table WHERE username='Nam' AND admin=1";
  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?";
    } else {
      $sql = $sql . " AND $key=?";
    }
    $i++;
  }

  // $sql = "SELECT * FROM users WHERE admin=0 AND username="Awa" LIMIT 1 "
  $sql = $sql . " LIMIT 1";

  $stmt = executeQuery($sql, $conditions);
  //Tra ket qua truy van
  $records = $stmt->get_result()->fetch_assoc();
  return $records;
}

//Create method 
function create($table, $data)
{
  //Khai bao ket noi
  global $conn;

  //$sql = "INSERT INTO users SET usernamae= ? , admin= ?, email=?, password=?"
  $sql = "INSERT INTO $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }

  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;
}

//update method
function update($table, $id, $data)
{

  //Khai bao ket noi
  global $conn;

  //$sql = "UPDATE users SET usernamae= ? , admin= ?, email=?, password=?" WHERE id= ?
  $sql = "UPDATE $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";
    } else {
      $sql = $sql . ", $key=?";
    }
    $i++;
  }

  $sql = $sql . " WHERE id = ?";
  $data['id'] =  $id;


  $stmt = executeQuery($sql, $data);
  return $stmt->affected_rows;
}

//Delete method 
function delete($table, $id)
{

  //Khai bao ket noi
  global $conn;

  //$sql = "DELETE FROM users WHERE id= ?"
  $sql = "DELETE from  $table WHERE id=?";

  $stmt = executeQuery($sql, ['id' => $id]);
  return $stmt->affected_rows;
}

//lay post co chua username va sap xep theo thu tu 
function getPublishedPosts()
{
  global $conn;

  //SELECT * FROM posts WHERE published = 1
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.create_at DESC";
  //Truyen cau truy van an danh $key = ?
  $stmt = executeQuery($sql, ['published' => 1]);
  //Tra ket qua truy van
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//Lay post voi username
function get_posts_with_username()
{
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY p.create_at DESC";

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  //Tra ve ket qua truy van
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//lay post theo tung topic
function getPostsByTopicId($topic_id)
{
  global $conn;

  //SELECT * FROM posts WHERE published = 1
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY p.create_at DESC";
  //Truyen cau truy van an danh $key = ?
  $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
  //Tra ket qua truy van
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//Tim kiem post
function searchPosts($term)
{
  $match = '%' . $term . '%';
  global $conn;

  $sql = "SELECT
           p.*, u.username
           FROM posts AS p 
           JOIN users AS u 
           ON p.user_id=u.id 
           WHERE p.published=?
           AND p.title LIKE ? OR p.body LIKE ? ORDER BY p.create_at DESC";
  //Truyen cau truy van an danh $key = ?
  $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
  //Tra ket qua truy van
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}
