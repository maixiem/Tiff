function open_popup(){
  document.getElementById("popup").style.display = "inline";
}
function close_popup(){
  document.getElementById("popup").style.display = "none";
}
function folder_open(id){
  id.innerHTML = "<i class=\"fa fa-folder-open\" aria-hidden=\"true\"></i>";
}
function folder_close(id){
  id.classList.remove("fa-folder-open");
  id.classList.add("fa-folder");
}

function folder_test(id){
  id.classList.remove("fa-folder");
  id.classList.add("fa-folder-open");
}
var i=1;
function addLink(){
  i+=1;
  var name = document.createElement("P");
  name.appendChild(document.createTextNode(`Link name ${i}: `));
  var url = document.createElement("P");
  url.appendChild(document.createTextNode(`Link URL ${i}: `));

  var name_input = document.createElement("input");
  var url_input = document.createElement("input");
  name_input.type = "text";
  name_input.name = "link_names[]";
  url_input.type = "text";
  url_input.name = "link_urls[]";


  name.appendChild(name_input);
  url.appendChild(url_input);
  document.getElementById("link_container").appendChild(name);
  document.getElementById("link_container").appendChild(url);
}

function toggle(x){
  var boxes = document.getElementsByName('deleted_page[]');
  for($i=0; $i< boxes.length; $i++){
    boxes[$i].checked = true;
  }
}
