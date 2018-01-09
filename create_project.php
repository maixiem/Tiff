<html>
<body>
  <form action="create.php" method="post">
    Page name: <input type="text" name="page_name"><br>
    Description:<br><textarea rows="30" cols="50">Enter your description here. Can include links and other html tags
  </textarea><br>
    <!--
    list all pages in desktop desktop_items
    delete option
    edit option (?somehow i'd have to grab the information... store it in a different part
    of the automated page?)
    -->
      <input type="submit">
      </form>
<div style="width:100%; box-sizing:border-box;">
      <span style="width:80%; border-bottom: #000 1px solid; box-sizing: border-box;">
        Delete pages
      </span>
      <p>
      <?php
      $dir = new DirectoryIterator('./desktop_items');
      $dir->next();
      $dir->next();
      echo "<form action=\"delete.php\" method=\"post\">";
      while($dir->valid()){
        echo "<span style=\"display:inline; text-align: left;\">
          <input type=\"checkbox\" id=\"delete\" name=\"delete_page\" value=\"" . $dir->getFilename() . "\">";
          echo "<label for=\"delete\" style=\"display:inline;\">";
          echo "           <a href=\"desktop_items/" . $dir->getFilename() . "\">" . $dir->getFilename() . "</a></label>";
          echo "</span><p>";
          $dir->next();
        }
        ?>
        <input type="submit">
      </form>
      </div>
</body>
</html>
