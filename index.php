<html>
<head>
  <link rel="stylesheet" type="text/css" href="v1index_style.css">
</head>
<body>
  <!-- while desktop items still has a "next"
  count =0
  get file(should be an html file)
  make row
  while count != 3
    make column
      place link to page in cell
    increment count
  -->
  <div class="row">
    <div class="col-fill">
        header
    </div>
  </div>
<?php
  $dir = new DirectoryIterator('./desktop_items');
  $columns = 3;
  $dir->next();
  $dir->next();
  while($dir->valid()){
    $count = 0;
    echo "<div class=\"row\">";
    echo "<div class=\"col-desktop_margins\"></div>";
    while($count != 3){
      $url = $dir->getBasename();
      $dir->next();
      echo "<div class=\"col-files\">
      <a class=\"folders\" href=\"desktop_items/" . $url . "\">content</a>
      </div>";
      if($dir->valid()){
        $count += 1;
      }
      else{
        break;
      }
    }
    if($count == 3){
    echo "</div>";
  }
  }
  if($count == 2){
    echo "</div>";
    echo "<div class=\"row\">";
    echo "<div class=\"col-desktop_margins\"></div>";
    echo "<div class=\"col-files\">
    <a class=\"files\" onclick=\"something()\" href=\"javascript:void(0);\">about 2</a>
    </div>";
    echo "<div class=\"col-desktop_margins\"></div>";
    echo "</div>";
  }
  else{
    echo "<div class=\"col-files\">
    <a class=\"files\" onclick=\"something()\" href=\"javascript:void(0);\">about 1</a>
    </div>";
    echo "<div class=\"col-desktop_margins\"> </div>";
    echo "</div>";
  }
?>
  <div class="row">
    <div class="col-fill footer">
        footer
    </div>
  </div>
</body>
</html>
