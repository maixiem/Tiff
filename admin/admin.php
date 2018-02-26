<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../styles/admin_style.css">
    <script type="application/javascript">window.URL = window.URL || window.webkitURL;</script>
    <script src="../tiff_v1.js"></script>
  </head>
  <body>
  <div class="chunk">
    <h2>Page Creation</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
      <div id="title_container">Page name:
      <input type="text" id="title"></input></div>
      <br></br>
      Description:
      <br></br>
      <textarea rows="10" cols="73"
                id="description"
                placeholder="Enter your description here. Can include links and other html tags"></textarea>
        <p>Insert Images:</p>
        <p></p>
        <div class="dropcontainer">
          <div id="dropzone">
            <div id="fileSelect">
                Drag & drop your file here...
            </div>
          </div>
          <div id="delete" onclick="del()">
            🗑️ Trash Selected
          </div>
        </div>

<script type="application/javascript">
var links = new FormData();
var files = new FormData();
var desc="";
window.onload = function() {
/**LINK CHANGE EVENT LISTENER**/
  document.getElementById("link_container").addEventListener("change",
  function(){
    var n = document.getElementsByClassName("link_names");
    var u = document.getElementsByClassName("link_urls");
    for(var i=0; i < n.length; i++){
      if(n[i].value != "" && u[i].value!=""){
        console.log(n[i].value);
        console.log(u[i].value);
        links.set(n[i].value,u[i].value);
      }else{
       console.log("Incomplete link");
        }
      }
    console.log("------------");
    }
  );
/**DESCRIPTION CHANGE EVENT LISTENER**/
  document.getElementById("description").addEventListener("input",
  function(){
    desc = this.value;
    }
  );
/**DRAG & DROP INTERACTIVITY**/
  var dropzone = document.getElementById("dropzone");

  //drag over/enter event
  dropzone.ondragover = dropzone.ondragenter = function(event) {
    event.stopPropagation();
    event.preventDefault();
    dropzone.setAttribute("style","font-color: gray;");
  }

  //on drop (mouse release) event, get data
  var dnd_entry = 0;
  dropzone.ondrop = function(event) {
    event.stopPropagation();
    event.preventDefault();

    var filesArray = event.dataTransfer.files;
    if(!filesArray.length){
      dropzone.innerHTML = "No files selected";
    }else{
      dnd_entry+=1;
      //if first iteration, clear prompt text
      if(dnd_entry==1){dropzone.innerHTML = "";}

      //loop which displays thumbnails of selected images
      for(var i=0; i< filesArray.length; i++){
        var box = document.createElement("div");
        box.classList.add("box");
        dropzone.appendChild(box);

        var t = document.createElement("div");
        t.classList.add("tile");
        box.appendChild(t);
        box.setAttribute("onclick","this.classList.toggle(\"selected\")");

        var img = document.createElement("img");
        img.setAttribute('id','pic');
        img.style.display = "block";
        img.src = window.URL.createObjectURL(filesArray[i]);
        img.height = 60;
        //internal update of files array to send
        files.append(filesArray[i].name,filesArray[i]);
        box.name = filesArray[i].name;
        //debug
        console.log(t);
        //external update of thumbnails displayed
        t.appendChild(img);
        var info = document.createElement("span");
        info.innerHTML = filesArray[i].name + ": " + filesArray[i].size/1000 + " kb";
        t.appendChild(info);
      }
    }
  }
}
/**END ONLOAD FUNCTION**/

function del(){ //for when the user wants to remove a file from the buffer
  var p = document.getElementById("dropzone");
  var d = document.getElementsByClassName("selected");
  for(var i = 0; i< d.length; i++){
    var name = d[i].name;
    files.delete(name);
    p.removeChild(d[i]);

    //if all files have been removed from buffer, display text
    if(document.getElementById("dropzone").getElementsByClassName("tile").length == 0){
      var txt = document.createElement("div");
      txt.setAttribute("id","fileSelect");
      txt.innerHTML = "No file selected";
      document.getElementById("dropzone").appendChild(txt);
    }
    console.log(name);
  }
}

//get current title
var p = document.getElementById("title");
var title = p.value;
p.addEventListener("input",
function(){
  title = document.getElementById("title").value;
  if(title!=""){
    document.getElementById('title_container').classList.remove('err');
  }
 }
);

