<?php
/*    OPEN_PAGE.php
/*1 - create directory and .php file using title name*/
$title = $_POST['title'];
$response = "";
if(mkdir("../desktop_items/$title")){
  echo getmyuid() . ":" . getmygid() . "\n";
  if(chmod("../desktop_items/$title", 0777)){
    echo "directory perms set to 777\n";
  }else{
    echo "failed to set directory perms\n";
  }
  $response .= "directory $title created\ninitializing page html...\n";
  $page = fopen("../desktop_items/" . $title . ".php", "w");
  if(chmod("../desktop_items/" . $title . ".php", 0777)){
    echo "perms changed\n";
  }else{
    echo "failed to change permissions\n";
  }
}else{
  $reponse = " failed to make directory $title\n";
  $response .= error_get_last()[message];
}
echo "RESPONSE FROM open_page.php: ";
echo $response;
?>
