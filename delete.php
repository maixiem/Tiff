<html>
<body>
<?php
$page = $_POST["deleted_page"];
echo "The following pages have been deleted:<br>";
foreach ($page as $p){
  unlink("desktop_items/" . $p);
  echo "desktop_items/" . $p;
  echo "<br>";
}
echo "<a href=\"admin.php\">Return to admin page.</a>";
?>
</body>
</html>
