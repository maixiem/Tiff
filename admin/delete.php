<html>
<body>
<?php
$page = $_POST["deleted_page"];
function delete_page($p){
  if(unlink("$p")){
    echo "Successfully deleted page $p<p>";
  }else{
    echo "Failed to delete $p<p>";
  }
}
function delete_dir($d){
  $dir = new FilesystemIterator($d);
  if($dir->valid()){
    //not empty
    echo "directory not empty, attempting to delete contents...<br>";
    foreach($dir as $f){
      if(unlink($f)){
        echo "... $f deleted<br>";
      }else{
        echo "error deleting $f. you may have to delete this manually from your directory.<br>";
        break;
      }
    }
    rmdir($d);
  }else{
    echo "directory is empty.<br>";
    rmdir($d);
  }

}

foreach($page as $obj){
  $path = "../desktop_items/$obj";
  echo "<b>Removing</b> ";
  echo $path;
  echo "<br>";
  if(is_dir($path)){
    delete_dir($path);
  }else{
    delete_page($path);
  }
}
echo "<a href=\"admin.php\">Return to admin page.</a>";
?>
</body>
</html>
