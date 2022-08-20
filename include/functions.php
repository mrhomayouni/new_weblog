<?php
require "db.php";


function get_categories()
{
    global $db;
    $sql = "SELECT * FROM `categories`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    return $categories;
}

function get_post_by_category($category)
{
    global $db;
    $sql = "SELECT * FROM `post` WHERE  `category_id`=:category";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("category", $category);
    $stmt->execute();
    $post = $stmt->fetchAll();
    return $post;
}

function get_post()
{
    global $db;
    $sql = "SELECT * FROM `post`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetchAll();
    return $post;
}

function get_post_by_post_id($post_id)
{
    global $db;
    $sql = "SELECT * FROM `post` WHERE  `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id", $post_id);
    $stmt->execute();
    $post = $stmt->fetch();
    return $post;
}

function search($search)
{
    global $db;
    $sql = "SELECT * FROM `post` WHERE  `title` LIKE '%$search%'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetch();
    return $post;
}

function add_comment($user_id, $body, $post_id)
{
    global $db;
    $sql = "INSERT INTO `comments`( `body`, `user_id`, `post_id`) VALUES (:body , :user_id , :post_id )";
    $stmt = $db->prepare($sql);
    $stmt->bindparam("user_id", $user_id);
    $stmt->bindparam("body", $body);
    $stmt->bindparam("post_id", $post_id);
    $stmt->execute();

}

function get_comment()
{
    global $db;
    $sql = "SELECT * FROM `comments`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}

function delete_comment($comment_id)
{
    global $db;
    $sql = "DELETE FROM `comments` WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id", $comment_id);
    $stmt->execute();
}

function get_comment_by_post($post_id)
{
    global $db;
    $sql = "SELECT * FROM `comments` WHERE `post_id`=:post_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("post_id", $post_id);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $comments;

}