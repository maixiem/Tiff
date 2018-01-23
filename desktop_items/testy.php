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
        ?>testy</a>
	</div>
</div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="images"><img src="testy/41a7ee9a411486d0c5c9cc911ca89b67.png">
</div></div>
<div class="col-content">
</div>
<div class="col-margin"></div></div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="desc">
</div></div>
<div class="col-margin"></div></div>
</body></html>