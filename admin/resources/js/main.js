// Configuracion Data Tables
$(document).ready(function(){
    tablaPersonas = $("#tabla_personas").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data": null,
            "defaultContent":"<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-editar'><i class='fa-solid fa-pen'></i></button><button class='btn btn-danger btn-editar'><i class='fa-solid fa-trash'></i></button></div></div>"
        }],

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
    $("#btn_agregar").click(function(){
        $("#form_personas").trigger("reset");
        $(".modal-header").css("background-color", "28a745");
        $(".modal-header").css("color", "white");
        $(".modal-tittle").css("Agregar Persona");

        $("#modal_crud").modal("show"); 
    });
    $("#btn_guardar").on('click', function(e){
        agregar_datos();
        
    });
    function agregar_datos(){
        var datos = $("#frm_registrar").serialize();
    
        $.ajax({
            method:"POST",
            url:"../../pages/user/query/insert.php",
            data: datos,
            success: function(e){
                //alert(e);
                $("#modal_crud").modal("hidden");
                
            },
            error: function(e){
                alert("fallo");
            }
        });
        
        return false;
    } 
})