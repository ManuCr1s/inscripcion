<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = ['ur_v_codrol','ur_v_codusuario'];
    public $incrementing = false;
    protected $fillable = [
        "ur_v_codrol",
        "ur_v_codusuario",
        "ur_n_activo",
        "ur_n_id_puntodig",
        "ur_n_id_tablapaisdocemisorur",
        "ur_v_codpaisdocemisorur",
        "ur_n_id_tablatipodocur",
        "ur_v_codtipodocur",
        "ur_v_numerodocur",
        "ur_v_codusuariocrea",
        "ur_d_feccrea",
        "ur_v_documentocrea",
        "ur_n_id_tablapaisdocemisorum",
        "ur_v_codpaisdocemisorum",
        "ur_n_id_tablatipodocum",
        "ur_v_codtipodocum",
        "ur_v_numerodocum",
        "ur_v_codusuarioact",
        "ur_d_feccact",
        "ur_v_documentoact",
        "ur_n_flagregistroeliminado",
        "ur_v_ipestacion"
    ];
    protected $table = 'dbo.i_seguridad_usuario_rol';
}
