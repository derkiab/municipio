


$(document).ready(function(){
  let mybutton = document.getElementById("btn-back-to-top");

  
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
  
  mybutton.addEventListener("click", backToTop);

  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }

  var maxBounds = L.latLngBounds(
    L.latLng(-36.881560492888575, -73.08421820120873), //Southwest
    L.latLng(-36.763447946173144, -72.98434534959863)  //Northeast
    );

    var map = L.map('map', {
                'center': [0, 0],
                'zoom': 0,
                'maxBounds': maxBounds
            }).fitBounds(maxBounds);

    map.options.minZoom = 12;          
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    

    const apiKey = "AAPK37580f11c7df4489a472e17a525f9555hrSB3pTkPczI0akGsAraRwJFMb3q7Nhwfv6ledy-z6xtKtnrY_wmW_ANszHr_OPH";
    const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Ingresa una direccion, por ej Calle veteranos del 79",
        useMapBounds: true,
        providers: [
          L.esri.Geocoding.arcgisOnlineProvider({
            apikey: apiKey,
            nearby: {
              lat: -33.8688,
              lng: 151.2093
            }
          })
        ]
      }).addTo(map);

      const results = L.layerGroup().addTo(map);

      searchControl.on("results", function (data) {
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {
          results.addLayer(L.marker(data.results[i].latlng));
        }
      });

                

      var latitud ='test1234';
      var longitud;
      var icono;
      $("#btn_guardar_lugar_mapa").on('click', function(){
        
        var datoslugar = $("#form_lugar_mapa").serialize();
        
        $.ajax({
        
            url: "../places/querymapplaces/retrieveinfo.php",
            method: "POST",
            dataType: "json",
            data: datoslugar ,
            success: function (data) {

                latitud=data.result['icon_category'];
                
                var icon = L.icon({
                    iconUrl: data.result['icon_category'],
                    iconSize: [29, 29],
                    iconAnchor: [29/2, 29/2],
                    shadowAnchor: [4, 62],
                    popupAnchor: [29/2, 29/2]
                });
                
               
                
            
                L.marker([data.result['latitude_place'], data.result['longitude_place']], {icon: icon}).addTo(map).bindPopup("I am a green leaf.");
                
            },
            error: function (e) {
                
    
            }
        });    
});

var LeafIcon = L.Icon.extend({
    options: {
        
        iconSize:     [29, 29],
        
        iconAnchor:   [29/2, 29/2],
        shadowAnchor: [4, 62],
        popupAnchor:  [29/2, 29/2]
    }
});

var parkIcon = new LeafIcon({
    
    iconUrl: 'https://img.icons8.com/fluency/512/park-with-street-light.png'

});




    var id_mapa = $(".clasemapa").attr("id");
    $.ajax({
        
        url: "../places/querymapconfig/updateMapinfo.php",
        method: "POST",
        dataType: "json",
        data: {
            id_mapa: id_mapa
        },
        success: function (data) {
                    
            $('#latitudlimitenoreste').val(data.result.lat_northeast);
            $('#longitudlimitenoreste').val(data.result.lng_northeast);
            $('#latitudlimitesuroeste').val(data.result.lat_southwest);
            $('#longitudlimitesuroeste').val(data.result.lng_southwest);
            $('#centrox').val(data.result.center_x);
            $('#centroy').val(data.result.center_y);
            $('#minzoom').val(data.result.min_zoom);
            $('#maxzoom').val(data.result.max_zoom);
        },
        error: function (e) {
                    

        }
    });
      $("#btn_guardar_mapa").on('click', function () {
        var datos = $("#form_mapconfig_update").serialize();
        var name = $("#btn_guardar_mapa").attr("name");
        
        
        
        if(name == "actualizarmapa"){
            var url = "../places/querymapconfig/updateMap.php"
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
    $("#frm_places").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Agregar Tipo de Lugar");
    $("#btn_guardar").attr("name", "guardar");
    $("#modal_places").modal("show");
});

$("#btn_guardar").on('click', function () {
    var datos = $("#frm_registrar_places").serialize();
    var name = $("#btn_guardar").attr("name");

    
    if(name == "guardar"){
        var url = "../places/query/insert.php";
    }else{
        var url = "../places/query/update.php"
        
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
    var id_place = $(this).attr("id");

    $("#form_places").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar tipo de lugar");
    $("#btn_guardar").attr("name", "actualizar");
    $("#modal_places").modal("show");

    if (id_place != '') {
        $.ajax({
            url: "../places/query/update_info.php",
            method: "POST",
            dataType: "json",
            data: {
                id_place: id_place
            },
            success: function (data) {
                
                $('#id').val(data.result.id_category);
                $('#type').val(data.result.name_category);
                $('#icon').val(data.result.icon_category);

            },
            error: function (e) {
                

            }
        });
    }
});

  $(document).on('click', '.delete', function () {
      var id_place = $(this).attr("id");
      if (id_place != '') {
          $.ajax({
              url: "../places/query/delete.php",
              method: "POST",
              data:{
                id_place: id_place
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
  
        
        if(name == "guardar"){
            var url = "../places/querylugares/insert.php";
        }else{
            var url = "../places/querylugares/update.php"
            
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
        var id_place2 = $(this).attr("id");
    
        $("#frm_registrar_lugar").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar lugar");
        $("#btn_guardar_lugar").attr("name", "actualizar");
        $("#modal_lugares_interes").modal("show");
    
        if (id_place2 != '') {
            $.ajax({
                url: "../places/querylugares/update_info.php",
                method: "POST",
                dataType: "json",
                data: {
                    id_place2: id_place2
                },
                success: function (data) {
                       $('#id1').val(data.result.id_place);
                       $('#nombreLugar').val(data.result.name_place);
                       $('#latitudlugar').val(data.result.latitude_place);
                       $('#longitudlugar').val(data.result.longitude_place);
                   
    
                },
                error: function (e) {
                    
    
                }
            });
        }
    });
    $(document).on('click', '.delete1', function () {
        var id_place2 = $(this).attr("id");
        if (id_place2 != '') {
            $.ajax({
                url: "../places/querylugares/delete.php",
                method: "POST",
                data:{
                    id_place2: id_place2
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
