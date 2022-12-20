// Configuracion Data Tables
$(document).ready(function(){
    tablaNoticias = $("#tabla_noticias").DataTable({

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
    $("#btn_agregar_news").click(function(){
        $("#form_noticias").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Noticia");
        $("#btn_guardar").attr("name", "guardar");
        $("#modal_news").modal("show");
    });

    $("#btn_guardar").on('click', function () {
        var datos = $("#frm_registrar_news").serialize();
        var name = $("#btn_guardar").attr("name");
        
        if(name == "guardar"){
            var url = "../../pages/news/query/insert.php";
        }else{
            var url = "../../pages/news/query/update.php"
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



    // Boton Eliminar
    $(document).on('click', '.update', function () {
        var new_id = $(this).attr("id");
        if (new_id != '') {
            $.ajax({
                url: "../news/query/update_info.php",
                method: "POST",
                data:{
                    new_id: new_id
                },
                success: function (data) {
                    console.log(data);
                    $('#id_news_update').val(data.result.id_news);
                    $('#date').val(data.result.date_news);
                    $('#time').val(data.result.time_news);
                    $('#title').val(data.result.title_news);
                    $('#description').val(data.result.news_description);
                    $('#image').val(data.result.news_image);
                   
                },
                error: function (e) {
                    alert("fallo");

                }
            });
        }
    });
    $(document).on('click', '.delete', function () {
        var new_id = $(this).attr("id");
        if (new_id != '') {
            $.ajax({
                url: "../news/query/delete.php",
                method: "POST",
                data:{
                    new_id: new_id
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
    

   
})

