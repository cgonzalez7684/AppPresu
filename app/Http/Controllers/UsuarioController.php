<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

class UsuarioController extends Controller
{
    public function mostrar(){
       // $datos = Usuario::all();
       // dd($datos);
       return json_encode("Carlos");
    }

    public function getUsuarios(Request $request)
    {
        $response = ['Resultado'=>'Exitoso',
                     'Texto'=>'Consulta de datos',
                     'Data'=>Null];
        try {
            
            $usuarios = Usuario::all();
            $response['Data'] = $usuarios;
            return json_encode($response);

            
        } catch (\Throwable $th) {
            $response['Resultado'] = 'Fallido';
            $response['Texto'] = 'Error ['.$request->path().']: '.' '.$th->errorInfo[2];
            $response['Data'] =  $th ;
            return json_encode($response);
        }
        
  
    }

    public function registerUsuario(Request $request)
    {
        $response = ['Resultado'=>'Exitoso',
                     'Texto'=>'Registro de usuario correcto',
                     'Data'=>Null];
        try {
            $objUsrRequest = $request->input();
            $usuario = new Usuario;            
            $usuario->sUsuario = $objUsrRequest['sUsuario'];
            $usuario->sPassUsr = $objUsrRequest['sPassUsr'];
            $usuario->sNomPersona = $objUsrRequest['sNomPersona'];
            $usuario->sApe1Persona = $objUsrRequest['sApe1Persona'];
            $usuario->sApe2Persona = $objUsrRequest['sApe2Persona'];
            $usuario->nActDirectory = $objUsrRequest['nActDirectory'];
            $usuario->nActivo = $objUsrRequest['nActivo'];
            $usuario->save();
            return json_encode($response);

            
        } catch (\Throwable $th) {
            $response['Resultado'] = 'Fallido';
            $response['Texto'] = 'Error ['.$request->path().']: '.' '.$th->errorInfo[2];
            $response['Data'] =  $th ;
            return json_encode($response);
        }      
    }

    public function updateUsuario(Request $request){

        $response = ['Resultado'=>'Exitoso',
        'Texto'=>'Actualizacion de usuario correcto',
        'Data'=>Null];

        try {
            $objUsrRequest = $request->input();
            $usuario = Usuario::where('sUsuario', $objUsrRequest['sUsuario'])->first();

            if ($usuario == null){
                $response['Resultado'] = 'Fallido' ;
                $response['Texto'] = 'Usuario por actualizar no se encuentra';
                return json_encode($response);
            }

            $usuario->sPassUsr = $objUsrRequest['sPassUsr'];
            $usuario->sNomPersona = $objUsrRequest['sNomPersona'];
            $usuario->sApe1Persona = $objUsrRequest['sApe1Persona'];
            $usuario->sApe2Persona = $objUsrRequest['sApe2Persona'];
            $usuario->nActDirectory = $objUsrRequest['nActDirectory'];
            $usuario->nActivo = $objUsrRequest['nActivo'];
            $usuario->save();
            return json_encode($response);
            


        } catch (\Throwable $th) {
            $response['Resultado'] = 'Fallido';
            $response['Texto'] = 'Error ['.$request->path().']: '.' '.$th->errorInfo[2];
            $response['Data'] =  $th ;
            return json_encode($response);
        }
    }
}
