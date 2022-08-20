<?php

require "include/functions.php";

if (isset($_GET["category"])) {
    $category_id = $_GET["category"];
    $category_post = get_post_by_category($category_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<?php if (isset($category_post)) {

    foreach ($category_post as $category_post_item) {
        ?>
        <div>
            <a href="">
                <h2> <?= $category_post_item["title"] ?> </h2>
                <div><?= substr($category_post_item["body"], 0, 150); ?>...</div>
            </a>
        </div>

    <?php }
} ?>
</body>
</html>

