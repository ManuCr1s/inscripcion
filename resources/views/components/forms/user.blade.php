<form class="row" id="form-user">
                <div id="env" data-api-url="{{env('APP_ROUTE')}}"></div>
                <div class="col-md-6">
                    <div class="form-group row px-5 pt-2 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Tipo de documento de Identidad</label>
                        <div class="col-sm-8">
                            <select name="tipo_doc" id="tipo_doc" class="form-control control-input">
                                <option value="1" selected>Documento nacional de identidad (dni)</option>
                                <option value="6">Registro unico de contribuyente (ruc)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Primer nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" name="primer_nombre" id="primer_nombre">
                        </div>
                    </div>

                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Primer apellido</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" name="primer_apellido" id="primer_apellido">
                        </div>
                    </div>

                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Direccion</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" id="direccion" name="direccion">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row px-5 pt-2 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Numero de docuemnto de Identidad</label>
                        <div class="col-sm-8 d-flex">
                          
                                <input type="text" class="form-control control-input" id="input_dni" name="input_dni" maxlength="11" minxlength="8">
                                <button class="icon icon-green" id="btn-ico"><i class="fa-solid fa-user"></i></button>
                            
                        </div>
                    </div>
                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Segundo nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" id="segundo_nombre" name="segundo_nombre">
                        </div>
                    </div>
                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Segundo apellido</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" id="segundo_apellido" name="segundo_apellido">
                        </div>
                    </div>
                    <div class="form-group row px-5 m-0">
                        <label for="input_dni" class="col-sm-4 text-label-sm">Correo Electronico</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control control-input" id="correo" name="correo">
                        </div>
                    </div>
             </div>
             <div class="col-md-12 d-flex justify-content-center my-0">
                    <button type="submit" class="btn btn-success btn-login px-3">Enviar</button>
                    <a href="" class="btn btn-success btn-login px-3">Cancelar</a>
             </div>
</form>