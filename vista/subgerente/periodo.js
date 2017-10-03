$(document).ready(function(){
          $("#estado").hide();
          listar();
          validarCampos();
          $("#buscar").autocomplete({
            source: "../../controlador/buscarPeriodo.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
          })
          $("#frmperiodo").submit(function(e){
                e.preventDefault();

                var id=$("#idperiodo").val();
                if (id!=0) {
                    ruta='../../controlador/editarPeriodo.php';
                }else{
                    ruta='../../controlador/registrarPeriodo.php';
                }
                var data =$("#frmperiodo").serializeArray();

                $.ajax({
                    url: ruta,
                    type: 'post',
                    dataType: 'json',
                    data: data,
        
                })
                .done(function(){
                    // Success message
                    $('#correcto').html("<div class='alert alert-success' id='alertacierrate'>");
                    $('#correcto > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#correcto > .alert-success').append("<strong>Registro Exitoso");
                    $('#correcto > .alert-success').append('</div>');
                    limpiarformulario();
                    setTimeout("borraralerta();", 5000);
                    listar();
                })
                .fail(function(){
                    // Fail message
                    $('#correcto').html("<div class='alert alert-danger' id='alertacierrate'>");
                    $('#correcto > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#correcto > .alert-danger').append("<strong>Registro incorrecto, intente nuevamente!");
                    $('#correcto > .alert-danger').append('</div>');
                    limpiarformulario();
                    setTimeout("borraralerta();", 5000);
                    listar();

                })
            });
      });
      function borraralerta(){
          $("#alertacierrate").alert('close');
      }
      function limpiarformulario(){
          $(document).ready(function() {

              $("#frmperiodo").find(':input').each(function() {
                  var elemento= this;
                  $('input[type=text]').each(function()
                  {
                      elemento.value = "";
                  });

                  $('textarea').each(function()
                  {
                      elemento.value = "";
                  });

                  $('select option:first').attr('selected','selected');
                  
              });


          });
         
      }
      function listar(){
          $("#tablalistado").load("../../controlador/listarPeriodo.php", function(){
            $("#table_id").dataTable();
          });  
      }
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idperiodo").val( registro.codigo);
        $("#txtnombre").val( registro.nombres);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#buscar").val( registro.nombre);
        event.preventDefault();
      }
      function cambiarEstado(periodo,estado){
        var parametro={
          "id_periodo":periodo,
          "id":estado,
        };
        $.ajax({
            url: "../../controlador/editarEstadoPeriodo.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){              
                alert("Correcto");
                listar();
              }else{
                alert("incorrecto");
                listar();   
              }                                                              
            }
        }); 
      }
      function validarCampos(){
        $("#buscar").validCampoFranz("abcdefghijklmnñopqrstuvwxyz 1234567890%%");
                
      }