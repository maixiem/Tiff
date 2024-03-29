<?php
require_once '../Mobile Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;
header ("Content-type: text/css");?>
/*page options*/
html {
  background: #0C59D1;
  overflow-x: hidden;
}
body {
  font-family: 'Georgia', serif;
  color: white;
}
h1, h2, h3 {
  font-family: 'Raleway', sans-serif;
  font-weight: medium;
  color: #42C5BE;
  text-transform:lowercase;
}
h1{
  font-size: 80pt;
}
h2 {
  font-size: 40pt;
}
h3 {
  font-size: 24pt;
}
.header, .footer {
  min-height: 5%;
  font-family: 'Raleway', sans-serif;
}
.footer {
    margin: 5%;
    font-size: 12pt;
    font-weight: medium;
}
.icon_container {
  position: relative;
  margin-bottom: 10%;
  width: 100%;
  <?php if ($detect->isMobile()){
    echo  "min-height: 16em;";
  }else{
    echo "min-height: 8em;";
  }
  ?>
  background: url('../assets/folder.png') no-repeat;
  background-size: contain;
  background-position: center;
}
.icon_container:hover {
  background: url('../assets/folder_open.png') no-repeat;
  background-size: contain;
  background-position: center;
}
span {
  <?php if ($detect->isMobile()){
    echo "font-size: 4em;";
  }else{
    echo "font-size: 1em;";
  }?>
}
a {
  font-family: 'Raleway', sans-serif;
}
a.icon {
  <?php if ($detect->isMobile()){
  echo "font-size: 16em;";
  }else{
    echo "font-size:7.9em;";
  }?>
}
a.folders:active, a.folders:link, a.folders:visited {
  color: #42C5BE;
  text-decoration: none;
}
a.folders:hover{
  color: white;
}
a.files:active, a.files:link, a.files:visited{
  color: #42C5BE;
  text-decoration: none;
}
a.files:hover{
  color: white;
}
.popup{
  position: absolute;  top: 1em;
  left: 0.5em;
  width: 500px;
  height: auto;
  box-shadow:5px 5px 10px #273854;
  display: none;
}

.popup_label {
  font-family: 'Raleway',sans-serif;
  background: #42C5BE;
  color:#0C59D1;
  width: 90%;
  padding: 5px;
  display: inline-block;
  border-radius: 5px 0px 0px 0px;
}
.popup_exit {
  font-family: 'Raleway',sans-serif;
  background:#FE7692;
  width: 10%;
  padding: 5px;
  color: #ffffff;
  text-align: center;
  display: block;
  float: right;
  cursor: pointer;
  border-radius: 0px 5px 0px 0px;
}
.popup_exit:hover {
  background: #9E465B;
}
.frame {
  font-size: 1em;
  padding: 15px;
  font-family: 'Georgia', serif;
  color: #000000;
  background: #ffffff;
  width: inherit;
  min-height: 300px;
  display: block;
  border-radius: 0px 0px 5px 5px;
}
a.popup_link:active, a.popup_link:link, a.popup_link:visited {
  font-family: inherit;
  color: #0C59D1;
}
a.popup_link:hover {
  color: #FE7692;
}
/*grid setup*/
* {
  box-sizing: border-box;
}
.col-desktop_margins {width: 16.66%;}
.col-fill {width: 100%;}

[class*="col-"] {
    float: left;
    padding: 15px;
    /*border: 1px solid red;*/
}

.row::after {
    content: "";
    clear: both;
    display: table;
}

<?php if ($detect->isMobile()){
  echo ".col-desktop_margins {
    display:none;}
    .col-files {
      width: 100%;
    }";
}
else{
  echo "@media only screen and (min-width: 768px){";
  echo ".col-files {width: 22.22%;}";
  echo "}";
  echo "@media only screen and (max-width: 768px){
    .col-desktop_margins {
  display:none;}
  .col-files {
    width: 100%;
  }
}";
}
?>

/*grid options*/
.col-files {
  padding: 15px;
  text-align: center;
}

.footer {
  text-align: left;
}
