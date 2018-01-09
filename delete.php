<html>
<body>
<?php
$page = $_POST["delete_page"];
unlink("desktop_items/" . $page);
echo $page;
echo " has been deleted";
?>
</body>
</html>
