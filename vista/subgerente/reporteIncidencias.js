 $(document).ready(function(){
  validarCampos();
        $("#porcategoria").hide();
        $("#portipo").hide();
        cargarCategoria();
        cargarTipo();
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $("#txtcolaborador2").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro1, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro1
        });
        
      });
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
      function f_seleccionar_registro1(event, ui){
        var registro = ui.item.value;
        $("#idcolaborador2").val( registro.codigo);
        $("#txtcolaborador2").val( registro.nombre);
        event.preventDefault();
      }
          
      function f_marcar_registro1(event, ui){
        var registro = ui.item.value;
        $("#txtcolaborador2").val( registro.nombre);
        event.preventDefault();
      }
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
      function elegir(id){
        $("#bodyresultado").empty();
        if (id==1) {
          $("#porcategoria").show();
          $("#portipo").hide();

        }else if (id==2) {
          $("#porcategoria").hide();
          $("#portipo").show();
        }else{
          $("#porcategoria").hide();
          $("#portipo").hide();
        }
      }
      function buscarPorCategoria(){
          $("#bodyresultado").empty();
          var parametro={
            "id_categoria":$("#txtcategoria").val(),
            "id_colaborador":$("#idcolaborador").val(),
          };
          $.ajax({
            url: "../../controlador/listarIncidentePorCategoria.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#bodyresultado").append("<table class='table table-bordered'><thead><tr><th>Descripción</th><th>Fecha</th></tr></thead><tbody id=bodyreporteevaluacion></tbody></table>");
                for(data in DataJson.retorno){
                  $("#bodyreporteevaluacion").append("<tr><td>"+DataJson.retorno[data].descripcion+"</td><td>"+DataJson.retorno[data].fecharegistro+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function buscarPorTipo(){
          $("#bodyresultado").empty();
          var parametro={
            "id_tipo":$("#txttipo").val(),
            "id_colaborador":$("#idcolaborador2").val(),
          };
          $.ajax({
            url: "../../controlador/listarIncidentePorTipo.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#bodyresultado").append("<table class='table table-bordered'><thead><tr><th>Descripción</th><th>Fecha</th></tr></thead><tbody id=bodyreporteevaluacion></tbody></table>");
                for(data in DataJson.retorno){
                  $("#bodyreporteevaluacion").append("<tr><td>"+DataJson.retorno[data].descripcion+"</td><td>"+DataJson.retorno[data].fecharegistro+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function validarCampos(){
        $("#txtcolaborador").validCampoFranz("abcdefghijklmnñopqrstuvwxyz %%");
         $("#txtdescripcion").validCampoFranz("1234567890abcdefghijklmnñopqrstuvwxyz _-#");        
      }