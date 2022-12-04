// Configuracion Data Tables
$(document).ready(function(){
    tablaPersonas = $("#tabla_personas").DataTable({

        "language":{
            "lengthMenu":"Mostrar _MENU_ registros",
            "zeroRecords":"No se han econtrado resultados",
            "info":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty":"Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered":"(Filtrando un total de _MAX_ registros)",
            "search":"Buscar:",
            "oPaginate":{
                "sFirst":"Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious":"Anterior",
            },
            "sProcessing":"Procesando...",
        }
    });

// Configuracion Modal

//Mostrar modal agregar
    $("#btn_agregar").click(function(){
        $("#form_personas").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Persona");
        $("#btn_guardar").attr("name", "guardar");
        $("#modal_insert").modal("show");
    });

    $("#btn_guardar").on('click', function () {
        var datos = $("#frm_registrar").serialize();
        var name = $("#btn_guardar").attr("name");

        var user_id = $(".update").attr("id");
        if(name == "guardar"){
            var url = "../../pages/user/query/insert.php";
        }else{
            var url = "../../pages/user/query/update.php"
            datos += "&user_id=" + user_id;
        }
        console.log(url);
        $.ajax({
            method: "POST",
            url: url,
            data: datos,
            success: function (data) {
                if (data == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Realizado con exito',
                        
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mal!',
                    })
                }
            },
            error: function (data) {
                alert("fallo");
            }
        });
    });

    // Boton Actualizar
 
    $(document).on('click', '.update', function(){
        var user_id = $(this).attr("id");
        
        $("#form_personas").trigger("reset");
        $(".modal-header").css("background-color", "#0D6EFD");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Actualizar Persona");
        $("#btn_guardar").attr("name", "actualizar");
        $("#modal_insert").modal("show");
        
        if (user_id != '') {
            $.ajax({
                url: "../../pages/user/query/update_info.php",
                method: "POST",
                dataType: "json",
                data: {
                    user_id: user_id
                },
                success: function (data) {
                    $('#id_user_update').val(data.result.id_user);
                    $('#rut').val(data.result.rut_user);
                    $('#name').val(data.result.name_user);
                    $('#last_name').val(data.result.lastname_user);
                    $('#email').val(data.result.email_user);
                    $('#phone').val(data.result.phone_user);
                    $('#password').val(data.result.password_user);
                    $('#address').val(data.result.address_user);

                },
                error: function (e) {
                    alert("fallo");

                }
            });
        }
    });

    // Boton Eliminar
    $(document).on('click', '.delete', function () {
        var user_id = $(this).attr("id");
        if (user_id != '') {
            $.ajax({
                url: "../../pages/user/query/delete.php",
                method: "POST",
                data:{
                    user_id: user_id
                },
                success: function (data) {
                    if (data == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: data,
                            showConfirmButton: true,
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salio mal!',
                        })
                    }

                },
                error: function (e) {
                    alert("fallo");

                }
            });
        }
    });
    

    // Jquery Validate
    $("frm_registrar").validate({
        rules:{
            rut:{
                required: true,
                number: true,
                minleght: 7
            },
            name:{
                required: true,
                minleght: 3
            },
            last_name:{
                required: true,
                minleght: 3
            },
            email:{
                required: true,
                email: true,
                minleght: 3
            },
            user_rol:{
                required: true,
                minleght: 3
            },
            phone:{
                required: true,
                number: true,
                minleght: 3
            },
            password:{
                required: true,
                minleght: 8
            },
            address:{
                required: true,
                minleght: 3
            }
        },
        messages:{
            rut:{
                required: "Por favor ingrese su rut sin guion",
                number: "Por favor solo ingrese numeros",
                minleght: "Por favor ingrese un rut valido"
            },
            name:{
                required: "Por favor ingrese su nombre"
            },
            last_name:{
                required: "Por favor ingrese su apellido"
            },
            email:{
                required: "Por favor ingrese su direccion de correo",
                email: "la direccion de correo debe tener el formato ejemplo@ejemplo.cl"
            },
            user_rol:{
                required: "Por favor seleccione un tipo de usuario" 
            },
            phone:{
                required: "Por favor ingrese su numero de telefono",
                number: "Por favor solo ingrese numeros",
                minleght: "Por favor ingrese un numero valido"
            },
            password:{
                required: "Por favor ingrese una contraseña",
                minleght: "La contraseña debe contener como minimo ocho caracteres"
            },
            address:{
                required: "Por favor ingrese su direccion"
            }
        }
    });
})

