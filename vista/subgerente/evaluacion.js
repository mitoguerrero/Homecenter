 $(document).ready(function(){
        cargarPeriodo();
        listar();
        validarCampos();
        $("#buscar").autocomplete({
            source: "../../controlador/buscarEvaluacion.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $("#frmevaluacion").submit(function(e){
                e.preventDefault();

                var id=$("#idevaluacion").val();
                if (id!=0) {
                    ruta='../../controlador/editarEvaluacion.php';
                }else{
                    ruta='../../controlador/registrarEvaluacion.php';
                }
                var data =$("#frmevaluacion").serializeArray();

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
                    usuario=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuario);
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
                    usuario=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuario);

                })
            });
      });
      function borraralerta(){
          $("#alertacierrate").alert('close');
      }
      function limpiarformulario(){
          $(document).ready(function() {

              $("#frmevaluacion").find(':input').each(function() {
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
      function cargarPeriodo(){
          $.ajax({
            url: "../../controlador/cargarPeriodo.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtperiodo").append("<option value='"+DataJson.retorno[data].idperiodo+"'>"+DataJson.retorno[data].nombreperiodo+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function listar(){
          $("#tablalistado").load("../../controlador/listarEvaluacion.php", function(){
            $("#table_id").dataTable();
          });  
      }
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idevaluacion").val( registro.codigo);
        $("#txtnombre").val( registro.nombre);
        $("#txtperiodo").val( registro.periodo);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#buscar").val( registro.nombre);
        event.preventDefault();
      }
      function cambiarEstado(evaluacion,estado){
        var parametro={
          "id_evaluacion":evaluacion,
          "id":estado,
        };
        $.ajax({
            url: "../../controlador/editarEstadoEvaluacion.php",
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
        $("#buscar").validCampoFranz("abcdefghijklmnñopqrstuvwxyz1234567890 %%");
         $("#txtnombre").validCampoFranz("1234567890abcdefghijklmnñopqrstuvwxyz ");        
      }