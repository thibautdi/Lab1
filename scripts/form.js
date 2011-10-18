 $(document).ready(function(){
    $("#inscriptionForm").validate();
  });
  
function viderform() {
  $("#inscriptionForm")[0].reset();
}

function show_div(div) {
  $("#"+div).toggle();
}