<?php
//    WRITE_LINKS.php
//3 - fwrite links to title php
$dir = "../desktop_items";
if(is_dir($dir)){
  echo "it's a directory\n";
  if(opendir($dir)){
    echo "directory opened\n";
    $title = $_POST['title'];
    $title_path = "../desktop_items/" . $title . ".php";
    $desc = $_POST['description'];
    echo "WRITE HTML: " . $title_path . "\n";
    if(is_file($title_path) && file_exists($title_path)){
      echo "its a file that exists\n";
      $php = "<?php require_once '../Mobile Detect/Mobile_Detect.php';
\$detect = new Mobile_Detect; ?>";
      file_put_contents($title_path,$php,FILE_APPEND);
      //create dom document
      $dom = new DOMDocument('1.0','utf-8');

      //init html tag
      $html = $dom->createElement('html');

      /******START HEAD CONTENT******/
      $head = $dom->createElement('head');

      //create rel type attribute for later use
      $relType = $dom->createAttribute('rel');
      $relType->value = "stylesheet";

      //create link tag for fontawesome & append rel attribute
      $linkFa = $dom->createElement('link');
      $linkFa->appendChild($relType);

      //create link tag for project stylesheet & append rel attribute
      $linkProj = $dom->createElement('link');
      $linkProj->appendChild($relType);

      //create reference attribute for fontawesome
      $faRef = $dom->createAttribute('href');
      $faRef->value = "../font-awesome/css/font-awesome.min.css";

      //create reference attribute for project stylesheet
      $projRef = $dom->createAttribute('href');
      $projRef->value = "../styles/v1projects_style.php";

      //append references to respective link tags
      $linkFa->appendChild($faRef);
      $linkProj->appendChild($projRef);

      //create script tag
      $script = $dom->createElement('script');
      $script_src = $dom->createAttribute('src');
      $script_src->value = "../js/v1projects_script.js";
      $script->appendChild($script_src);

      //insert hammer.min, touch integration: https://hammerjs.github.io/
      $hammerScript = $dom->createElement('script');
      $hammerRef = $dom->createAttribute('src');
      $hammerRef->value = "../js/hammer.min.js";
      $hammerScript->appendChild($hammerRef);

      //append links to html tag
      $head->appendChild($linkFa);
      $head->appendChild($linkProj);
      $head->appendChild($hammerScript);
      //add head to html
      $html->appendChild($head);
      /*********END HEAD CONTENT**********/
      /*******START BODY CONTENT******/
      $body = $dom->createElement('body');
      //add php in node value
      $body->nodeValue = "";
      //FIRST ROW: HEADER
      $row = $dom->createElement('div');
      $row_class = $dom->createAttribute('class');
      $row_class->value = "row";
      $row->appendChild($row_class);

      $margin = $dom->createElement('div');
      $margin_class = $dom->createAttribute('class');
      $margin_class->value = "col-margin";
      $margin->appendChild($margin_class);

      $row->appendChild($margin);

      $top = $dom->createElement('div');
      $top_class = $dom->createAttribute('class');
      $top_class->value = "col-title";
      $top->appendChild($top_class);

      $header_link = $dom->createElement('a',$title);
      $header_link_ref = $dom->createAttribute('href');
      $header_link_ref->value = "/";
      $header_link_class = $dom->createAttribute('class');
      $header_link_class->value = "header";
      $header_link->appendChild($header_link_class);
      $header_link->appendChild($header_link_ref);

      $top->appendChild($header_link);
      $row->appendChild($top);

      $body->appendChild($row);
      //SECOND ROW: IMAGES + LINKS
      $row = $dom->createElement('div');
      $row_class = $dom->createAttribute('class');
      $row_class->value = "row";
      $row->appendChild($row_class);

      $margin = $dom->createElement('div');
      $margin_class = $dom->createAttribute('class');
      $margin_class->value = "col-margin";
      $margin->appendChild($margin_class);
      $row->appendChild($margin);

      $content = $dom->createElement('div');
      $content_class = $dom->createAttribute('class');
      $content_class->value = "col-content";
      $content->appendChild($content_class);
      $slide_container = $dom->createElement('div');
      $slide_container_class = $dom->createAttribute('class');
      $slide_container_class->value = "slideshow-container";
      $slide_container->appendChild($slide_container_class);

      $pic_dir = new DirectoryIterator("../desktop_items/" . $title);
      $dot_div = $dom->createElement('div');
      $dot_div_style = $dom->createAttribute('class');
      $dot_div_style->value = "dotStyle";
      $dot_div->appendChild($dot_div_style);
      $dot_num = 0;
      foreach($pic_dir as $pic){
          if(!$pic->isDot()){
          $slide = $dom->createElement('div');
          $classes = $dom->createAttribute('class');
          $classes->value = "fade mySlides";
          $slide->appendChild($classes);

          $url = "../desktop_items/" . $title . "/" . $pic->getFilename();
          $img_a = $dom->createElement('a');
          $img_a_ref = $dom->createAttribute('href');
          $img_a_ref->value = $url;
          $img_a->appendChild($img_a_ref);

          $img = $dom->createElement('img');
          $img_ref = $dom->createAttribute('src');
          $img_ref->value = $url;
          $img_class = $dom->createAttribute('class');
          $img_class->value = "slides";
          $img->appendChild($img_ref);
          $img->appendChild($img_class);

          $img_a->appendChild($img);

          $slide->appendChild($img_a);
          $slide_container->appendChild($slide);
          $dot_span = $dom->createElement('span');
          $dot_class = $dom->createAttribute('class');
          $dot_class->value = "dot";
          $dot_span->appendChild($dot_class);
          $dot_script = $dom->createAttribute('onclick');
          $dot_num = $dot_num + 1;
          $dot_script->value = "currentSlide($dot_num)";
          $dot_span->appendChild($dot_script);
          $dot_div->appendChild($dot_span);
          }
      }
      $prev = $dom->createElement('a',"&#10094;");
      $prev_class = $dom->createAttribute('class');
      $prev_class->value = "prev";
      $prev->appendChild($prev_class);
      $prev_js = $dom->createAttribute('onclick');
      $prev_js->value = "plusSlides(-1)";
      $prev->appendChild($prev_js);

      $next = $dom->createElement('a',"&#10095;");
      $next_class = $dom->createAttribute('class');
      $next_class->value = "next";
      $next->appendChild($next_class);
      $next_js = $dom->createAttribute('onclick');
      $next_js->value = "plusSlides(1)";
      $next->appendChild($next_js);

      $slide_container->appendChild($prev);
      $slide_container->appendChild($next);

      $content->appendChild($slide_container);
      $content->appendChild($dot_div);
      $row->appendChild($content);

      $half = $dom->createElement('div');
      $half_class = $dom->createAttribute('class');
      $half_class->value = "col-half";
      $half->appendChild($half_class);
      if(is_writable($title_path)){
        echo $title_path . " is writable\n";
        foreach($_POST as $key => $value) {
        if($key != 'title' && $key != 'description'){
          //make link
          $p = $dom->createElement('p');
          $link = $dom->createElement('a', $key);
          $ref = $dom->createAttribute('href');
          $ref->value = $value;
          $link->appendChild($ref);
          $p->appendChild($link);

          //append link to body
          $half->appendChild($p);
          }
        }
      $row->appendChild($half);

      $body->appendChild($row);
        //THIRD ROW: DESCRIPTION
      $row = $dom->createElement('div');
      $row_class = $dom->createAttribute('class');
      $row_class->value = "row";
      $row->appendChild($row_class);

      $margin = $dom->createElement('div');
      $margin_class = $dom->createAttribute('class');
      $margin_class->value = "col-margin";
      $margin->appendChild($margin_class);
      $row->appendChild($margin);

      $content = $dom->createElement('div',$desc);
      $content_class = $dom->createAttribute('class');
      $content_class->value = "col-content";
      $content->appendChild($content_class);

      $row->appendChild($content);

      $fill = $dom->createElement('div');
      $fill_class = $dom->createAttribute('class');
      $fill_class->value = "col-fill";
      $fill->appendChild($fill_class);

      $row->appendChild($fill);

      $body->appendChild($row);
      $body->appendChild($script);
        //append body to html
        $html->appendChild($body);
        //append html to dom
        $dom->appendChild($html);
        //save dom as string
        $page = $dom->saveHTML();
        file_put_contents($title_path,$page);
      }else{
        echo "$title_path is not writable\n";
       }
    }else{
      echo "its not a file, or doesn't exist\n";
    }
  }
}else{
  echo "fuck you\n";
}
?>
