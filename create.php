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
    <link rel=\"stylesheet\" href=\"../v1projects_style.css\">
  </head>
  <body>
  <script>
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
}</script>
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
  $header_close = "</a>
\t</div>
</div>";
  $html .= $header . $title . $header_close;
  $row_start = "\n<div class=\"row\"><div class=\"col-margin\"></div>";
  $images_start = "\n<div class=\"col-content\"><div class=\"slideshow-container\">";
  $images ="";
  $pic_dir = "./desktop_items/" . $title . "/";
  mkdir($pic_dir);
  if(isset($_FILES['images'])){
    for($i=0; $i < count($_FILES['images']['name']); $i++){
    $name = basename($_FILES['images']['name'][$i]);
    echo $name;
    echo "<br>";
    move_uploaded_file($_FILES['images']['tmp_name'][$i], "$pic_dir/$name");
    $images .= "<div class=\"mySlides fade\">
      <img src=\"$title/$name\" style=\"100%\">
      </div>";
  }
}
  $images_end = "\n<a class=\"prev\" onclick=\"plusSlides(-1)\">&#10094;</a>
<a class=\"next\" onclick=\"plusSlides(1)\">&#10095;</a>

</div>
<br>

<div style=\"text-align:center\">
  <span class=\"dot\" onclick=\"currentSlide(1)\"></span>
  <span class=\"dot\" onclick=\"currentSlide(2)\"></span>
  <span class=\"dot\" onclick=\"currentSlide(3)\"></span>
</div></div>";
// add a loop for navigation dots
// use count()
//link to full image sizes on click (new tab)
// fillerbg? gray?
// turn off captions for now unless tiff rly wants them
  $links_start = "\n<div class=\"col-content\">";
  $links = "";
  $links_end = "\n</div>";
  //iirc these just looked like straightup hyperlinks;
  //the form is the part that needs more special attention.
  //she should be able to add as many links as she wants
  $row_end = "\n<div class=\"col-margin\"></div></div>";
  $desc_start = "\n<div class=\"col-content\"><div class=\"desc\">";
  $desc_end = "\n</div></div>";
  $html .= $row_start . $images_start . $images . $images_end . $links_start . $links . $links_end . $row_end;
  $html .= $row_start . $desc_start . $desc . $desc_end . $row_end;
  $footer = "\n</body></html>";
  $html .= $footer;
  fwrite($page,$html);
  echo  $title . "has been created.<br>";

  echo "<a href=\"desktop_items/" . $title . ".php\">Click here to view.<br></a>";
  echo "<a href=\"admin.php\">Click here to make another page.</a><br>";
?>
</body>
</html>
