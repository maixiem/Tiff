<html>
<body>
<?php
$header= "<?php require_once '../Mobile Detect/Mobile_Detect.php';
\$detect = new Mobile_Detect; ?>";
  $page_stuff = $_POST["page_stuff"];
  $title = $page_stuff[0];
  $desc = $page_stuff[1];
  $page = fopen("desktop_items/" . $title . ".php", "w");
  $html = "";
  $header .= "<html>
  <head>
  <link rel=\"stylesheet\" href=\"../font-awesome/css/font-awesome.min.css\">
    <link rel=\"stylesheet\" href=\"../v1projects_style.php\">
  </head>
  <body>
  <?php
        if (\$detect->isMobile()){
          echo \"<div class=\\\"row\\\">
          <div class=\\\"col-fill\\\">
            <a href=\\\"../index.php\\\" class=\\\"back-mobile\\\">
              <div class=\\\"back-mobile\\\">
                <i class=\\\"fa fa-home\\\" aria-hidden=\\\"true\\\"></i>
              </div>
            </a>
          </div>
        </div>
        <div class=\\\"row\\\">
        <div class=\\\"col-fill\\\">
          <a href=\\\"/\\\" class=\\\"header\\\">\";
        }else{
          echo \"<div class=\\\"row\\\">
            <div class=\\\"col-margin\\\">
              <a href=\\\"../index.php\\\" class=\\\"back\\\">
                <div class=\\\"back\\\">
                  <i class=\\\"fa fa-long-arrow-left\\\" aria-hidden=\\\"true\\\"></i>
                </div>
              </a>
            </div>
            <div class=\\\"col-title\\\">
              <a href=\\\"/\\\" class=\\\"header\\\">\";
        }
        ?>";
  $header_close = "</a>\n\t</div>\n</div>";
  $html .= $header . $title . $header_close;
  $row_start = "\n<div class=\"row\">";
  $images_start = "\n<div class=\"col-content\"><div class=\"slideshow-container\">";
  $images ="";
  $dots = "";
  $pic_dir = "./desktop_items/" . $title . "/";
  mkdir($pic_dir);
  if(isset($_FILES)){
    $img_count = count($_FILES);
    echo $img_count;
    if($img_count > 0){
      $j = 0;
      foreach($_FILES as $pic){
        $name = basename($pic['name']);
        echo $name;
        echo " uploaded <br>";
        move_uploaded_file($pic['tmp_name'], "$pic_dir/$name");
        $images .= "<div class=\"mySlides fade\"><a href=\"$title/$name\" target=\"_blank\">\n<img src=\"$pic_dir/$name\" class=\"slides\"></a>\n</div>";
        $j +=1;
        $dots .= "<span class=\"dot\" onclick=\"currentSlide($j)\"></span>";
      }
      $images_end = "\n<a class=\"prev\" onclick=\"plusSlides(-1)\">&#10094;</a>\n<a class=\"next\" onclick=\"plusSlides(1)\">&#10095;</a>\n</div>\n<br>\n<div style=\"text-align:center\">" . $dots . "</div></div>";
   }else{
    $images_end = "</div>";
  }
 }
  $links_start = "\n<div class=\"col-content\">";
  $link_names = new ArrayIterator($_POST['link_names']);
  $link_urls = new ArrayIterator($_POST['link_urls']);
  $links = "";
  foreach($link_urls as $u){
    $name = $link_names->current();
    $links .= "<a href=\"$u\">$name</a><p>";
    $link_names->next();
  }
  echo $links;
  $links_end = "\n</div>";
  //iirc these just looked like straightup hyperlinks;
  //the form is the part that needs more special attention.
  //she should be able to add as many links as she wants
  $row_end = "\n<div class=\"col-margin\"></div></div>";
  $desc_start = "\n<div class=\"col-content\"><div class=\"desc\">";
  $desc_end = "\n</div></div>";
  $html .= $row_start . $images_start . $images . $images_end . $links_start . $links . $links_end . $row_end;
  $html .= $row_start . $desc_start . $desc . $desc_end . $row_end;
  $footer = "\n<script>
  var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName('mySlides');
  var dots = document.getElementsByClassName('dot');
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = 'none';
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(\" active\", \"\");
  }
  slides[slideIndex-1].style.display = \"block\";
  dots[slideIndex-1].className += \" active\";
}</script></body></html>";
  $html .= $footer;
  fwrite($page,$html);
  echo  $title . " has been created.<br>";

  echo "<a href=\"desktop_items/" . $title . ".php\">Click here to view.<br></a>";
  echo "<a href=\"admin.php\">Click here to make another page.</a><br>";
?>
</body>
</html>
