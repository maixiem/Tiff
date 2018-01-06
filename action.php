<html>
<body>
<?php
  $title = $_POST["page_name"];
  $desc = $_POST["description"];
  $page = fopen("desktop_items/" . $title . ".html", "w");
  $html = "";
  $header = "<html>
  <head>
    <link rel=\"stylesheet\" href=\"../v1projects_style.css\">
  </head>
  <body>
    <div class=\"row\">
      <div class=\"col-margin\">
        <a href=\"../index.php\" class=\"back\">
          <div class=\"back\">
            <-
          </div>
        </a>
      </div>
      <div class=\"col-title\">
        <a href=\"/\" class=\"header\">";
  $header_close = "</a>
</div>
</div>";
  $html .= $header . $title . $header_close;
  fwrite($page,$html);
  $row_start = "<div class=\"row\"><div class=\"col-margin\"></div>";
  $images_start = "<div class=\"col-content\"><div class=\"images\">";

  $images_end = "</div></div>";

  $links_start = "<div class=\"col-content\">";

  $links_end = "</div>";
  $row_end = "<div class=\"col-margin\"></div></div>";
  fwrite($page, $desc);
  echo  $title . "has been created.<br>";

  echo "<a href=\"desktop_items/" . $page . ".html\">Click here to view.<br></a>";
  echo "<a href=\"create_project.php\">Click here to make another page.</a><br>";
?>
</body>
</html>
