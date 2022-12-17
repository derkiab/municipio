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
    $(document).on('click', '.add', function(){
        $("#form_personas").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Persona");
        $("#btn_guardar").attr("name", "guardar");
        $("#modal_insert").modal("show");
    });

    $(document).on('click', '.save', function(e){
        e.preventDefault();
        var datos = $("#frm_registrar").serialize();
        var name = $(".save").attr("name");

        var user_id = $(".update").attr("id");
        if(name == "guardar"){
            var url = "../../pages/user/query/insert.php";
            var title = "Guardado";
        }else{
            var url = "../../pages/user/query/update.php"
            datos += "&user_id=" + user_id;
            var title = "Actualizado";
        }
        Swal.fire({
            icon: 'success',
            title: title + " con exito",
            showConfirmButton: true,
        }).then((result) => {
            $.ajax({
                method: "POST",
                url: url,
                data: datos,
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    alert("fallo");
                }
            });
            location.reload();
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
                    console.log(data);
                    if (data == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: "Eliminado con exito",
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
})

