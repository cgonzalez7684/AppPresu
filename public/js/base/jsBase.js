/* Detalle    : función que muestra mensaje en pantalla con la respuesta del server
*  Parametros : - pResponse : mensaje desde el servidor
*/
function messageRespuesta(pResponse,pForm = null){
   
    Swal.fire({
        position: 'bottom-end',
        icon: (pResponse.Resultado == 'Exitoso' ? 'success' : 'error'),
        title: pResponse.Resultado,
        text: pResponse.Texto,
        showConfirmButton: false,
        timer: 1600
      }).then(function (){
        if (pForm != null){
            clearControles(pForm)
        }
      })
  
}


/* Detalle    : función generica para Insert-Update-Delete de tablas en BD
*  Parametros : - pAction   : es el URL a invocar en el server
*               - pMethod   : tipo verbo HTTP a utilizar
*               - pData     : object JS a enviar al server
*               - pResponse : respuesta del server
*               - pTipo     : (A) Accion - (D) Data
*/
function requestServidor(pAction,pMethod,pTipo='A',pData = null,pForm = null,){
    
    $.ajax({
        url: pAction,
        method : pMethod,
        headers: {
            'X-CSRF-TOKEN': $("#token").val()
        },  
        dataType: 'JSON',      
        data : pData,       
        success:function(pResponse){           
            if (pTipo == 'A'){
                messageRespuesta(pResponse,pForm)
                        
            }            
            if (pTipo == 'D'){                                              
                pData(pResponse.Data) //metodo que carga el dataTable
            }
            
            return true;
        },
        error:function(a,b,c){                    
            console.log(b+'->'+c)
            return false;
        }
    })

}


function clearControles(pForm){

    pForm.find("input").each(function (index, element) {   
        
        if ($(this).attr('type') == 'text' || $(this).attr('type') == 'password'){
            if ($(this).attr('id') != 'token'){
                $(this).val('');  
                return true      
            }  
            return true
        }

        if ($(this).attr('type') == 'checkbox'){
            $(this).prop("checked", false);
            return true
        }     

    });

    pForm.find("select").each(function (index, element){
        $(this).get(0).selectedIndex = 0
    });


}

