<?php
echo $_POST['title'];
if(isset($_POST['title'])){
  $title = $_POST['title'];
  echo $title;
  echo "\n";
  if(mkdir("../desktop_items/$title")){
    echo "directory $title created\ninitializing page html...\n";
    $page = fopen("../desktop_items/" . $title . ".php", "w");
    $images_start = "\n<div class=\"col-content\"><div class=\"slideshow-container\">";
  }else{
    echo " failed to make directory $title\n";
    echo error_get_last()[message];
  }
  $html = $images_start . $images . $images_end;
  fwrite($page,$html);
}else{
  echo "title not set";
}
$images ="";
    $dots = "";
    var_dump($_FILES);
    if (isset($_FILES)){
      echo "why";
      $j=0;
    foreach($_FILES as $pic){
      var_dump($pic);
      echo $pic['tmp_name'];
      $name = basename($pic['name']);
      move_uploaded_file($pic['tmp_name'], "../desktop_items/$title/" . $name);
      echo "\n moved";
      $images .= "<div class=\"mySlides fade\"><a href=\"../desktop_items/$title/$name\" target=\"_blank\">\n<img src=\"$pic_dir/$name\" class=\"slides\"></a>\n</div>";
      $j +=1;
      $dots .= "<span class=\"dot\" onclick=\"currentSlide($j)\"></span>";
    }
    $images_end = "</div>";
    }else{
      echo "no files\n";
      /*this needs to be integrated with create.php so that uploads are inserted appropriately into the created page*/
      }
if(isset($_POST['page_stuff'])){
  $title = $_POST['page_stuff'];
  mkdir("$title/");
  echo $title;
}

?>
