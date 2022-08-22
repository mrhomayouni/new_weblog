<?php

require "../include/functions.php";

if (isset($_POST["send_new_post"])) {
    add_post($_POST["title"], $_POST["body"], $_POST["image"], $_POST["category_id"], $_POST["writer"], $_POST["date"]);

}

/*if (isset($_POST["edit_category"])) {
    edit_category($_POST["category_id"], $_POST["edit_category_name"]);
}*/
if (isset($_POST["delete_post"])) {
    delete_post($_POST["delete_post"]);
}


$posts = get_post();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body dir="rtl">
<label for="">افزودن پست جدید</label>
<form action="" method="post">
    <input type="text" name="title" placeholder="title"> <br><br>
    <input type="text" name="body" placeholder="body" style="width: 170px;height: 100px"><br><br>
    <input type="text" name="image" placeholder="image"><br><br>
    <input type="text" name="category_id" placeholder="category_id"><br><br>
    <input type="text" name="writer" placeholder="writer"><br><br>
    <input type="text" name="date" placeholder="date"><br><br>
    <input type="submit" name="send_new_post" value="افزودن"> <br><br>
</form>

<hr size="10px">
<table border="2px">
    <tr>
        <th>id</th>
        <th>name</th>
        <th colspan="2px
">edit/delete</th>
    </tr>
    <?php foreach ($posts as $post) {  ?>
        <tr>
            <td> <?= $post["id"]  ?></td>
            <td><?= $post["title"]  ?></td>
            <form action="" method="post">

                <td>
                    <button name="delete_post" value="<?= $post["id"] ?>"> حذف</button>
                </td>
                <td>
                    <button name="edit" value="<?php ?>"> ویرایش</button>
                </td>
                <?php if (isset($_POST["edit"])) {  ?>
                    <td>
                        <input type="text" name="edit_category_name" value="<?php ?>">
                        <input type="hidden" name="category_id" value="<?php  ?>">
                        <input type="submit" value="ویرایش" name="edit_category">

                    </td>
                <?php }  ?>
            </form>
        </tr>
    <?php } ?>
</table>

<button type="button" onclick="location.href='index.php';" style="font-size:20px;padding: 5px">
    بازگشت به صفحه ادمین
</button>

</body>
</html>
