var Usuario = null;
var datos = []
var tablaDatos = null;

function setUsuario(){
    Usuario = {
        sUsuario : $('#txtsUsuario').val(),
        sPassUsr : $('#txtsPassUsr').val(),
        sNomPersona : $('#txtsNomPersona').val(),
        sApe1Persona : $('#txtsApe1Persona').val(),
        sApe2Persona : $('#txtsApe2Persona').val(),
        nActDirectory : $('#chkActDirectory').is(":checked") ? 1 : 0,
        nActivo : $('#cmbnActivo'). children("option:selected"). val()
    }
}


function deleteUsuario(){
    setUsuario()
    requestServidor('deleteUsuario','POST','A',Usuario,$("#frmUsuarios"))
    getUsuarios() 
}


function updateUsuario(){
    setUsuario()
    requestServidor('updateUsuario','POST','A',Usuario,$("#frmUsuarios"))
    getUsuarios() 
}

function registerUsuario(){

    setUsuario()
    requestServidor('registerUsuario','POST','A',Usuario,$("#frmUsuarios"))
    getUsuarios()  
}

function getUsuarios(){    
    requestServidor('getUsuarios','GET','D',cargaTabla)  
}



function requestServer2(){

    $.ajax({
        url: './mostrar',
        method : 'POST',  
        headers: {
            'X-CSRF-TOKEN': $("#token").val()
        },                  
        success:function(pResponse){
            console.log(pResponse)
            //alert(pResponse)
        },
        error:function(a,b,c){
            console.log(b)
        }
    })

}



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

function eventoSelect ( e, dt, type, indexes ) {
    var rowUsuario = dt.rows(indexes).data()[0];

    //console.log(filaObtenida.sNomPersona+' '+filaObtenida.sPassUsr)

    $('#txtsUsuario').val(rowUsuario.sUsuario)
    $('#txtsPassUsr').val(rowUsuario.sPassUsr)
    $('#txtsNomPersona').val(rowUsuario.sNomPersona)
    $('#txtsApe1Persona').val(rowUsuario.sApe1Persona)
    $('#txtsApe2Persona').val(rowUsuario.sApe2Persona)
    var checked = rowUsuario.nActDirectory == 1 ? true : false
    $('#chkActDirectory').prop('checked',checked)
    $('#cmbnActivo').val(rowUsuario.nActivo)
               
}

function eventoDeSelect ( e, dt, type, indexes ) {
    var filaObtenida = dt.rows( indexes ).data()[0];
    console.log('DeSelecciono: '+filaObtenida.sNomPersona+' '+filaObtenida.sPassUsr)
               
}

function cargaTabla(pDatos){

    if ($.fn.dataTable.isDataTable('#dataTable')){
        tablaDatos.destroy();
    }
    

    arrDatos = []
    pDatos.map(function (k,v){
        k.nomCompleto = k.sNomPersona+' '+k.sApe2Persona+' '+k.sApe1Persona
        k.ActiveDirectory = k.nActDirectory == 1 ? 'SI' : 'NO'
        k.Estado = k.nActivo == 1 ? 'Activo' : 'Inactivo'
        arrDatos.push(k)
    })
    //console.log(usuarios)
    tablaDatos = $("#dataTable").DataTable({  
        responsive : false,          
        dom: 'rtipf',
        buttons: [ 
            {extend:'pdf',text:"PDF",filename:"ArchivoPDFJa",title:"Generado"}, 
            'copy', 
            'csv', 
            'excel'                
            ],
        paging:   false,
        ordering: true,
        info: false,
        searching: true,            
        data : arrDatos,
        scrollY: '35vh',
        scrollCollapse: false,
        columnDefs: [
            // Center align the header content of column 1
           { className: "dt-head-center", targets: [ 0 ] },
           // Center align the body content of columns 2, 3, & 4
           { className: "dt-body-center", targets: [ 1, 2, 3 ] }
        ],
        columns: [
            {name:"nIdUsuario",data:"nIdUsuario", searchable : false, visible : false},
            {title: "Usuario",name:"sUsuario",data:"sUsuario",width: "20%", searchable : true, visible : true},
            {title: "Nombre",name:"nomCompleto",data:"nomCompleto",width: "50%", searchable : false, visible : true},
            {title: "AD",name:"ActiveDirectory",data:"ActiveDirectory",width: "10%", searchable : false, visible : true},
            {title: "Estado",name:"Estado",data:"Estado",width: "20%", searchable : false, visible : true},
            {name:"sPassUsr",data:"sPassUsr", searchable : false, visible : false},
            {name:"sNomPersona",data:"sNomPersona", searchable : true, visible : false},
            {name:"sApe1Persona",data:"sApe1Persona", searchable : true, visible : false},
            {name:"sApe2Persona",data:"sApe2Persona", searchable : true, visible : false},
            {name:"nActDirectory",data:"nActDirectory", searchable : false, visible : false},
            {name:"nActivo",data:"nActivo", searchable : false, visible : false}
                        
        ],
        select : true,
        oLanguage: {
            "sSearch": "Buscar"
          }
        

    });

    tablaDatos.on('deselect',eventoDeSelect)
    tablaDatos.on('select',eventoSelect)
}


$(document).ready(function(e){
    
    $(".movible").draggable();
    getUsuarios()
    //tabla(getUsuarios)
    //$('#dataTable').DataTable();

    $("#btnNuevo").click(function(e){
        e.preventDefault()
        registerUsuario()               
       
    })

    $('#btnModificar').click(function(e){
        e.preventDefault()
        updateUsuario()
    })

    $('#btnEliminar').click(function(e){
        e.preventDefault()
        deleteUsuario()
    })

    $("#txtsUsuario").focus();
})

