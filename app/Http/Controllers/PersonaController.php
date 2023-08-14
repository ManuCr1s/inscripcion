<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Persona;
use App\Models\Rol;
use App\Mail\PersonMail;
use Illuminate\Support\Facades\Mail;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $token = 'apis-token-5154.cBCAdbcB0HqNf-LS6NKFx6r9ivuGb9NW';
    public function index()
    {
        return view('user.inscripcion');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_rol(string $cadena){
        try {
            $rol = new Rol;
            $rol->ur_v_codrol = "CIUDADANO";
            $rol->ur_v_codusuario = $cadena;
            $rol->ur_n_activo = 1;
            $rol->ur_n_id_puntodig = 1;
            $rol->ur_n_id_tablapaisdocemisorur = 16;
            $rol->ur_v_codpaisdocemisorur = "PE";
            $rol->ur_n_id_tablatipodocur = 22;
            $rol->ur_v_codtipodocur = "01";
            $rol->ur_v_numerodocur = "0000";
            $rol->ur_v_codusuariocrea = "SEGURIDAD";
            $rol->ur_d_feccrea = now();
            $rol->ur_v_documentocrea = "0000";
            $rol->ur_n_id_tablapaisdocemisorum = 16;
            $rol->ur_v_codpaisdocemisorum = "PE";
            $rol->ur_n_id_tablatipodocum = 22;
            $rol->ur_v_codtipodocum = "01";
            $rol->ur_v_numerodocum = "0000";
            $rol->ur_v_codusuarioact = "SEGURIDAD";
            $rol->ur_d_feccact = now();
            $rol->ur_v_documentoact = "0000";
            $rol->ur_n_flagregistroeliminado = 0;
            $rol->ur_v_ipestacion = "200.10.69.227";
            $rol->save();
            return array ("success"=>true,"message"=>"Se registro Exitosamente al usuario y su Rol");
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return array ( "success"=>false,"message"=>"No se pudo registrar al rol del usuario");
        }

    }


    public function create_user($numero,$nombre,$apellidopat = null,$apellidomat=null,$correo,$direccion,$tipo)
    {
        try {
            $user = new Persona;
            $user->usu_v_codusuario =$numero;
            $user->usu_v_nombrescompletos = ($nombre.' '.$apellidopat.' '.$apellidomat);
            $user->usu_n_id_tablapaisdocemisor = 16;
            $user->usu_v_codpaisdocemisor = "PE";
            $user->usu_n_id_tablatipodoc = 22;
            $user->usu_v_codtipodoc = '0'.$tipo; 
            $user->usu_v_numerodoc = $numero; 
            $user->usu_v_clave = "J+2Z56mW8nlYy7XSrol77Q==";
            $user->usu_v_correo = $correo;
            $user->usu_v_ipestacion = "200.10.69.227";
            $user->usu_n_id_puntodig = 1; 
            $user->usu_n_id_tablapaisdocemisorur = 16;
            $user->usu_v_codpaisdocemisorur = "PE";
            $user->usu_n_id_tablatipodocur = 22;
            $user->usu_v_codtipodocur = 01; 
            $user->usu_v_numerodocur = "0000";
            $user->usu_v_codusuariocrea = "SEGURIDAD";
            $user->usu_d_feccrea = now();
            $user->usu_v_documentocrea = "0000"; 
            $user->usu_n_id_tablapaisdocemisorum = 16; 
            $user->usu_v_codpaisdocemisorum = "PE"; 
            $user->usu_n_id_tablatipodocum = 22;
            $user->usu_v_codtipodocum = 01; 
            $user->usu_v_numerodocum = "0000"; 
            $user->usu_v_codusuarioact = "SEGURIDAD";
            $user->usu_d_feccact = now();
            $user->usu_v_documentoact = "0000";
            $user->usu_n_flagregistroeliminado = 0;
            $user->usu_n_id_tablatipousuario = "1005";
            $user->usu_v_tipousuario = "02";
            $user->usu_n_id_tablaorigenusuario = "965";
            $user->usu_v_origenusuario = "1";
            $user->usu_n_bloqueado = "0";
            $user->usu_n_direccion = $direccion;
            $user->usu_v_prefijo_telef = null;
            $user->usu_v_numero_telef = '99999999';
            $user->usu_v_anexo_telef = null;
            $user->usu_n_temp = 0;
            $user->save();
            return array("success" => true ,"codigo" => $numero);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return array("success" => false ,"message" => "No se puede ingresar al usuario en la tabla");
        }
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $rules = [
        'tipo_doc' => 'required',
        'primer_nombre' => 'required',
        'primer_apellido' => 'required_if:tipo_doc,1',
        'segundo_apellido' => 'required_if:tipo_doc,1',
        'direccion' => 'required',
        'correo' => 'required',
        'input_dni' => 'required'
    ];
    private $message=[
        'tipo_doc.required' => 'Ingrese el tipo de documento',
        'primer_nombre.required' => 'Ingrese su nombre',
        'primer_apellido.required_if' => 'Ingrese su Apellido Paterno',
        'segundo_apellido.required_if' => 'Ingrese su Apellido Materno',
        'direccion.required' => 'Ingrese su direccion',
        'correo.required' => 'Ingrese su correo electronico',
        'input.required' => 'Ingrese numero de documento'
    ];
    public function store(Request $request){
        $validations = Validator::make($request->all(),$this->rules,$this->message);
        if($validations->fails())return $validations->errors();
        $old = self::show($request->input('input_dni'));
        if($old){
            return array('success'=>false,'message' =>'El usuario ya se encuentra registrado');
        }else{
            $user = self::create_user($request->input('input_dni'),$request->input('primer_nombre'),$request->input('primer_apellido'),$request->input('segundo_apellido'),$request->input('correo'),$request->input('direccion'),$request->input('tipo_doc'));
            if($user['success']){
                $rol = $this->create_rol($user['codigo']);
                if($rol['success']){
                    $persona = $request->input('primer_nombre').' '.$request->input('primer_apellido').' '.$request->input('segundo_apellido'); 
                    $user = $request->input('input_dni');
                    $pass = 'SgddHmpp2023*';
                    Mail::to($request->input('correo'))->send(new PersonMail($persona,$user,$pass));
                    return ['success'=>true,'message'=>$rol['message']];
                
                
                }else{
                    $rol_delete = destroy($user['codigo']);
                    $rol_delete['success']?:$rol_delete['message']; 
                }
            }else{
                return $user['message'];
            }  
        }
             
    }
    public function store_ruc($id,$tok)
    {
        $curl = curl_init();
        // Buscar ruc sunat
        curl_setopt_array($curl, array(
            // para usar la versión 2
            CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $id,
            // para usar la versión 1
            // CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: http://apis.net.pe/api-ruc',
                'Authorization: Bearer ' . $tok
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // Datos de empresas según padron reducido
        $empresa = json_decode($response);
        return $empresa;
    }

    public function search_dni(Request $request){
        if($request->input('tipo_doc') == '1'){
            if(!(strlen($request->input('numero_doc')) == 8))return array('success'=>false,'message'=>'Ingrese un DNI valido de 8 caracteres');
            $response = self::store_dni($request->input('numero_doc'),$this->token);
        }else{
            if(!(strlen($request->input('numero_doc')) == 11))return array('success'=>false,'message'=>'Ingrese un RUC valido de 11 caracteres');
            $response = self::store_ruc($request->input('numero_doc'),$this->token);
        }
        return $response;   
    }

    public function store_dni($id,$tok)
    {
        $curl = curl_init();
        // Buscar dni
        curl_setopt_array($curl, array(
        // para user api versión 2
        CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $id,
        // para user api versión 1
        // CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 2,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Referer: https://apis.net.pe/consulta-dni-api',
            'Authorization: Bearer ' . $tok
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos listos para usar
        $persona = json_decode($response);
        return $persona;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = new Persona;
        $persona =Persona::where('usu_v_codusuario', $id)->exists(); 
        return $persona;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = new Persona;
            $user = Persona::where('usu_v_codusuario',$id)->delete();
            return array('success'=>true,'message'=>'No se puede registrar su Usuario');
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return array('success'=>false,'message'=>'Consulte con el administrador para realizar su registro');
        }

    }
}
