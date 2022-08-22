<?php

require "../include/functions.php";

if (isset($_POST["delete"])) {
    delete_comment($_POST["delete"]);
}

if (isset($_POST["ok"])) {
    change_comment_status21($_POST["ok"]);
}

if (isset($_POST["not_ok"])) {
    change_comment_status20($_POST["not_ok"]);
}

if(isset($_POST["send_edited_comment"]))
{
    comment_edit($_POST["edit_comment_id"],$_POST["edit_comment"]);
}

$comments = get_comment();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="direction: rtl">

<table border="2px">
    <tr>
        <th>comment_id</th>
        <th>user_id</th>
        <th>post_id</th>
        <th>body</th>
        <th>status</th>
        <th colspan="3">حذف/تایید/ویرایش</th>
        <?php if(isset($_POST["edit"])) { ?>
        <th>ویرایش</th>
        <?php }?>
    </tr>
    <?php if (count($comments) > 0) {
        foreach ($comments as $comment) {
            ?>

            <tr>
                <td><?= $comment["id"] ?></td>
                <td><?= $comment["user_id"] ?></td>
                <td><?= $comment["post_id"] ?></td>
                <td><?= $comment["body"] ?></td>
                <td><?= $comment["status"] == 1 ?  "تایید شده" : "در انتظار تایید"; ?></td>
                <form action="" method="POST">
                    <td>
                        <button name="delete" value="<?= $comment["id"] ?>"> حذف</button>
                    </td>
                    <td>
                        <?php $comment["status"] == 1 ?  $status=1 : $status=0; ?>
                        <?php if ($status==0){?>
                        <button name="ok" value="<?= $comment["id"] ?>"> تایید</button>
                        <?php }else{?>
                            <button name="not_ok" value="<?= $comment["id"] ?>">عدم تایید</button>
                        <?php }?>

                    </td>
                    <td>
                        <button name="edit" value="<?= $comment["id"] ?>"> ویرایش</button>
                    </td>
                    <?php if(isset($_POST["edit"])){ ?>
                    <td><input type="text" name="edit_comment" value="<?=$comment["body"] ?>">
                        <input type="submit" value="edit" name="send_edited_comment">
                        <input type="hidden" name="edit_comment_id" value="<?=$comment["id"] ?>">
                    </td>
                    <?php }?>
                </form>
            </tr>
        <?php }
    } ?>
</table>
<button type="button" onclick="location.href='index.php';" style="font-size:20px;padding: 5px">
    برگشت به صفحه ادمین
</button>

</body>
</html>


