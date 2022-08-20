<?php

require "include/functions.php";

if(isset($_GET["post"])){

    $post_id=$_GET["post"];

    $post=get_post_by_post_id($post_id);
}else{
    /*header("Location");*/ ##########################//////########
}

if(isset($_POST["send_comment"])){

    add_comment(1,$_POST["comment_body"],$post_id);
    echo "ok";

}

$comments=get_comment_by_post($post_id);

var_dump($comments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if(isset($post)){ ?>
<div>

        <h2> <?= $post["title"] ?> </h2>
        <div> <?=$post["body"]?> </div>
</div>

    <form action="" method="post">
        <input type="text" name="user_id" placeholder="user_id" >
        <input type="text" name="comment_body" placeholder="comment" >
        <input type="submit" value="send" name="send_comment">
    </form>
<?php }?>

<?php if(count($comments)>0){
    foreach ($comments as $comment){
        if($comment["status"]==1){
            echo $comment["body"];
        }
    }
}?>

    <div>



    </div>



</body>
</html>
