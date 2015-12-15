$("#form_categoria").change(function(event)
  {
    var value = $("#form_categoria").val();
    console.log(value);
    $.ajax({
        type: "POST",
        data: { idCategoria: value },
        url: "/subir"
    }) 
    .done(function(response){
      // alert(JSON.stringify(response,null,4) );
      console.log(response);
        template = response;
        $('#outputTwo').html(template); 
    event.preventDefault();
    })
    .fail(function(jqXHR, textStatus, errorThrown){
        console.log(errorThrown);
        alert('Error : ' + errorThrown);
    });
    event.preventDefault();
  });