<?php require_once '../Mobile Detect/Mobile_Detect.php';
$detect = new Mobile_Detect; ?><html>
  <head>
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../v1projects_style.css">
  </head>
  <body>
  <?php
        if ($detect->isMobile()){
          echo "<div class=\"row\">
          <div class=\"col-fill\">
            <a href=\"../index.php\" class=\"back-mobile\">
              <div class=\"back-mobile\">
                <i class=\"fa fa-home\" aria-hidden=\"true\"></i>
              </div>
            </a>
          </div>
        </div>
        <div class=\"row\">
        <div class=\"col-fill\">
          <a href=\"/\" class=\"header\">";
        }else{
          echo "<div class=\"row\">
            <div class=\"col-margin\">
              <a href=\"../index.php\" class=\"back\">
                <div class=\"back\">
                  <i class=\"fa fa-long-arrow-left\" aria-hidden=\"true\"></i>
                </div>
              </a>
            </div>
            <div class=\"col-title\">
              <a href=\"/\" class=\"header\">";
        }
        ?>slideplease</a>
	</div>
</div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="slideshow-container"><div class="mySlides fade">
      <img src="slideplease/3a6ce892ec79aa2f496140ee2ae3a2f5.png" style="100%">
      </div><div class="mySlides fade">
      <img src="slideplease/41a7ee9a411486d0c5c9cc911ca89b67.png" style="100%">
      </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div></div>
<div class="col-content">
</div>
<div class="col-margin"></div></div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="desc">
</div></div>
<div class="col-margin"></div></div>
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
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}</script>
</body></html>