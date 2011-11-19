function viderform() {
  $("#inscriptionForm")[0].reset();
}

function show_div(div) {
  $("#"+div).toggle();
}
$(document).ready(function(){
      
    function check_fname () {
	    return $('#fname').val.match("[^A-Za-z0-9]");
	  }
	  
	  jQuery.validator.addMethod("check_name", function(value, element) { 
      return value.match(/^(?:\p{L}\p{M}*|[\-a-zA-Z àÀâÂäÄáÁéÉèÈêÊëËìÌîÎïÏòÒôÔöÖùÙûÛüÜçÇ’ñ])*$/); 
    }, "Votre nom ne doit contenir que des lettres, espaces et tirets");
	 
	$('#inscriptionForm').validate({
	  errorPlacement: function (error, element) {
              error.insertAfter(element);
           },
           showErrors: function (errorMap, errorList) {

                       this.defaultShowErrors();

                       if ($(this.currentForm).find('label.error').css('display') === 'block') {

                           $(this.currentForm).find('label.error').css('display', 'inline');
                       } 
                   },
	rules: {
	    fname: {
	      check_name: true,
	      minlength:2
	    },
	    lname: {
	      check_name: true,
	      minlength:2
	    },
	    username: {
	      required: true,
		    minlength:5
		  },
		  pwd :{
		    minlength:5
		  }
	  },
	messages : {
		login: {
			required: "Vous devez choisir un login",
			minlength: "Votre login doit faire plus de 5 caractères",
			remote: "Ce login est déjà pris"
		}
	}  
	});

	$('#username').keyup(function(){
	    var t = this; 
	    $('label.success').remove();
	if (this.value != '') {    
		if (this.value != this.lastValue) {
		      var validateUsername = $("label[for='username'].error");
		      if (this.timer) clearTimeout(this.timer);
		      if (validateUsername.length == 0) {
		        $("#username").after("<label class='error' generated='true' for='username'></label>");
		        validateUsername = $("label[for='username'].error");
		      }
		      validateUsername.html('<img src="img/ajax-loader.gif" height="16" width="16" /> checking availability...');

		      this.timer = setTimeout(function () {
		        $.ajax({
		          url: 'check_login.php',
		          data: 'username=' + t.value,
		          dataType: 'json',
		          type: 'post',
		          success: function (j) {
		            validateUsername.html(j.msg);
		            if (j.ok == 'true') {
		              $("label[for='username'].error").remove();
		              $("#username").after("<label class='success' for='username'>"+j.msg+"</label>");
		            }
		          }
		        });
		      }, 200);

		      this.lastValue = this.value;
		    }
		}else {
		  validateUsername.html("");
		}
	  });
	  
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

