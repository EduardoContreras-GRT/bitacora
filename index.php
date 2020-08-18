<!DOCTYPE html>
<html lang="en">

<head>
    <title>GRT | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
   

    <link href="app/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="app/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="app/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <h3 class="main-title-w3layouts mb-2 text-center text-white">Bit&aacute;cora Digital</h3>
            <h3 class="main-title-w3layouts mb-2 text-center text-white">GrahamRossTraining - SalesTech</h3>
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="app/controller/LoginController.php" method="post">
                    <div class="form-group" style="display:none">
                        <input type="text" id="action" name="action"/ value="serchUser">
                        <div class="text-danger"></div>
                    </div>  
                    <div class="form-group">
                        <label>Ingresa Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        <div class="form-check col-md-6 text-sm-left text-center">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                        </div>
                        <div class="forgot col-md-6 text-sm-right text-center">
                            <a href="app/forms/forgot.html">Olvidaste Contraseña?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Login</button>
                </form>      
            </div>
            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>©GRT 2020 . All Rights Reserved | Design by
                    <a href="http://grt.mx/"> GRT </a>
                </p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalLong">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                Lo sentimos
              </h5>
              <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
              <p>
                <?php
                  if(isset($_REQUEST['msg'])) {
                    $msg=$_REQUEST['msg'];
                    echo $msg;
                  }
                ?>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              
            </div>
          </div>
        </div>
      </div>



    <script src='app/assets/js/jquery-2.2.3.min.js'></script>
    <script src="app/assets/js/bootstrap.min.js"></script>


    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <?php
      if(isset($_REQUEST['msg'])) {
        $msg=$_REQUEST['msg'];
        echo'<script type="text/javascript">';    
        echo"    $(document).ready(function(){";
        echo'       $("#exampleModalLong").modal("show");';
        echo"    })";                             
        echo"</script>";
      }
    ?>
</body>

</html>