 $(document).ready(function(){
    $("#inscriptionForm").validate();
  });
  
function viderform() {
  $("#inscriptionForm")[0].reset();
}

function show_div(div) {
  $("#"+div).toggle();
}

jQuery(document).ready(function(){
   
   $("#club_rating").bind({
     mouseenter: function(e){
      if ($('#already_rated').val() != "yes") {
        var dif;
      
        this.iid = setInterval(function() {
               // do something           
               //$('#test').html(dif);
              // dif = e.pageX - $(".stars").offset().left;
      
               $(document).mousemove(function(e){
                 dif = e.pageX - $(".stars").offset().left;
                  });
              
        for (var i = 0; i < 10; i++) {
          var left = i+ "0";
          var right = i+1;
          right = right + "0";
          var filled = i + 1;
        
          if (eval(left) <= dif  && dif <= eval(right)) {
            $('.stars').not(".empty").removeClass().addClass('stars filled_'+ filled);
          }
        }
      }, 200);
    }
   }, 
   mouseleave: function(e){
     if ($('#already_rated').val() != "yes") {
       var r = $('#hidden_rating').val();
       $('.stars').not(".empty").removeClass().addClass('stars filled_'+r);
       this.iid && clearInterval(this.iid);
    }
   },
   mousedown: function(e) {  
   if ($('#logged_in').val() == "yes") {
     if ($('#already_rated').val() != "yes") {
       var  dif = e.pageX - $(".stars").offset().left;
       for (var i = 0; i < 10; i++) {
         var left = i+ "0";
         var right = i+1;
         right = right + "0";
         var filled = i + 1;

         if (eval(left) <= dif  && dif <= eval(right)) {         
           $('#test').html(filled);
           $('#hidden_rating').val(filled);
           $('#rating_form').submit();
         }
       }
    }
  }  
  else {
    alert("Vous devez être loggé pour noter une boite.");
  }
}
});
});

