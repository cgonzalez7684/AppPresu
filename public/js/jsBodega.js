
function obtenerDato(){

    $.ajax({
        url: './liga',
        method : 'get',
        dataType: 'JSON',        
        success:function(datos){
            console.log(datos)
            alert(datos)
        },
        error:function(a,b,c){
            console.log(b)
        }
    })

}


$(document).ready(function(e){
    
    $(".movible").draggable();

    $("#btnQ").click(function(e){
        e.preventDefault()
        //alert('que ha pasao')
        obtenerDato()
    })
})

