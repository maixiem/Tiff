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
        ?>testy2</a>
	</div>
</div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="images"><img src="testy2/5aa539756a685f7d513c7464e25f3552.png"><img src="testy2/41a7ee9a411486d0c5c9cc911ca89b67.png"><img src="testy2/66ff8061918bc00768618b8a1fcb5234.png"><img src="testy2/123b484e688126886d6ae9129b89f779.png"><img src="testy2/0473d7949a31144f07f0ac30597eb2f0.png"><img src="testy2/a606b520039831b269d41b5489949057.png">
</div></div>
<div class="col-content">
</div>
<div class="col-margin"></div></div>
<div class="row"><div class="col-margin"></div>
<div class="col-content"><div class="desc">
</div></div>
<div class="col-margin"></div></div>
</body></html>