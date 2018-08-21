function ingresar(){
  var usuario  = $('#usuario').val();
  var password = $('#password').val();
  if(usuario == null){
    msj('error', 'Ingrese su usuario');
    return;
  }
  if(password == null){
    msj('error', 'Ingrese su contraseña');
    return;
  }
  $.ajax({
    data : {usuario : usuario,
            password : password},
    url  : 'login/ingresar',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          location.href = 'reporte';
          $('#usuario').val("");
          $('#password').val("");
        }else {
          msj('error', data.msj);
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}
function verificarDatos(e){
  if(e.keyCode === 13){
    e.preventDefault();
    ingresar();
    }
}
function cerrarCesion(){
  $.ajax({
    url  : 'reporte/cerrarCesion',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          location.href = 'Login';
        }else {
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}
function ingresoIdioma(){
    var idioma = ().val();
    (idioma == '' ) ? 'es' : 'en'; 
    $.ajax({
        data : { idioma : idioma },
        url  : 'reporte/ingresoIdioma',
        type : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if(data.error == 0){
                $().html(data.html);
            }else {
                return;
            }
        }catch(err){
            msj('error',err.message);
        }
    });
}