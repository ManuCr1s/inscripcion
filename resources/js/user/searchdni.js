import route from "./route.js";
import swal from 'sweetalert';
import {validacionTipo,validacionCampos,onlyNumbers,clearInput} from "./function_form.js";
import { event } from "jquery";
import { values } from "lodash";
$(document).ready(function(){
    let form = $('#form-user'),
        btn = $('#btn-ico'),
        tipo = $('#tipo_doc'),
        numero = $('#input_dni'),
        clear_input,
        validate_documento;
    
    numero.on("keypress", onlyNumbers);
    
    btn.on('click',function(e){
            e.preventDefault();
            let primerNombre = $('#primer_nombre'),
            primerApellido = $('#primer_apellido'),
            direccion = $('#direccion'),
            segundo_apellido = $('#segundo_apellido'),
            correo = $('#correo');
            clear_input = clearInput(primerNombre,primerApellido,segundo_apellido);
            validate_documento = (tipo.val()=='1')?validacionTipo(numero.val(),8,'DNI'):validacionTipo(numero.val(),11,'RUC');   
            if(validate_documento.success){
                swal({ 
                    title: "Upps, al parecer hubo un error",
                    text: validate_documento.message,
                    icon: "warning"
                })
            }  
            $.ajax({
                url:route.dni_search,
                method:'POST',
                dataType: 'json',
                data:{
                    'numero_doc':numero.val(),
                    'tipo_doc':tipo.val()
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function(response) {
                    if(response.tipoDocumento == '1'){
                        primerNombre.val(response.nombres);
                        primerApellido.val(response.apellidoPaterno);
                        segundo_apellido.val(response.apellidoMaterno);
                    }else{
                        primerNombre.val(response.razonSocial);
                    }
                }
            });
    });

    form.on('submit',function(e){
        e.preventDefault();
        let tipo = $('#tipo_doc'),
        numero = $('#input_dni'),
        primerNombre = $('#primer_nombre'),
        primerApellido = $('#primer_apellido'),
        direccion = $('#direccion'),
        segundo_apellido = $('#segundo_apellido'),
        correo = $('#correo'),
        campos = validacionCampos(tipo.val(),numero.val(),primerNombre.val(),primerApellido.val(),direccion.val(),segundo_apellido.val(),correo.val()), 
        data = form.serialize();
        if(!(campos.success))
        {
            swal({ 
                title: "Por favor ingrese",
                text: campos.message,
                icon: "warning"
            })
        }else{
            $.ajax({
                url:route.send_date,
                method:'POST',
                dataType: 'json',
                data:data,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function(response) {
                    if(response.success){
                        swal({ 
                            title: "¡Felicidades!",
                            text: response.message,
                            icon: "success"
                        }).then(()=>{
                            window.location.reload(); 
                        })
                    }else{
                        swal({ 
                            title: "Upps al parecer hubo un problema",
                            text: response.message,
                            icon: "warning"
                        })
                    }
                }
            });
        }   
        
      
        
    });
    
});