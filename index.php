<?php

require "./include/header.php";

$posts = get_post();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<?php if (isset($posts)) {
    foreach ($posts as $post) {
        ?>
        <div style="width: 250px;" >
            <a href="single.php?post=<?=$post["id"]?>">
                <h2> <?= $post["title"] ?> </h2>
                <div><?= substr($post["body"], 0, 150); ?>...</div>
            </a>
        </div>
        <?php
    }

} ?>



<form action="search.php" method="post">
    <input type="text" name="search" >
    <input type="submit" name="submit"  value="search">
</form>

</body>
</html>
