 $(document).ready(function(){
        cargarCategoria();
        validarCampos();
        cargarTipo();
        listar();
        $("#txtfecha").datepicker({ changeMonth: true,
          changeYear: true, dateFormat:'yy-mm-dd'});
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $("#frmincidencia").submit(function(e){
                e.preventDefault();

                
                var data =$("#frmincidencia").serializeArray();

                $.ajax({
                    url: '../../controlador/registrarIncidencia.php',
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
                    usuariopermanente=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuariopermanente);
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
                    usuariopermanente=$("#idusuariopermanente").val();
                    $("#idusuario").val(usuariopermanente);
                })
            });
      });
        function borraralerta(){
          $("#alertacierrate").alert('close');
        }
        function limpiarformulario(){
          $(document).ready(function() {

              $("#frmincidencia").find(':input').each(function() {
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
          $("#tablalistado").load("../../controlador/listarIncidencia.php", function(){
            $("#table_id").dataTable();
          });  
        }
      function cargarCategoria(){
          $.ajax({
            url: "../../controlador/cargarCategoriaTodos.php",
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
      function cargarTipo(){
          $.ajax({
            url: "../../controlador/cargarTipo.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txttipo").append("<option value='"+DataJson.retorno[data].idtipoincidencia+"'>"+DataJson.retorno[data].nombretipoincidencia+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idcolaborador").val( registro.codigo);
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }

      function validarCampos(){
        $("#txtcolaborador").validCampoFranz("abcdefghijklmnñopqrstuvwxyz %%");
         $("#txtdescripcion").validCampoFranz("1234567890abcdefghijklmnñopqrstuvwxyz _-#");
        
      }