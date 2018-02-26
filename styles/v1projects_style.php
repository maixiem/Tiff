<?php
require_once '../Mobile Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
header ("Content-type: text/css");?>

html {
  background: #ffffff;
  border-right: 6px solid #ff6d99;
}

body {
  font-family: 'Georgia', serif;
  <?php if($detect->isMobile()){
    echo "font-size: 2em;";
  }else{
    echo "font-size: 1em;";
  }
  ?>
}
a {
  <?php if($detect->isMobile()){
  echo "font-size: 2em;";
}else {
  echo "font-size: 1em;";
}?>
}

.mySlides {display: none;
text-align: center;
vertical-align: middle;}

img {vertical-align: middle;}
.slides{
  max-height: 50em;
  max-width: 100%;
}
.slides:hover{
  opacity: .7;
}
/* Slideshow container */
.slideshow-container {
  min-width: 50%;
  max-width: 100%;
  position: relative;
  background: #e5e5e5;
  max-height: 50em;
  margin-bottom: 1em;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  <?php if($detect->isMobile()){
    echo "height: 1.5em; width: 1.5em;";
}else{
  echo "height: 15px;
  width: 15px;";
}?>
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.dotStyle{
  text-align: center;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text, a {font-size: 5em}
}

a.header:link, a.header:active, a.header:visited, a.header:hover{
  font-family: 'Raleway', sans-serif;
  font-size: 4em;
  text-decoration: none;
  color: #42C5BE;
  margin-bottom:50px;
}

.back {
  background: #ff6d99;
  height: 75px;
  width: 75px;
  border-radius: 50%;
  text-align: center;
  vertical-align: middle;
  padding-top: 25px;
  overflow: hidden;
}
.back-mobile {
  text-align: center;
  padding: .25em;
  position: fixed;
  right: .25em;
  bottom: .25em;
  background: white;
  border: 4px solid #ff6d99;
}
a.back-mobile:link, a.back-mobile:visited{
  color: #ff6d99;
  font-size: 3em;
  padding: 0em;
  text-decoration: none;
}
a.back-mobile:active {
  color: white;
  background-color: #ff6d99;
}
a.back:link, a.back:active, a.back:visited, a.back:hover {
  color: white;
  background: #ff6d99;
  text-decoration: none;
  font-size: 20pt;
}

/*grid setup*/
* {
  box-sizing: border-box;
}

@media only screen and (max-width: 850px){
  .col-content{
    width: 100%;
  }
  .col-margin{
    display: none;
  }
  .col-half{
    width: 25%;
  }
}
@media only screen and (min-width: 851px){
.col-content {
  <?php if($detect->isMobile()){
    echo "width: 100%;";
  }else{
    echo "width: 50%;";
  } ?>
}
.col-margin {
  <?php if($detect->isMobile()){
    echo "display: none;";
  }else{
  echo "width: 16.66%;";
}?>
}
.col-half{
  width: 50%;
  margin-left: 16.66%;
}

}
@media only screen and (min-width: 1200px){
  .col-content {
    width: 50.3%;
  }
  .col-margin{
    width: 16.66%;
  }
  .col-half{
    width: 25%;
    margin-left: 0;
  }
}
.col-title {
  width: 83.34%;
  margin-botton: 50px;
}
.col-fill{
  width: 100%;
  margin-botton: 25px;
}

[class*="col-"] {
    float: left;
    padding: 1em;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
<!--need media queries for smaller screens with "col-content"-->
