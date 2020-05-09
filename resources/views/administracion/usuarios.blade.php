@extends('base.masterBase')

@section('cssDinamico')


  <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
 
  <link rel="stylesheet" type="text/css" href="{{asset('css/administracion/cssUsuarios.css')}}"/>
   


@endsection

@section('contenidoDinamico')

<div class="card movible" style="width: 80%;">
  <div class="card-header"><i class="fas fa-users-cog"></i>
    Gestión de usuarios
  </div>
  <div class="card-body">  
    <div class='row'>
        <div class="col-md-5">
            <form autocomplete="off" id="frmUsuarios">
            <input type="hidden" id="token" value="{{csrf_token()}}">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="txtUsuario">Usuario</label>
                <input type="text" class="form-control" id="txtsUsuario" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="txtPassword">Password</label>
                <input type="password" class="form-control" id="txtsPassUsr" value="">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="chkActDirectory">
                <label class="form-check-label" for="gridCheck">
                  Autenticación de dominio
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="txtNomUsuario">Nombre</label>
              <input type="text" class="form-control" id="txtsNomPersona">
            </div>
            <div class="form-group">
              <label for="txtAp1Usuario">Primer apellido</label>
              <input type="text" class="form-control" id="txtsApe1Persona">
            </div>
            <div class="form-group">
              <label for="txtAp2Usuario">Segundo apellido</label>
              <input type="text" class="form-control" id="txtsApe2Persona">
            </div>
            <div class="form-row">    
              <div class="form-group col-md-4">
                <label for="cmbDepartUsuario">Estado</label>
                <select id="cmbnActivo" class="form-control">        
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>        
                </select>
              </div>    
            </div>
            <div class="row">    
                   
              <div class="col-sm-4">
                <button class="btnCtrl" id="btnNuevos"><i class="fas fa-user"></i> Nuevo</button>                                 
              </div>
              <div class="col-sm-4">
                <button class="btnCtrl" id="btnModificar"><i class="fas fa-user-edit"></i>  Modificar</button>
              </div>
              <div class="col-sm-4">
              <button class="btnCtrl" id="btnEliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-7">
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover table-sm compact">
            
                <thead>
                  
                </thead>                      
                <tbody>                                      
                </tbody>
            </table>

        </div>
        </div>
    </div>
  </div>
  
</div>



@endsection

@section('contenidoJavaScript')
 <!--Tablas-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

<script src="{{asset('js/administracion/jsUsuarios.js')}}"></script>

@endsection