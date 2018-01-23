<?php
require_once './Mobile Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="v1index_style.php">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<script src="tiff_v1.js"></script>
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
    <div class="col-fill header">

    </div>
  </div>
<?php
  $dir = new DirectoryIterator('./desktop_items');
  $columns = 3;
  $dir->next();
  $dir->next();
  $id = 0;
  while($dir->valid()){
    $count = 0;
    echo "<div class=\"row\">";
    echo "<div class=\"col-desktop_margins\"></div>";
    while($count != 3){
      $url = $dir->getBasename();
      $name = $dir->getFilename();
      $dir->next();
      echo "<div class=\"col-files\">";
      echo "<a class=\"folders\" href=\"desktop_items/" . $url . "\"><div class=\"icon_container\"></div>" . $name . "</a></div>";
      $id +=1;
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
    echo "<div class=\"col-files\"><div id=\"icon_container\">\n<a class=\"files icon\" onclick=\"open_popup()\" href=\"javascript:void(0);\"><i class=\"fa fa-file\" aria-hidden=\"true\"></i></a>\n
    </div><br><a class=\"files\" onclick=\"open_popup()\" href=\"javascript:void(0);\">about 2</a>
    </div>";
    echo "<div class=\"col-desktop_margins\"></div>";
    echo "</div>";
  }
  else{
    echo "<div class=\"col-files\"><div id=\"icon_container\">\n<a class=\"files icon\" onclick=\"open_popup()\" href=\"javascript:void(0);\"><i class=\"fa fa-file\" aria-hidden=\"true\"></i></a>\n
    </div><br><a class=\"files\" onclick=\"open_popup()\" href=\"javascript:void(0);\">about 1</a>
    </div>";
    echo "<div class=\"col-desktop_margins\"> </div>";
    echo "</div>";
  }
?>
<div id="popup">
    <div class="popup_label">about me.txt</div>
    <div class="popup_exit" onclick="close_popup()">X</div>
    <div class="frame">hello hello. here is a link <a href="google.com" class="popup">point!</a></div>
</div>
  <div class="row">
    <div class="col-fill footer">
        copyright tiffany peng
    </div>
  </div>
</body>
</html>
