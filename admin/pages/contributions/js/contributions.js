// Configuracion Data Tables
$(document).ready(function(){
    tablaPersonas = $("#tabla_contribuciones").DataTable({

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
    
    $(document).on('click', '.save', function(e){
        e.preventDefault();
        var datos = $("#frm_registrar").serialize();
        Swal.fire({
            icon: 'success',
            title: "Contestado con exito",
            showConfirmButton: true,
        }).then((result) => {
            $.ajax({
                method: "POST",
                url: "../../pages/contributions/query/update.php",
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
        var id_opinion = $(this).attr("id");
        
        $("#form_personas").trigger("reset");
        $(".modal-header").css("background-color", "#0D6EFD");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Actualizar Persona");
        $("#btn_guardar").attr("name", "actualizar");
        $("#modal_insert").modal("show");
        
        if (id_opinion != '') {
            $.ajax({
                url: "../../pages/contributions/query/update_info.php",
                method: "POST",
                dataType: "json",
                data: {
                    id_opinion: id_opinion
                },
                success: function (data) {
                    $('#id').attr("value", data.result.id_opinion);
                    $('#id_user').attr("value", data.result.id_user);
                    $('#department').attr("value",data.result.department);
                    $('#opinion').val(data.result.opinion_description);
                    $('#answer').val(data.result.answer);
                    console.log(data);
                },
                error: function (data) {
                    alert(data);
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

