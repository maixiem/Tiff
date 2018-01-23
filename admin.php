<html>
<body>
  <script src="tiff_v1.js"></script>
<h2>Page Creation</h2>
  <form action="create.php" method="post" enctype="multipart/form-data">
    Page name: <input type="text" name="page_stuff[]"><br>
    Description:<br><textarea rows="30" cols="50" name="page_stuff[]" placeholder="Enter your description here. Can include links and other html tags"></textarea>
    <br>
    <!-- add drag and drop file upload-->
  <input type="file" name="images[]" id="images" multiple="multiple">
  <br>
      <input type="submit">
      </form>

<h2>Edit a page</h2>
<!--create edit php script, will probably require fiddling with create.php too-->
Select a page to edit: <form action="/edit.php"><select name="edit">
  <?php $dir = new DirectoryIterator('./desktop_items');
  $dir->next();
  $dir->next();
  while($dir->valid()){
    echo "<option value=\"" . $dir->getFilename() . "\">" . $dir->getFilename() . "</option>";
    $dir->next();
  } ?>
</select>
</form>
<input type="submit">
<h2> Delete a page</h2>
<div style="width:100%; box-sizing:border-box;">
      <?php
      $dir = new DirectoryIterator('./desktop_items');
      $dir->next();
      $dir->next();
      echo "<form action=\"delete.php\" method=\"post\" id=\"delete_form\">";
      while($dir->valid()){
        echo "<span style=\"display:inline; text-align: left;\">
          <input type=\"checkbox\" id=\"delete\" name=\"deleted_page[]\" value=\"" . $dir->getFilename() . "\">";
          echo "<label for=\"delete\" style=\"display:inline;\">";
          echo "           <a href=\"desktop_items/" . $dir->getFilename() . "\">" . $dir->getFilename() . "</a></label>";
          echo "</span><p>";
          $dir->next();
        }
        ?>
        <input type="submit" class="buttons">
      </form>
      </div>
</body>
</html>
