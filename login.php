<?php
require "include/functions.php";

if (isset($_POST["send"])) {
    add_user($_POST["name"],$_POST["family"],$_POST["email"],$_POST["password"]);
    header("Location:singin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="family">
    <input type="email" name="email">
    <input type="text" name="password">
    <input type="submit" value="send" name="send">
</form>

</body>
</html>