//dynamically build input for additional links
var i=1;
function addLink(){
  if(!document.getElementById(`link_name_${i}`).value){
    alert("Enter a value for blank links first");
  }else{
    var n = document.getElementById(`link_name_${i}`).value;
    var u = document.getElementById(`link_url_${i}`).value;
    i+=1;
    var link = document.createElement("P");
    link.classList.add("link_" + i);
    link.appendChild(document.createTextNode(`Link name ${i}: `));
    var name_input = document.createElement("input");
    name_input.type = "text";
    name_input.classList.add("link_names");
    name_input.id = "link_name_" + i;
    link.appendChild(name_input);

    link.appendChild(document.createTextNode(`Link URL ${i}: `));
    var url_input = document.createElement("input");
    url_input.type = "text";
    url_input.classList.add("link_urls");
    url_input.id = "link_url_" + i;
    link.appendChild(url_input);
    document.getElementById("link_container").appendChild(link);
  }
}
/*****START FILE TRANSFER FUNCTION*****/
function sendFiles(){
//create 4 functions for title, desc, files, and links
//send title creates upload directory and php file and returns title as response text
//description takes response text of title and writes to php file of given name
//still using title from page, upload files to created directory
  if(title != ""){
    var OPEN_PAGE = "open_page.php";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", OPEN_PAGE, true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200){ //only if page is successfully created, write html to it
      console.log("Title: " + xhr.responseText); //debug
      if(links.entries().next().done){
        console.log("no links"); //debug
        var dfd = new FormData();
        dfd.append('description',desc);
        dfd.append('title',title);
        var WRITE_HTML = "write_html.php";
        var desc_xhr = new XMLHttpRequest();
        desc_xhr.open("POST", WRITE_HTML, true);
        desc_xhr.onreadystatechange = function() {
          if(desc_xhr.readyState == 4 && desc_xhr.status == 200){
            console.log(desc_xhr.responseText);
          }
        };
        desc_xhr.send(dfd);
      }else{
        var ld = links;
        ld.append("title",title);
        ld.append("description",desc);

        var WRITE_HTML = "write_html.php";
        var link_xhr = new XMLHttpRequest();
        link_xhr.open("POST", WRITE_HTML, true);
        link_xhr.onreadystatechange = function() { if (link_xhr.readyState == 4 && link_xhr.status == 200){
          console.log(link_xhr.responseText);
          }};
        link_xhr.send(ld);
      }
    }
    show_upload(title);
  };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("title=" + title);
    //so long as there is a title, files can be uploaded
    if(files.entries().next().done){
      console.log("no files");
    }else{
      var fd = files;
      fd.append("title",title)
      var UPLOAD_IMGS = "upload_imgs.php";
      var img_xhr = new XMLHttpRequest();
      img_xhr.open("POST", UPLOAD_IMGS,true);
      img_xhr.onreadystatechange = function() { if (img_xhr.readyState == 4 && img_xhr.status == 200){ console.log(img_xhr.responseText)}};
      img_xhr.send(fd);
    }
  }else{
    console.log("must have title");
    var err = document.getElementById('title_container');
    err.classList.add('err');
    return; //if no title, cut off function and return
  }
}
/**END FILE TRANSFER FUNCTIONS**/
</script>
<p></p>
Insert Links:
<div id="link_container">
    <p class="link">
      Link name: <input type="text" class="link_names" name="link_names[]" id="link_name_1"></input>
      Link URL: <input type="text" class="link_urls" name="link_urls[]" id="link_url_1"></input></p>
</div>
<span onclick="addLink()" style="text-decoration:underline; color:blue;cursor: pointer;">Add another link</span>
<p></p>
<div id="confirm" onclick="sendFiles()">Confirm</div>
</form>
<p id="upload_result"></p>
</div>

<!-- END PAGE CREATION SCRIPT-->
<!-- EDIT SCRIPT-->
<div class="chunk">
<h2>Edit a page</h2>
Select a page to edit: <form action="/edit.php">
<select name="edit">
  <?php
  $dir = new DirectoryIterator('../desktop_items');
  $dir->next();
  $dir->next();
  while($dir->valid()){
    echo "<option value=\"" . $dir->getFilename() . "\">" . $dir->getFilename() . "</option>";
    $dir->next();
  } ?>
</select>
</form>
<input type="submit">
</div>
<!-- END EDIT SCRIPT-->
<!-- START PAGE DELETION SCRIPT-->
<div class="chunk">
<h2> Delete something!</h2>
  <form action="delete.php" method="post" id="delete_form" onsubmit="return confirm('Are you sure you want to delete these items?')">
  <input type="checkbox" onClick="toggle()">Select all<p>
      <?php
      $dir = new DirectoryIterator('../desktop_items');
      $dir->next();
      $dir->next();
      while($dir->valid()){
        echo "<span style=\"display:inline; text-align: left;\">
          <input type=\"checkbox\" id=\"delete\" name=\"deleted_page[]\" value=\"" . $dir->getFilename() . "\">";
          echo "<label for=\"delete\" style=\"display:inline;\">";
          if(is_dir("../desktop_items/" . $dir->getFilename())){
            echo "           <a href=\"../desktop_items/" . $dir->getFilename() . "\">" . $dir->getFilename() . " (folder)</a></label>";
          }else{
            echo "           <a href=\"../desktop_items/" . $dir->getFilename() . "\">" . $dir->getFilename() . "</a></label>";
          }
          echo "</span><p>";
          $dir->next();
        }
        ?>
        <input type="submit" class="buttons">
      </form>
   </div>
<script src="../tiff_v1.js"></script>
</body>
</html>
