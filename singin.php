<?php

require "include/functions.php";
if (isset($_POST["send"])) {
    $get_user = get_user($_POST["email"], $_POST["password"]);
    if ($get_user === false) {
        echo "error";
    }else{
        $_SESSION["name"]=$get_user["name"];
        $_SESSION["email"]=$get_user["email"];

        header("Location:index.php");
        exit();
    }
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
    <input type="email" name="email">
    <input type="text" name="password">
    <input type="submit" value="send" name="send">
</form>

</body>
</html>

