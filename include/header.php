<?php

require "functions.php";

$categories = get_categories();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<ul>
    <?php if (isset($categories)) { ?>

        <?php
        foreach ($categories as $category) {
            ?>

            <li><a href="./category.php?category=<?=$category["id"]?>"" > <?= $category["title"] ?> </a> </li>

        <?php }
    } ?>
</ul>

</body>
</html>
