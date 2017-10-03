$(document).ready(function(){
          $("#estado").hide();
          listar();
          validarCampos();
          $("#buscar").autocomplete({
            source: "../../controlador/buscarCategoria.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
          })
          $("#frmcategoria").submit(function(e){
                e.preventDefault();

                var id=$("#idcategoria").val();
                if (id!=0) {
                    ruta='../../controlador/editarCategoria.php';
                }else{
                    ruta='../../controlador/registrarCategoria.php';
                }
                var data =$("#frmcategoria").serializeArray();

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

              $("#frmcategoria").find(':input').each(function() {
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
          $("#tablalistado").load("../../controlador/listarCategoria.php", function(){
            $("#table_id").dataTable();
          });  
        }
        function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idcategoria").val( registro.codigo);
        $("#txtnombre").val( registro.nombres);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#buscar").val( registro.nombre);
        event.preventDefault();
      }
      function cambiarEstado(idcategoria,id){
        var parametro={
          "id_categoria":idcategoria,
          "id":id,
        };
        $.ajax({
            url: "../../controlador/editarEstadoCategoria.php",
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
        $("#txtnombre").validCampoFranz("abcdefghijklmnñopqrstuvwxyz ");
         $("#buscar").validCampoFranz("abcdefghijklmnñopqrstuvwxyz%% ");        
      }