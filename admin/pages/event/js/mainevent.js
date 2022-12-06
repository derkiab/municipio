// Configuracion Data Tables
$(document).ready(function(){
    tablaEventos = $("#tabla_eventos").DataTable({

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
    $("#btn_agregar_event").click(function(){
        $("#form_eventos").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Eventos");
        $("#btn_guardar").attr("name", "guardar");
        $("#modal_event").modal("show");
    });

    $("#btn_guardar").on('click', function () {
        var datos = $("#frm_registrar_event").serialize();
        var name = $("#btn_guardar").attr("name");

        var event_id = $(".update").attr("id");
        if(name == "guardar"){
            var url = "../../pages/event/query/insert.php";
        }else{
            var url = "../../pages/event/query/update.php"
            datos += "&event_id=" + event_id;
        }
        console.log(url);
        $.ajax({
            method: "POST",
            url: url,
            data: datos,
            success: function (data) {

                console.log(data);
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
        var event_id = $(this).attr("id");
        
        $("#form_event").trigger("reset");
        $(".modal-header").css("background-color", "#0D6EFD");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Actualizar Eventos");
        $("#btn_guardar").attr("name", "actualizar");
        $("#modal_event").modal("show");
        
        if (event_id != '') {
            $.ajax({
                url: "../../pages/event/query/update_info.php",
                method: "POST",
                dataType: "json",
                data: {
                    event_id: event_id
                },
                success: function (data) {
                    $('#id_event_update').val(data.result.id_event);
                    $('#date').val(data.result.date_event);
                    $('#time').val(data.result.time_event);
                    $('#title').val(data.result.title_event);
                    $('#description').val(data.result.event_description);
                    $('#image').val(data.result.event_image);
                    $('#status').val(data.result.event_status);
                },
                error: function (e) {
                    alert("fallo");

                }
            });
        }
    });

    // Boton Eliminar
    $(document).on('click', '.delete', function () {
        var event_id = $(this).attr("id");
        if (event_id != '') {
            $.ajax({
                url: "../event/query/delete.php",
                method: "POST",
                data:{
                    event_id: event_id
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
    $("frm_registrar_event").validate({
        rules:{
            date:{
                required: true,
                number: true,
                minleght: 7
            },
            time:{
                required: true,
                number: true,
                minleght: 3
            },
            title:{
                required: true,
                minleght: 3
            },
            description:{
                required: true,
                minleght: 3
            },
            image:{
                required: true,
                minleght: 3
            },

            status:{
                required: true,
                minleght: 3
            },
        },
        messages:{
            date:{
                required: "Por favor ingrese la fecha",
                number: "Por favor solo ingrese numeros",
            },
            time:{
                required: "Por favor ingrese su nombre",
                number: "Por favor solo ingrese numeros"
            },
            title:{
                required: "Por favor ingrese una descripcion"
            },
            description:{
                required: "Por favor ingrese una descripcion"
            },
            image:{
                required: "Por favor ingrese una imagen",
            },
  
            status:{
                required: "Por favor ingrese el estado",

            },
        }
    });
})

