var apiRoot = 'http://saso.local/tallerphp2016/api/v1';

$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  
  $.ajax({
    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/autos"
  })
  .done(function( autos ) {
    console.log(autos);

    $.each(autos, function(index, auto) {
      
       let html = '<div class="col-lg-4">';
         html += '<h2>' + auto.marca + '</h2>';
         html += '<p>' + auto.modelo + '</p>'; 
         html += '<p> <a class="btn btn-default">' + auto.anio + '</a></p>';
         html += '</div>';

         $('.body-content .row').append(html);

    });

  });

});