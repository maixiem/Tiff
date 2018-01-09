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
  $row_start = "<div class=\"row\"><div class=\"col-margin\"></div>";
  $images_start = "<div class=\"col-content\"><div class=\"images\">";
  $images = "";
  $images_end = "</div></div>";

  $links_start = "<div class=\"col-content\">";
  $links = "";
  $links_end = "</div>";
  $row_end = "<div class=\"col-margin\"></div></div>";
  $desc_start = "<div class=\"col-content\"><div class=\"desc\">";
  $desc_end = "</div></div>";
  $html .= $row_start . $images_start . $images . $images_end . $links_start . $links . $links_end . $row_end;
  $html .= $row_start . $desc_start . $desc . $desc_end . $row_end;
  $footer = "</body></html>";
  $html .= $footer;
  fwrite($page,$html);
  echo  $title . "has been created.<br>";

  echo "<a href=\"desktop_items/" . $title . ".html\">Click here to view.<br></a>";
  echo "<a href=\"create_project.php\">Click here to make another page.</a><br>";
?>
</body>
</html>
