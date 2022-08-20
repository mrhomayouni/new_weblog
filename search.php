<?php
require "include/functions.php";

echo $_POST["search"];



 $post=search($_POST["search"]);
echo $post["title"];
