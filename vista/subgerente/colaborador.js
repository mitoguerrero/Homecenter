$(document).ready(function(){
		  validarCampos();
          $("#txtfechanacimiento").datepicker({ changeMonth: true,
          changeYear: true, dateFormat:'yy-mm-dd'});
          $("#txtfechaingreso").datepicker({ changeMonth: true,
          changeYear: true, dateFormat:'yy-mm-dd'});
          $("#txtdni").numeric();
          $("#estado").hide();
          listar();
          listarArea();
          $("#buscar").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
          })
          $("#frmcolaborador").submit(function(e){
                e.preventDefault();

                var id=$("#idcolaborador").val();
                if (id!=0) {
                    ruta='../../controlador/editarColaborador.php';
                }else{
                    ruta='../../controlador/registrarColaborador.php';
                }
                var data =$("#frmcolaborador").serializeArray();

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
        function camposMayus(field){
                field.value=field.value.toUpperCase();
        }
        function borraralerta(){
          $("#alertacierrate").alert('close');
        }
        function limpiarformulario(){
          $(document).ready(function() {

              $("#frmcolaborador").find(':input').each(function() {
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
          $("#tablalistado").load("../../controlador/listarColaborador.php", function(){
            $("#table_id").dataTable();
          });  
        }
        function listarArea(){
          $.ajax({
            url: "../../controlador/listarArea.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){              
                for(data in DataJson.retorno){
                  $("#txtarea").append("<option value='"+DataJson.retorno[data].idarea+"'>"+DataJson.retorno[data].nombrearea+"</option>");
                }  
              }else{   
              }                                                              
            }
          }); 
        }
        function f_seleccionar_registro(event, ui){
        var registro = ui.item.value;
        $("#idcolaborador").val( registro.codigo);
        $("#txtnombre").val( registro.nombres);
        $("#txtapellido").val( registro.apellidos);
        $("#txtdni").val( registro.dni);
        $("#txtcorreo").val( registro.email );
        $("#txtarea").val( registro.area );
        $("#txtdireccion").val(registro.direccion);
        $("#txttelefono").val(registro.telefono);
        $("#txtfechanacimiento").val(registro.fechana);
        $("#txtfechaingreso").val(registro.fechain);
        event.preventDefault();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#buscar").val( registro.nombre);
        event.preventDefault();
      }
      function cambiarEstado(idusuario,id){
        var parametro={
          "id_usuario":idusuario,
          "id":id,
        };
        $.ajax({
            url: "../../controlador/editarEstado.php",
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
        $("#txtapellido").validCampoFranz("abcdefghijklmnñopqrstuvwxyz ");
        $("#txtdni").validCampoFranz("1234567890");
        $("#txtcorreo").validCampoFranz("abcdefghijklmnñopqrstuvwxyz1234567890.@_-");
        $("#txtdireccion").validCampoFranz("abcdefghijklmnñopqrstuvwxyz1234567890#-_. ");
        $("#txttelefono").validCampoFranz("1234567890-");  
        
      }