<?php

require "../include/functions.php";

if (isset($_POST["send_new_category"])) {
    $flag=0;
    $categories = get_categories();
    foreach ($categories as $category) {
        if ($category["name"] == $_POST["category"]) {
            $flag++;
        }
    }
    if($flag<1){
        add_category($_POST["category"]);
    }else{
        echo "این دسته بندی وجود دارد";
    }

}

if (isset($_POST["edit_category"])) {
    edit_category($_POST["category_id"], $_POST["edit_category_name"]);
}
if (isset($_POST["delete_category"])) {
    delet_category($_POST["delete_category"]);
}


$categories = get_categories();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body dir="rtl">
<label for="">افزودن دسته بندی جدید</label>
<form action="" method="post">
    <input type="text" name="category">
    <input type="submit" name="send_new_category" value="افزودن">
</form>

<table border="2px">
    <tr>
        <th>id</th>
        <th>name</th>
        <th colspan="2">edit/delete</th>
    </tr>
    <?php foreach ($categories as $category) { ?>
        <tr>
            <td> <?= $category["id"] ?></td>
            <td><?= $category["name"] ?></td>
            <form action="" method="post">

                <td>
                    <button name="delete_category" value="<?= $category["id"] ?>"> حذف</button>
                </td>
                <td>
                    <button name="edit" value="<?= $category["id"] ?>"> ویرایش</button>
                </td>
                <?php if (isset($_POST["edit"])) { ?>
                    <td>
                        <input type="text" name="edit_category_name" value="<?= $category["name"] ?>">
                        <input type="hidden" name="category_id" value="<?= $category["id"] ?>">
                        <input type="submit" value="ویرایش" name="edit_category">

                    </td>
                <?php } ?>
            </form>
        </tr>
    <?php } ?>
</table>

<button type="button" onclick="location.href='index.php';" style="font-size:20px;padding: 5px">
بازگشت به صفحه ادمین

</button>

</body>
</html>
