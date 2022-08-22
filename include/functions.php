<?php


require "db.php";

session_start();

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
    $sql = "SELECT * FROM `posts`";
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

function add_user($name, $family, $email, $password)
{
    global $db;
    $sql = "INSERT INTO `user`(`name`, `family`, `email`, `password`) 
VALUES (:name,:family,:email,:password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("name", $name);
    $stmt->bindParam("family", $family);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("password", $password);
    $stmt->execute();

}

function get_user($email, $pass)
{
    global $db;
    $sql = "SELECT * FROM `user` WHERE  `email`=:email AND `password`=:pass";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("pass", $pass);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user;

}

function get_user_by_session($email)
{
    global $db;
    $sql = "SELECT * FROM `user` WHERE  `email`=:email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("email", $email);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user;

}

function change_comment_status21($comment_id)
{
    global $db;
    $sql = "UPDATE `comments` SET `status`=:status WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("status", 1);
    $stmt->bindValue("id", $comment_id);
    $stmt->execute();

}

function change_comment_status20($comment_id)
{
    global $db;
    $sql = "UPDATE `comments` SET `status`=:status WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("status", 0);
    $stmt->bindValue("id", $comment_id);
    $stmt->execute();

}

function add_category($name)
{
    global $db;
    $sql = "INSERT INTO `categories` (`name`) VALUES (:name)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("name", $name);
    $stmt->execute();
}

function edit_category($id, $edited_name)
{
    global $db;
    $sql = "UPDATE `categories` SET `name`=:edited_name WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $id);
    $stmt->bindValue("edited_name", $edited_name);
    $stmt->execute();
}

function delet_category($id)
{
    global $db;
    $sql = "DELETE FROM `categories` WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $id);
    $stmt->execute();
}

function comment_edit($comment_id, $body)
{
    global $db;
    $sql = "UPDATE `comments` SET `body`=:body WHERE `id`=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $comment_id);
    $stmt->bindValue("body", $body);
    $stmt->execute();

}

function add_post($title, $body, $image, $category_id, $writer, $date)
{
    global $db;
    $sql = "INSERT INTO `posts`(`title`, `body`, `image`, `category_id`, `writer`, `date`) 
VALUES (:title, :body, :image, :category_id, :writer, :date )";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("title", $title);
    $stmt->bindValue("body", $body);
    $stmt->bindValue("image", $image);
    $stmt->bindValue("category_id", $category_id);
    $stmt->bindValue("writer", $writer);
    $stmt->bindValue("date", $date);
    $stmt->execute();
}

function delete_post($post_id)
{
    global $db;
    $sql="DELETE FROM `posts` WHERE `id`=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindValue("id",$post_id);
    $stmt->execute();
}


