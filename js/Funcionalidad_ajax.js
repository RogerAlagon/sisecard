$(document).on('ready',function(){
    
    /* abrir modal agregar programa*/
    $('#btnmodalAdministrarPrograma').click(function()
    {
        $('#ModalAdministrarPrograma').modal('show');
    });
    $('#btncerrarModalPrograma').click(function()
    {
        $('#ModalAdministrarPrograma').modal('hide');
        $('#agregarPrograma').prop('disabled',false);
        $('#eliminarPrograma').prop('disabled',false);
        $('input[type="text"]').val('');
    });
    /* abrir / cerrar modal agregar alumno*/
    $('#btnmodalAlumnoAgregar').click(function()
    {
        $('#ModalAlumnoAgregar').modal('show');
    });

    $('#btncerrarModalAgregar').click(function()
    {
        $('#ModalAlumnoAgregar').modal('hide');
        $('#agregarAlumno').prop('disabled',false);
        $('input[type="text"]').val('');
        refrescarTabla();
    });

    /* abrir / cerrar modal eliminar alumno */
    $('#btnmodalAlumnoEliminar').click(function()
    {
        $('#ModalAlumnoEliminar').modal('show');
        mostrarAlumno();
    });

    $('#btncerrarModalEliminar').click(function()
    {
        $('#ModalAlumnoEliminar').modal('hide');
        $('#eliminarAlumno').prop('disabled',false);
        limpiarTextoEliminar();
    });

    /* abrir / cerrar modal actualizar alumno */
    $('#btnmodalAlumnoActualizar').click(function()
    {
        $('#ModalAlumnoActualizar').modal('show');
        mostrarAlumno2();
    });

    $('#btncerrarModalActualizar').click(function()
    {
        $('#ModalAlumnoActualizar').modal('hide');
        $('#actualizarAlumno').prop('disabled',false);
        limpiarInputActualizar();
    });
    /* Buscar alumno por dni */
    $('#buscarAlumno').on('keyup', function()
    {
        var alumno = $('#buscarAlumno').val();
        $.ajax(
        {
            type: "POST",
            url: "getbuscarAlumnoDni.php",
            data: {'alumno':alumno},
            success: function(resultado)
            {
                $('#mostrarDatos').html(resultado);
            }
        });
    });

    /* */
    if($('#buscarAlumno').length == 8)
    {
        var codigo = $('#codigo').val();
        $.ajax(
        {
            type: "POST",
            url: "setControlAsistencia.php",
            data: {'codigo':codigo,'fecha':fecha,'hora':hora},
            success: function(resultado)
            {

            }
        });
    }

    $('#buscar_alumno').on('keyup', function()
    {
        $('input[name="opcion"]').prop('checked', false);
        var alumno = $('#buscar_alumno').val();
        if(alumno ==' ')
        {
            $('#inicio_alumnos').show();;
        }else{
            $('#mostrar_alumnos').show();
        
        $.ajax(
        {
            type: "POST",
            url: "getbuscarAlumno.php",
            data: {'alumno':alumno},
            success:function(resultado)
            {
                $('#mostrar_alumnos').html(resultado);
                $('#inicio_alumnos').hide();
                $('#recargar_alumnos').hide();
            }
        });
    }
    });
    /* Agregar programa */
    $('#agregarPrograma').click(function()
    {
        var url = "setPrograma.php";
        if(validarCampo('a_programa','Programa')==false)
        {
            return false;
        }else{
            var m_programa = $('#frmprograma select[name=e_programa]');
            var programa = $('select[name=programa]');
            var a_programa = $('#a_programa').val();
            var t_mayus = a_programa.toUpperCase();

            $.ajax(
            {
                type: "POST",
                url: url,
                data: $('#frmprograma').serialize(),
                success: function(datos)
                {
                    if(datos == 1)
                    {
                        toastr.error("El programa ya existe","Error");
                    }else{
                        toastr.success("Programa agregado","Excelente");
                        
                        m_programa.append('<option value='+t_mayus+'>'+t_mayus+'</option>');
                        programa.append('<option value='+t_mayus+'>'+t_mayus+'</option>');
                        $('#agregarPrograma').prop('disabled',true);
                    }
                }
            });
            return false;
        }
    });
    /* Eliminar Programa*/
    $('#eliminarPrograma').click(function()
    {
        
        if(validarPrograma('e_programa','Programa')== false)
        {
            return false;
        }else{
            var e_programa = $('#frmprograma select[name=e_programa]').val();
            var programa = $('select[name=programa]');
            
            var url = "setEliminarPrograma.php?cod="+e_programa;
            $.ajax(
            {

                type: "POST",
                url: url,
                data: $('#frmprograma').serialize(),
                success: function(data)
                {
                    toastr.success("Datos eliminados","Ejecución Exitosa");
                    $('#eliminarPrograma').prop('disabled',true);
                    $('option[value='+e_programa+']').remove();
                    $('option[value='+programa+']').remove();
                }
            });
        }
    });
    /* Agregar alumno */
    $('#agregarAlumno').click(function()
    {
        var url = "setAlumnos.php";
        if(validarDni('dni','Dni')==false || validarCampo('nombre','Nombre')==false || validarCampo('apellidos','Apellido')==false || validarPrograma('programa','Programa')==false)
        {
            return false;
        }else{
            $('#agregarAlumno').prop('disabled',true);
            $.ajax(
            {
                type: "POST",
                url: url,
                data: $('#formularios').serialize(),
                success: function(data)
                { 
                    if(data == 1)
                    {
                        toastr.error("El alumno ya existe","Error");
                        $('#agregarAlumno').prop('disabled',false);
                    }else{
                        toastr.success("Sus datos fueron enviados","Excelente")
                       
                    }
                } 
            });
            return false;
        }
    });
    /* Eliminar alumno*/
    $('#eliminarAlumno').click(function()
    {
        var url = "setEliminarAlum.php";
        if($("#frmtabla input[name='opcion']:radio").is(':checked'))
        {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: $('#frmeliminarAlumno').serialize(),
                success: function(data)
                {
                    toastr.success("Alumno eliminado","Ejecución Exitosa");
                    $('#eliminarAlumno').prop('disabled',true);
                    $('#mostrar_alumnos').hide();
                    $('input[type="text"]').val('');
                    refrescarTabla();
                }
            });
        }else{
            toastr.error("Por favor seleccione un alumno","Error");
        }

    });
    /* Actualizar alumno*/
    $('#actualizarAlumno').click(function()
    {
        var url = "setActualizarAlum.php";
        if(validarCheck('opcion')==false || validarDni('dni_ac','Dni')==false || validarCampo('nombre_ac','Nombre')==false || validarCampo('apellidos_ac','Apellido')==false || validarPrograma('programa_ac','Programa')==false)
        {
            return false;
        }else{
            $.ajax(
            {
                type: "POST",
                url: url,
                data: $('#frmactualizarAlumno').serialize(),
                success: function(data)
                {
                    toastr.success("Alumno actualizado","Ejecución Exitosa");
                    $('#actualizarAlumno').prop('disabled',true);
                    $('#mostrar_alumnos').hide();
                    $('input[type="text"]').val('');
                    refrescarTabla();
                }
            });
        }
    });

    /* funciones */
    function refrescarTabla()
    {
        $.ajax(
            {
                type: "POST",
                url: "recargarTabla.php",
                success:function(resultado)
                {
                    $('#recargar_alumnos').html(resultado);
                    $('#recargar_alumnos').show();
                    $('#inicio_alumnos').hide();
                    $('#mostrar_alumnos').hide();
                }
            });
    }
    function limpiarInputActualizar()
    {
        $('#dni_ac').val('');
        $('#nombre_ac').val('');
        $('#apellidos_ac').val('');
        $('#programa_ac').val('');
        $('input[name="opcion"]').prop('checked', false);
    }
    function desactivarInputActualizar()
    {
        $('#dni_ac').attr('disabled','disabled');
        $('#nombre_ac').attr('disabled','disabled');
        $('#apellidos_ac').attr('disabled','disabled');
        $('#programa_ac').attr('disabled','disabled');
    }
    function limpiarTextoEliminar()
    {
        $('#dni_eli').empty();
        $('#nombre_eli').empty();
        $('#apellidos_eli').empty();
        $('#programa_eli').empty();
        $('#codigo').val('');
        $('input[name="opcion"]').prop('checked', false);
    }
    function validarCampo(texto,salida)
	{
		if($('#'+texto).val()=='')
		{
			toastr.error("Es requerido","El campo " + salida);
			$('#'+texto).focus();
			return false;
		}
    }
    function validarPrograma(texto,salida)
    {
        if($('#'+texto).val()=='empty')
        {
            toastr.error("Es requerido","El campo " + salida);
			$('#'+texto).focus();
			return false;
        }
    }
    function validarDni(texto,salida)
    {
        var dni = /^([0-9]+){8}$/;
        
        if($('#'+texto).val()=='')
        {
            toastr.error("Es requerido","El campo " + salida);
			$('#'+texto).focus();
			return false;
        }else if(!dni.test($('#'+texto).val()))
        {
            toastr.error("Es incorrecto","El campo " + salida);
			$('#'+texto).focus();
			return false;
        }else if($('#'+texto).val().length > 8)
        {
            toastr.error("No admite mas de 8 digitos","El campo " + salida);
			$('#'+texto).focus();
			return false;
        }
    }

    function validarCheck(texto)
    {
        if($("#frmtabla input[name='"+texto+"']:radio").is(':checked'))
        {

        }else{
            toastr.error("Seleccione un alumno","Error")
            return false;
        }
    }
    function mostrarAlumno()
    {
        if($("#frmtabla input[name='opcion']:radio").is(':checked'))
        {
            var valor = $('input:radio[name=opcion]:checked').val();
            var url = "getAlumnos2.php?cod="+valor;

            $.ajax(
            {
                type: "POST",
                url: url,
                data: $("#frmtabla").serialize(),
                success: function(data)
                {
                    $('#seccion_eliminarAlumno').html(data);
                }
            });
        }
    }

    function mostrarAlumno2()
    {
        if($("#frmtabla input[name='opcion']:radio").is(':checked'))
        {
            var valor = $('input:radio[name=opcion]:checked').val();
            var url = "setAlumnosVista.php?cod="+valor;
            $.ajax(
            {
                type: "POST",
                url: url,
                data: $("#frmtabla").serialize(),
                success: function(data)
                {
                    $('#seccion_actualizarAlumno').html(data);
                    
                }
            });
        }else{
            desactivarInputActualizar();
            //$('#actualizarAlumno').prop('disabled',true);
           
        }
    }
});