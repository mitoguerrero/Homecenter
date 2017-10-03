$(document).ready(function(){
        cargarEvaluacion();
        cargarCategoria();
        validarCampos();
      });
      function cargarEvaluacion(){
          $.ajax({
            url: "../../controlador/cargarEvaluacion.php",
            type: "post",
            dataType: "json",
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#txtevaluacion").append("<option value='"+DataJson.retorno[data].idevaluacion+"'>"+DataJson.retorno[data].descripcion+"</option>");
                }
              }else{
                            
              }                                                         
            }
          }); 
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
      function listarPreguntaEvaluacion(){
          $("#bodypreguntas").empty();
          var parametro={
            "id_evaluacion":$("#txtevaluacion").val(),
            "id_categoria":$("#txtcategoria").val(),
          };
          $.ajax({
            url: "../../controlador/listarPreguntaEvaluacion.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  if (DataJson.retorno[data].caso=='VINCULAR') {
                    boton="<button class='btn btn-success' onclick='vincular("+DataJson.retorno[data].idpregunta+")' id="+DataJson.retorno[data].idpregunta+">Vincular</button>";
                  }else{
                    boton="<button class='btn btn-danger' onclick='desvincular("+DataJson.retorno[data].idpregunta+")' id="+DataJson.retorno[data].idpregunta+">Desvincular</button>";
                  }
                  $("#bodypreguntas").append("<tr><td>"+DataJson.retorno[data].descripcion+"</td><td>"+boton+"</td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function vincular(id){
        evaluacion=$("#txtevaluacion").val();
        var parametro={
          "id_evaluacion":evaluacion,
          "id_pregunta":id,
        };
        $.ajax({
            url: "../../controlador/vincularPregunta.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#"+id+"").attr("class","btn btn-danger");
                $("#"+id+"").html("");
                $("#"+id+"").html("Desvincular");
                $("#"+id+"").attr("onclick","desvincular("+id+")");
              }else{
                alert("Incorrecto");            
              }                                       
            }
        }); 
      }
      function desvincular(id){
        evaluacion=$("#txtevaluacion").val();
        var parametro={
          "id_evaluacion":evaluacion,
          "id_pregunta":id,
        };
        $.ajax({
            url: "../../controlador/desvincularPregunta.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                $("#"+id+"").attr("class","btn btn-success");
                $("#"+id+"").html("");
                $("#"+id+"").html("Vincular");
                $("#"+id+"").attr("onclick","vincular("+id+")");
              }else{
                alert("Incorrecto");       
              }                                                         
            }
        }); 
      }
      function validarCampos(){
        $("#txtcolaborador").validCampoFranz("abcdefghijklmnñopqrstuvwxyz %%");
         $("#txtdescripcion").validCampoFranz("1234567890abcdefghijklmnñopqrstuvwxyz _-#");        
      }