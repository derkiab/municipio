// Configuracion Data Tables
$(document).ready(function(){
    tablaPymes = $("#tabla_pymes").DataTable({

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
    tablaPymesPendientes = $("#tabla_pymes_pendientes").DataTable({

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
    tablaPymesRechazadas = $("#tabla_pymes_rechazadas").DataTable({

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
    $("#btn_agregar_pymes").click(function(){
        $("#form_pymes").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar pyme");
        $("#btn_guardar").attr("name", "guardar");
        $("#modal_pymes").modal("show");
    });

    $("#btn_guardar").on('click', function () {
        var datos = $("#frm_registrar_pymes").serialize();
        var name = $("#btn_guardar").attr("name");
        
        if(name == "guardar"){
            var url = "../../pages/pymes/query/insert.php";
        }else{
            var url = "../../pages/pymes/query/update.php"
        }
        console.log(url);
        $.ajax({
            method: "POST",
            url: url,
            data: datos,
            success: function (data) {
                // alert(data);
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
    $(document).on('click', '.update', function () {
        var state_entrepreneur = "Aceptada";
        var entrepreneur_id = $(this).attr("id");
        var name = $("#btn_guardar").attr("name");
        
        if(name == "guardar"){
            var url = "../../pages/pymes/query/insert.php";
        }else{
            var url = "../../pages/pymes/query/modify_state.php"
        }
        console.log(url);
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: {
                entrepreneur_id: entrepreneur_id,
                state_entrepreneur: state_entrepreneur
            },
            success: function (data) {
                console.log(data);
                if (data == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Realizado con exito',
                        
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
            error: function (data) {
                location.reload();
            }
        });
    });
    $(document).on('click', '.delete', function () {
        var state_entrepreneur = "Rechazada";
        var entrepreneur_id = $(this).attr("id");
        var name = $("#btn_guardar").attr("name");
        
        if(name == "guardar"){
            var url = "../../pages/pymes/query/insert.php";
        }else{
            var url = "../../pages/pymes/query/modify_state.php"
        }
        console.log(url);
        $.ajax({
            method: "POST",
            url: url,
            dataType: "json",
            data: {
                entrepreneur_id: entrepreneur_id,
                state_entrepreneur: state_entrepreneur
            },
            success: function (data) {
                // alert(data);
                console.log(data);
                if (data == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Realizado con exito',
                        
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
            error: function (data) {
                location.reload();
            }
        });
    });


   
})

