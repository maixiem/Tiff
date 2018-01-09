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