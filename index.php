<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>HOMECENTER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>HOMECENTER</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg" style="font-size:20px;">Iniciar Sesión</p>
        <form id="frmlogin">
          <div class="form-group has-feedback">
            
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" required name="txtemail" id="txtemail" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" required name="txtpassword" id="txtpassword" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-lg-4">
              
            </div>
            <div class="col-lg-4">
              <button type="submit" class="btn btn-warning btn-block btn-flat center-block">Ingresar</button>
            </div><!-- /.col -->
            <div class="col-lg-4">
              
            </div>
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="public/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="public/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        $('#frmlogin').submit(function(e) {
               
                      e.preventDefault();

                        $.ajax({
                        url: "controlador/login.php",
                        type: "post",
                        dataType: "json",
                        data:$("#frmlogin").serialize() ,

                        success: function(DataJson){
                          if(DataJson.state){
                            //alert(DataJson.tipo);
                            if (DataJson.tipo==1) {
                                location.href  = "vista/administrador/administrador.php";
                            }else if(DataJson.tipo==2){
                                location.href  = "vista/subgerente/subgerente.php";
                            }else if (DataJson.tipo==3) {
                                location.href  = "vista/gerente/gerente.php";
                            }else if(DataJson.tipo==0){
                                alert("No tiene acceso");
                            }
                          }else{
                            alert("No tiene acceso");
                          }                      
                                                      
                        }
                    });                  
                                
             })
      });
    </script>

  </body>
</html>