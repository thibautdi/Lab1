function success(position) {
  var s = document.querySelector('#status');
  
  if (s.className == 'success') {
    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back    
    return;
  }
  
  s.innerHTML = "Trouvé !";
  s.className = 'success';
  
  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '400px';
  mapcanvas.style.width = '560px';
  
  document.querySelector('article').appendChild(mapcanvas);
  $("#position").css("visibility","hidden");
  $("#position").html(position.coords.latitude+","+ position.coords.longitude);
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
  
  var marker = new google.maps.Marker({
      position: latlng, 
      map: map, 
      title:"Vous êtes içi!"
  });
  $.ajax({
    url: 'closest.php',
    data: 'location=' + $("#position").html() ,
    dataType: 'json',
    type: 'post',
    success: function (j) {
      if (j.status == "ok") {
        for (var i = 0; i < 5; i++) {
          var r = i+ 1;
          $("#top_"+i).html(r+" "+j.response[i].name + " :"+j.response[i].distance_data.distance.text+", "+ j.response[i].distance_data.duration.text +" à pied.");
        }
      }else {
        $("#position").html("<p>Nous utilisons l'API distance Matrix de google maps. Son utilisation (gratuite) est limitée, pour en savoir plus : <a href='https://code.google.com/apis/maps/documentation/distancematrix/'> c'est içi</a>.\"Each query sent to the Distance Matrix API is limited by the number of allowed elements, where the number of origins times the number of destinations defines the number of elements.The Distance Matrix API has the following limits in place : 100 elements per query. 100 elements per 10 seconds. 2 500 elements per 24 hour period.\"<p>");
        
      }
    }
  });
} 

function error(msg) {
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed";
  s.className = 'fail';
  
  // console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('Votre fureteur ne supporte pas la géolocalisation ! Installez en un plus récent');
}