    function deshabilitabotones(){
        document.getElementById('enviar').style.display = 'none';
        document.getElementById('modificar').style.display = 'none';
        document.getElementById('reenviar').style.display = 'none';
    }
    function limpiaform(){
        $("#rut").val("");
        $("#becaoscarbustos").val("");
        $("#correo").val("");
        $("#telefono").val("+569");
        $("#banco").val("");
        $("#nro_cta").val("");
        $("#tipo_cta").val("");
    }        
    function habilitaform(){
        $("#becaoscarbustos").prop( "disabled", false );
        $("#correo").prop( "disabled", false );
        $("#telefono").prop( "disabled", false );
        $("#banco").prop( "disabled", false );
        $("#nro_cta").prop( "disabled", false );
        $("#tipo_cta").prop( "disabled", false );
    }
    function deshabilitaform(){
        $("#becaoscarbustos").prop( "disabled", true );
        $("#correo").prop( "disabled", true );
        $("#telefono").prop( "disabled", true );
        $("#banco").prop( "disabled", true );
        $("#nro_cta").prop( "disabled", true );
        $("#tipo_cta").prop( "disabled", true );
    }

    $(document).ready(function(){
        function validaModifica(){
            //console.log(rut0);
            var datay = {"rut": rut0,
                        "Accion":"obtener"
                        };
            $.ajax({
                data: datay, 
                type: "POST",
                dataType: "json", 
                url: "controllers/controlalumnobeca.php",
            })
            .done(function(data,textStatus,jqXHR ) {
                /* if ( console && console.log ) {
                        console.log( " data success : "+ data.success 
                        + " \n data msg : "+ data.message 
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                   }*/
                if(data.datos.alumbeca_oscarbustos == "" ){
                    deshabilitabotones();
                    $('#enviar').show();
                }else{
                    deshabilitaform();
                    $('#tipo_cta').val(data.datos.alumbeca_tipocta);
                    $('#nro_cta').val(data.datos.alumbeca_nrocta);
                    $('#banco').val(data.datos.alumbeca_banco);
                    $('#correo').val(data.datos.alumbeca_correo);
                    $('#telefono').val(data.datos.alumbeca_fono);
                    $('#becaoscarbustos').val(data.datos.alumbeca_oscarbustos);
                    $('#salir').html("<a href='salir.php' class='btn btn-default' role='button' >Salir</a>");
                    deshabilitabotones();
                    $('#modificar').show();
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                        + " \n errorThrown : "+ errorThrown
                        + " \n textStatus : " + textStatus
                        + " \n jqXHR.status : " + jqXHR.status );
                }
            });                        
        }
        //funcion para validar campos del formulario
        function validarFormulario(){
            var txtCorreo = document.getElementById('correo').value;
            var txtTelefono = document.getElementById('telefono').value;
            var selBanco = document.getElementById('banco').selectedIndex;
            console.log(selBanco);
            var txtNro_cta = document.getElementById('nro_cta').value;
            var selTipo_cta = document.getElementById('tipo_cta').selectedIndex;
            console.log(selTipo_cta);
                //Test campo obligatorio
                if(txtCorreo == null || txtCorreo.length == 0 || /^\s+$/.test(txtCorreo)){
                    alert('ERROR: El campo correo no debe ir vacío o con espacios en blanco');
                    document.getElementById('correo').focus();
                    return false;
                }
                if(txtTelefono == null || txtTelefono.length == 0 || /^\s+$/.test(txtTelefono)){
                    alert('ERROR: El campo telefono no debe ir vacío o con espacios en blanco');
                    document.getElementById('telefono').focus();
                    return false;
                }
                if(selBanco == null || selBanco == -1 || isNaN(txtTelefono)){
                    alert('ERROR: Debe seleccionar un banco de la lista');
                    document.getElementById('banco').focus();
                    return false;
                } 
                if(txtNro_cta == null || txtNro_cta.length == 0 || /^\s+$/.test(txtNro_cta)){
                    alert('ERROR: El campo Nro. de Cuenta no debe ir vacío o con espacios en blanco');
                    document.getElementById('nro_cta').focus();
                    return false;
                } 
                if(selTipo_cta == null || selTipo_cta.length == isNaN(selTipo_cta)){
                    alert('ERROR: El campo Tipo de Cuenta no debe ir vacío o con espacios en blanco');
                    document.getElementById('tipo_cta').focus();
                    return false;
                }                 
                return true;
            }         

        // implementacion boton para guardar el centro de costo
        $("#enviar").click(function(e){
            e.preventDefault();
            $("#Accion").val("registrar");
            if(validarFormulario()==true){
                var datax = $("#formulariopostulacon").serializeArray();
                /*$.each(datax, function(i, field){
                    console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                });*/
                $.ajax({
                    data: datax, 
                    type: "POST",
                    dataType: "json", 
                    url: "controllers/controlalumnobeca.php", 
                })
                .done(function( data, textStatus, jqXHR ) {
                    /*if ( console && console.log ) {
                        console.log( " data success : "+ data.success 
                            + " \n data msg : "+ data.message 
                            + " \n textStatus : " + textStatus
                            + " \n jqXHR.status : " + jqXHR.status );
                    }*/
                    $('#myModalLittle').modal('show');
                    $('#myModalLittle').on('shown.bs.modal', function () {
                        var modal2 = $(this);
                        modal2.find('.modal-title').text('Mensaje');
                        modal2.find('.msg').html('<b>' + data.message + '</b>');  
                        $('#cerrarModalLittle').focus();
                    });
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                            + " \n errorThrown : "+ errorThrown
                            + " \n textStatus : " + textStatus
                            + " \n jqXHR.status : " + jqXHR.status );
                    }
                });
            }
        });
        $("#myModalLittle").on('hidden.bs.modal', function () {
            window.location.href="postulacion.php";
        });
        
        //Cambia boton y habilita form para actualizar
        $("#modificar").click(function(e){
            e.preventDefault();
            habilitaform();
            deshabilitabotones();
            $('#enviar').text('Reingresar Postulación');  
            $('#enviar').show();
        });
        validaModifica();
    });
