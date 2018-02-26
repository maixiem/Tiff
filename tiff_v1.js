function open_popup(){
  document.getElementsByClassName("popup")[0].style.display = "inline";
}
function close_popup(){
  document.getElementsByClassName("popup")[0].style.display = "none";
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
function toggle(){
  var boxes = document.getElementsByName('deleted_page[]');
  for($i=0; $i< boxes.length; $i++){
    if(boxes[$i].checked){
      boxes[$i].checked = false;
    }else{
    boxes[$i].checked = true;
    }
  }
}
function show_upload(x){
  var up = document.getElementById('upload_result');
  var a = document.createElement('a',x + "was created");
  a.setAttribute('href', "../desktop_items/" + x);
  up.appendChild(a);
  up.style.display = "block";
}
