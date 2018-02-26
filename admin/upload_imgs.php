<?php
$imgs = $_FILES;
$title = $_POST['title'];
foreach($imgs as $i){
  $name = basename($i['name']);
  move_uploaded_file($i['tmp_name'], "../desktop_items/$title/$name");
}
?>
