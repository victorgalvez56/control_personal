<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Personal | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- base_url() = http://localhost/ventas_ci/-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    
    <style type="text/css">
 
        .fondo {
           width: 100%;
            height: 700px;
            background-image: url(https://www.diariosinfronteras.pe/wp-content/uploads/2019/02/14A-RUDY.jpg);
            background-size: 150%;
            animation: movimiento 10s infinite linear alternate;

            }
        @keyframes movimiento{
            
            from{
                
                background-position: bottom left
            }to{
                background-position: top right;
            }
            
        }
        
        .fondo-degrade{
            width: 100%;
            height: 100%;
            position:fixed;
            background: -webkit-linear-gradient(left,black,#0672d0);
            opacity: 0.5;
        }
        .frente{

            position: relative;
        }
         
     </style>

</head>
<body class="fondo">
    
    <div class="fondo-degrade">
        
        <div class="login-box">
            
            <div class="login-logo">
                <img height="120" width="100" src=https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Emblem_of_the_Peruvian_Army.svg/374px-Emblem_of_the_Peruvian_Army.svg.png>
            </div>
            <!-- /.login-logo -->
            <div class="frente">
            <div class="login-box-body">
                <p class="login-box-msg">Introduzca sus datos de ingreso</p>
                <?php if($this->session->flashdata("error")):?>
                  <div class="alert alert-danger">
                    <p><?php echo $this->session->flashdata("error")?></p>
                  </div>
                <?php endif; ?>
                <form action="<?php echo base_url();?>auth/login" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Usuario" name="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                
            </div>
            </div>
                <!-- /.login-box-body -->
        </div>
    <!-- /.login-box -->
        
    </div>

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>