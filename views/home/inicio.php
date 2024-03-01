<?php include $templates_header ?>
<body>

<div class="limiter">
        <div class="container-login100" style="background-image: url('Login_v3/images/bg-02.jpg');">
            <div class="wrap-login100">
                
                <span class="login100-form-logo">
                    <img src="Login_v3/images/gobierno.png" alt="gobierno" height="100" width="80">
                    </span>
                  
                  <span class="login100-form-title p-b-34 p-t-27">
                        Iniciar Sesion
                  </span>

               
                <div class="input100">
                    <?php
                    session_start();
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo "<h5 style='color: gold'>Credenciales incorrectas</h5>";
                        session_destroy();  }
                    ?>
                </div>


                    <form class="login100-form validate-form" action="controllers/controller.login.php" method="post">
                       
                        <div class="wrap-input100 validate-input" data-validate = "Correo no valido">
                            <input type="email" class="input100" name="email" placeholder="Correo" required>
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Ingresar Contraseña">
                            <input type="password" class="input100" name="pass" placeholder="Contraseña" required>
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div class="container-login100-form-btn"><br>

                        <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Ingresar">
                         </div><br><br>
                    </form>
                </div>

                </div>
            </div>
        </div>
           </div>
     </div>

    <div id="dropDownSelect1"></div>
</div>
<?php include $templates_footer ?>

<!--===============================================================================================-->
    <script src="Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/vendor/bootstrap/js/popper.js"></script>
    <script src="Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/vendor/daterangepicker/moment.min.js"></script>
    <script src="Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="Login_v3/js/main.js"></script>

</body>
</html>