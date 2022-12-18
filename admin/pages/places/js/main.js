


$(document).ready(function(){
  let mybutton = document.getElementById("btn-back-to-top");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  // When the user clicks on the button, scroll to the top of the document
  mybutton.addEventListener("click", backToTop);

  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }

  
  

  tablaPersonas = $("#tabla_lugares").DataTable({

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

$("#btn_agregar_places").click(function(){
    $("#frm_registrar_places").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Agregar Tipo de Lugar");
    $("#btn_guardar").attr("name", "guardar");
    $("#modal_places").modal("show");
});

$("#btn_guardar").on('click', function () {
    var datos = $("#frm_registrar_places").serialize();
    var name = $("#btn_guardar").attr("name");

    var new_id = $(".update").attr("id");
    if(name == "guardar"){
        var url = "../places/query/insert.php";
    }else{
        var url = "../places/query/update.php"
        datos += "&new_id=" + new_id;
    }
    
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
$(document).on('click', '.update', function(){
    var new_id = $(this).attr("id");

    $("#form_places").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar tipo de lugar");
    $("#btn_guardar").attr("name", "actualizar");
    $("#modal_places").modal("show");

    if (new_id != '') {
        $.ajax({
            url: "../places/query/update_info.php",
            method: "POST",
            dataType: "json",
            data: {
                new_id: new_id
            },
            success: function (data) {
                
                $('#type').val(data.result.name_category);
                $('#icon').val(data.result.icon_category);

            },
            error: function (e) {
                

            }
        });
    }
});

  $(document).on('click', '.delete', function () {
      var new_id = $(this).attr("id");
      if (new_id != '') {
          $.ajax({
              url: "../places/query/delete.php",
              method: "POST",
              data:{
                  new_id: new_id
              },
              success: function (data) {
                  
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

    tablaLugaresInteres = $("#tabla_lugares_interes").DataTable({

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

    $("#btn_agregar_lugares_interes").click(function(){
        $("#frm_registrar_lugar").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Tipo de Lugar");
        $("#btn_guardar_lugar").attr("name", "guardar");
        $("#modal_lugares_interes").modal("show");
    });

    $("#btn_guardar_lugar").on('click', function () {
        var datos = $("#frm_registrar_lugar").serialize();
        var name = $("#btn_guardar_lugar").attr("name");
  
        var new_id = $(".update1").attr("id");
        if(name == "guardar"){
            var url = "../places/querylugares/insert.php";
        }else{
            var url = "../places/querylugares/update.php"
            datos += "&new_id=" + new_id;
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
    $(document).on('click', '.update1', function(){
        var new_id = $(this).attr("id");
    
        $("#frm_registrar_lugar").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar lugar");
        $("#btn_guardar_lugar").attr("name", "actualizar");
        $("#modal_lugares_interes").modal("show");
    
        if (new_id != '') {
            $.ajax({
                url: "../places/querylugares/update_info.php",
                method: "POST",
                dataType: "json",
                data: {
                    new_id: new_id
                },
                success: function (data) {
                    
                    // $('#nombreLugar').val(data.result.name_place);
                    // $('#icon').val(data.result.icon_category);
    
                },
                error: function (e) {
                    
    
                }
            });
        }
    });
    $(document).on('click', '.delete1', function () {
        var new_id = $(this).attr("id");
        if (new_id != '') {
            $.ajax({
                url: "../places/querylugares/delete.php",
                method: "POST",
                data:{
                    new_id: new_id
                },
                success: function (data) {
                    
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



});
