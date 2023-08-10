export function validacionTipo(param,lengt,tipo){
    if(!(param.length == lengt)){
        
        return { 'success':true,'message':'Ingrese numero de documento '+tipo+' valido'};
    }
    return {'success':false};
}
export function onlyNumbers(code){
    let variable = code.charCode;
    return variable >= 48 && variable <= 57;
}
function inputNull(code){
    return (code.length > 0);
}
export function validacionCampos(tipo,numero,primerNombre,primerApellido,direccion,segundo_apellido,correo){
    console.log(tipo,numero);
    if(!(inputNull(numero)) )return {'success':false,'message':'Ingrese numero de documento de usuario'};
    if(!(inputNull(primerNombre)) )return {'success':false,'message':'Ingrese Primer Nombre de usuario'};
    if(!(inputNull(primerApellido))&& tipo == '1')return {'success':false,'message':'Ingrese Apellido Paterno de usuario'};
    if(!(inputNull(segundo_apellido))&& tipo == '1') return {'success':false,'message':'Ingrese Apellido Materno de usuario'};
    if(!(inputNull(direccion)) ) return {'success':false,'message':'Ingrese Direccion de usuario'};
    if(!(inputNull(correo)) ) return {'success':false,'message':'Ingrese Correo de usuario'};
    if(tipo=='1' && numero.length != 8)return {'success':false,'message':'Ingrese un documento DNI valido'};
    if(tipo=='6' && numero.length != 11)return {'success':false,'message':'Ingrese un documento RUC valido'};
    return {'success':true};
}
export function clearInput(nombre,apellidopap,apellidomat){
    if(nombre.val().length > 0 )nombre.val('');
    if(apellidopap.val().length > 0 )apellidopap.val('');
    if(apellidomat.val().length > 0 )apellidomat.val('');
}