<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'usu_n_id_usu';
    protected $fillable = [
        "usu_v_codusuario",
        "usu_v_nombrescompletos",
        "usu_n_id_tablapaisdocemisor",
        "usu_v_codpaisdocemisor",
        "usu_n_id_tablatipodoc",
        "usu_v_codtipodoc", 
        "usu_v_numerodoc", 
        "usu_v_clave",
        "usu_v_correo",
        "usu_v_ipestacion",
        "usu_n_id_puntodig", 
        "usu_n_id_tablapaisdocemisorur",
        "usu_v_codpaisdocemisorur",
        "usu_n_id_tablatipodocur",
        "usu_v_codtipodocur", 
        "usu_v_numerodocur",
        "usu_v_codusuariocrea",
        "usu_d_feccrea",
        "usu_v_documentocrea", 
        "usu_n_id_tablapaisdocemisorum", 
        "usu_v_codpaisdocemisorum", 
        "usu_n_id_tablatipodocum",
        "usu_v_codtipodocum", 
        "usu_v_numerodocum", 
        "usu_v_codusuarioact",
        "usu_d_feccact",
        "usu_v_documentoact",
        "usu_n_flagregistroeliminado",
        "usu_n_id_tablatipousuario",
        "usu_v_tipousuario",
        "usu_n_id_tablaorigenusuario",
        "usu_v_origenusuario",
        "usu_n_bloqueado",
        "usu_n_direccion",
        "usu_v_prefijo_telef",
        "usu_v_numero_telef",
        "usu_v_anexo_telef",
        "usu_n_temp"
    ];
    protected $table = 'dbo.m_seguridad_usuario';
}
