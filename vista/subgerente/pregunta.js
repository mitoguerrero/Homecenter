 $(document).ready(function(){
        cargarCategoria();
        listar();
        validarCampos();
        $("#frmpregunta").submit(function(e){
                e.preventDefault();

                var data =$("#frmpregunta").serializeArray();

                if ($("#idpregunta").val()!=0) {
                  ruta='../../controlador/editarPregunta.php';
                }else{
                  ruta='../../controlador/registrarPregunta.php';
                }

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
      })
      function cargarCategoria(){
          $.ajax({
            url: "../../controlador/cargarCategoria.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtcategoria").append("<option value='"+DataJson.retorno[data].idcategoria+"'>"+DataJson.retorno[data].nombrecategoria+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function borraralerta(){
          $("#alertacierrate").alert('close');
        }
        function limpiarformulario(){
          $(document).ready(function() {

              $("#frmpregunta").find(':input').each(function() {
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
          $("#tablalistado").load("../../controlador/listarPregunta.php", function(){
            $("#table_id").dataTable();
          });  
        }
        function leer(id){
          var parametro={
            "id_pregunta":id,
          }
          $.ajax({
            url: "../../controlador/cargarPregunta.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#idpregunta").val(DataJson.retorno.idpregunta);
                $("#txtpregunta").val(DataJson.retorno.descripcion);
                $("#txtcategoria").val(DataJson.retorno.idcategoria);
              }else{
                            
              }                                                         
            }
          }); 
        }
        function validarCampos(){
        $("#txtpregunta").validCampoFranz("abcdefghijklmnñopqrstuvwxyz. ?");
                
      }