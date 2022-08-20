<?php

require "../include/functions.php";

$comments = get_comment();
if(isset($_POST["delete"])){
    delete_comment($_POST["delete"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="direction: rtl">

<table>
    <tr>
        <th>comment_id</th>
        <th>post_id</th>
        <th>user_id</th>
        <th>body</th>
        <th>status</th>
    </tr>
    <?php if (count($comments) > 0) {
        foreach ($comments as $comment) {
            ?>

            <tr>
                <td><?= $comment["id"] ?></td>
                <td><?= $comment["post_id"] ?></td>
                <td><?= $comment["user_id"] ?></td>
                <td><?= $comment["body"] ?></td>
                <td><?= $comment["status"] ?></td>
                <form action="" method="post">
                <td>
                    <button name="delete" value="<?= $comment["id"] ?>"> حذف</button>
                </td>
                <td>
                    <button name="ok"> تایید</button>
                </td>
                </form>
            </tr>
        <?php }
    } ?>
</table>

</body>
</html>


