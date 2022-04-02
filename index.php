<?php

    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 
    if($_SESSION['verificar']){
      header("Location: ./home.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Posgrado ITSM - Login</title>
    <?php
    include("./inc/link.php")
    ?>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
    </style>
</head>

<body class="text-center" cz-shortcut-listen="true">
    <div class="container">
        <main class="form-signin">
            <form action="./process/login.php" method="POST">
              <img class="mb-4" src="assets/media/logos/logo-oficial.png" alt="" width="120" height="120">
              <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
          
              <div class="form-floating">
                <input type="input" class="form-control" name="user" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Usuario</label>
              </div>
              <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Contraseña</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
              <p class="mt-5 mb-3 text-muted">© Maestrias TECNM 2022-2023</p>
            </form>
          </main>
    </div>
</body>

</html>