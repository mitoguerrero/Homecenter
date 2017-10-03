 $(document).ready(function(){
        cargarEvaluacion();
        cargarCategoria();
        validarCampos();
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaboradorNoEvaluado.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
        });
        $('#frmejecutar').submit(function(e) {
            e.preventDefault();
                var preguntas = "";
                var suma=0;
                $("#frmejecutar").find(':input').each(function(){

                  var elemento= this;
                  if (elemento.checked) {
                    if(elemento.value == ""){

                    }else{                   
                      preguntas += elemento.value+";";
                    }
                  }
                  
                });
                $("#frmejecutar").find(':input').each(function(){

                  var elemento= this;
                  if (elemento.checked) {
                    if(elemento.value == ""){

                    }else{                   
                      suma += parseInt(elemento.value);
                      $("#txtpuntajetotal").val(suma);

                    }
                  }
                  total=$("#txtpuntajetotal").val();
                  cuenta=$("#txtcontador").val();

                  if (parseInt(total)<=parseInt(cuenta)) {
                    mensaje="PÉSIMO";
                  }else if (parseInt(total)<=parseInt(cuenta)*2) {
                    mensaje='MALO';
                  }else if (parseInt(total)<=parseInt(cuenta)*3) {
                    mensaje='REGULAR';
                  }else if (parseInt(total)<=parseInt(cuenta)*4) {
                    mensaje='BUENO';
                  }else if (parseInt(total)<=parseInt(cuenta)*5) {
                    mensaje='EXCELENTE';
                  }else{
                    mensaje='OTRO';
                  };
                  $("#txtresultado").val(mensaje);
                });
                //alert(total+" "+cuenta+" "+mensaje);
                //return;
                
                var parametro={
                  "preguntas":preguntas,
                  "evaluacion":$("#txtevaluacion").val(),
                  "usuario":$("#txttrabajador").val(),
                  "idcolaborador":$("#idcolaborador").val(),
                  "txttotal":$("#txtpuntajetotal").val(),
                  "resultado":$("#txtresultado").val(),
                };

                if ($("#idcolaborador").val()==0) {
                  alert("Tiene que buscar al colaborador");
                  return;
                }
                if ($("#txtevaluacion").val()==0) {
                  alert("Tiene que elegir una evaluación");
                  return;
                };
                  $.ajax({
                        url: "../../controlador/ejecutarEvaluacion.php",
                        type: "post",
                        dataType: "json",
                        data:parametro,

                        success: function(DataJson){
                          if(DataJson.state){
                            alert("Correcto");
                            $("#txtcolaborador").val("");
                            $("#idcolaborador").val(0);
                          }else{
                            alert("Incorrecto");
                            $("#txtcolaborador").val("");
                            $("#idcolaborador").val(0);
                          }                      
                                                      
                        }
                  }); 
        });
      }); 
      function contarPreguntas(){
          evaluacion=$("#txtevaluacion").val();
          parametro={
            "id_evaluacion": evaluacion,
          }
          $.ajax({
                        url: "../../controlador/contarPreguntas.php",
                        type: "post",
                        dataType: "json",
                        data: parametro,
                        success: function(DataJson){
                          if(DataJson.state){
                            
                              //alert(DataJson.retorno.cantidad);
                              $("#txtcontador").val(DataJson.retorno.cantidad);
                             
                                //alert(DataJson.resultado[data].nombre_alumno);
                          }else{
                           
                          }                      
                                                      
                        }
          }); 
      }
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
      function listarVincular(){
        $("tbody").empty();
          evaluacion=$("#txtevaluacion").val();
          var parametro={
            "id_evaluacion":evaluacion,
          };
          $.ajax({
            url: "../../controlador/listarVincular.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("."+DataJson.retorno[data].idcategoria+"").append("<tr><td colspan='2'>"+DataJson.retorno[data].descripcion+"</td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='1,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='2,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='3,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='4,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td><td><input type='radio' name='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' id='radio"+DataJson.retorno[data].idpreguntaevaluacion+"' value='5,"+DataJson.retorno[data].idpreguntaevaluacion+"'></td></tr>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function listarIncidencias(){
          colaborador=$("#idcolaborador").val();
          var parametro={
            "idcolaborador":colaborador,
          };
          $.ajax({
            url: "../../controlador/listarIncidenciaCategoria.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#"+DataJson.retorno[data].idcategoria+"").html("<a class='btn btn-info' onclick='verDetalle("+DataJson.retorno[data].idcategoria+")' data-toggle='modal' data-target='#myModal'>Ver Detalle</a> <span class='label label-danger pull-right'>"+DataJson.retorno[data].cantidad+"</span>");
                }
              }else{
                            
              }                                                         
            }
          }); 
      }
      function verDetalle(id){
          $("#bodyincidencias").empty();
          colaborador=$("#idcolaborador").val();
          var parametro={
            "idcolaborador":colaborador,
            "idcategoria":id,
          };
          $.ajax({
            url: "../../controlador/listarDetalleIncidencia.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                for(data in DataJson.retorno){
                  $("#bodyincidencias").append("<tr><td>"+DataJson.retorno[data].descripcion+"</td><td>"+DataJson.retorno[data].fecharegistro+"</td></tr>");
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
                  $("#listadocategoria").append("<div class='box box-primary'><div class='box box-header'><h4 class='box-title'>"+DataJson.retorno[data].nombrecategoria+"</h4></div><div class='box box-body'><table class='table table-bordered' class='tablapregunta'><thead><tr><th rowspan='2'>Pregunta</th><th>Incidencias</th><th colspan='5'>Opciones</th></tr><tr><td id="+DataJson.retorno[data].idcategoria+"></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr></thead><tbody class='"+DataJson.retorno[data].idcategoria+"'></tbody></table></div></div>");
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
        listarIncidencias();
      }
          
      function f_marcar_registro(event, ui){
        var registro = ui.item.value;
        $("#txtcolaborador").val( registro.nombre);
        event.preventDefault();
      }
      function validarCampos(){
        $("#txtcolaborador").validCampoFranz("abcdefghijklmnñopqrstuvwxyz %%");
                 
      }