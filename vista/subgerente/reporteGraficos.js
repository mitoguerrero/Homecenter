$(document).ready(function(){
        cargarPeriodo();
        validarCampos();
        $("#txtcolaborador").autocomplete({
            source: "../../controlador/buscarColaborador.php", //el archivo que realiza la busqueda
            minLength: 2, //le decimos que tenga al menos 2 caracteres para ejecutrar la busqueda
            select: f_seleccionar_registro, //funcion que se ejecuta cuando el usuario selecciona un registro
            focus: f_marcar_registro
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
      function cargarPeriodo(){
          $.ajax({
            url: "../../controlador/cargarPeriodoTodos.php",
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
      function buscarGrafico(){
          var parametro={
            "id_colaborador":$("#idcolaborador").val(),
            "id_periodo":$("#txtperiodo").val(),
          }
          $.ajax({
            url: "../../controlador/cargarGrafico.php",
            type: "post",
            dataType: "json",
            data: parametro,
            success: function(DataJson){
              if(DataJson.state){
                var datosmuchos = new Array();
                for(data in DataJson.retorno){
                  datosmuchos.push(DataJson.retorno[data].puntajetotal);
                }
                //alert(datosmuchos.length);

                if (datosmuchos.length<2) {
                  alert("Aún le falta la 2da evaluación");
                  return;
                };
                //alert(datosmuchos);
                var a= datosmuchos[0];
                var b= datosmuchos[1];


                var Datos={
                  labels: ["Evaluacion 1","Evaluacion 2"],
                  datasets: [{
                    fillcolor: "rgba(91,288,146,0.6)",
                    strokeColor: "rgba(57,194,112,0.7)",
                    highlightFill: "rgba(73,206,180,0.6)",
                    highlightStroke: "rgba(66,196,157,0.7)",
                    data: [a,b]
                  }]
                }
                contexto=document.getElementById("grafico").getContext("2d");
                window.Barra= new Chart(contexto).Bar(Datos,{responsive:true});
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