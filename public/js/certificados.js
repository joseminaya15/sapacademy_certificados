function certificado(session) {
    $.ajax({
        data : {session : session},
        url  : 'Descargas/descarga',
        type : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if (data.error == 0) {
                $('#visualizar').attr({
                    href : 'Certificado',
                    target: '_blank'
                });
                // $('.js-certificados__contenido--right').find('a').attr('href','Certificado');
            } else {
                toastr.remove();
                msj('error', data.error);
            }
        } catch (err){
            toastr.remove();
            msj('error', err.message);
        }
    });
}
function cerrarSesion(){
    $.ajax({
        url  : 'Descargas/cerrarSesion',
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
            toastr.remove();
            msj('error',err.message);
        }
	});
}