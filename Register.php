<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceland&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Main_Style.css">
    <title>Registrarse</title>
</head>
<body>
   <header class="main_header">
        <svg width="250" height="60"> 
            <text x="50%" y="65%" text-anchor="middle" font-size="1cm" fill="white" stroke="#fd3737" stroke-width="0.8">
                Palrom Learning
            </text>
        </svg>
        <button class="boton" id="lenguage" >
            <img src="img/lenguage.png" alt="lenguege">Idioma</button>
    </header>
    <div>
        <button class="back_button" onclick="location.href='Index.php'"><i class="fa-solid fa-arrow-left"></i></button>
    </div>

    <div class="alienar_pagina_dekstop">
        <div class="registro_dekstop">
            <h2 class="login_title">Crear Cuenta</h2>
            <form class="registry_form" action="Procesar_Registro.php" method="post">
                <h3 class="ELiminacionMovil">Nombre</h3>
                <input type="text" placeholder="Nombre" name="username">
                <h3 class="ELiminacionMovil">Correo Electrónico</h3>
                <input type="text" placeholder="Correo Electrónico" name="email">
                <h3 class="ELiminacionMovil">Contraseña</h3>
                <input type="password" placeholder="Contraseña" name="password">
                <h3 class="ELiminacionMovil">Repetir Contraseña</h3>
                <input type="password" placeholder="Repetir Contraseña" name="passwordR">
                <div class="main_button_panel">
                    <button class="boton" type="submit">Registrarse</button>
                </div>
            </form>
            <div class="other_account_option">
                <b>¿Ya tienes una cuenta?</b>
                <a href="Login.php">INICIAR SESIÓN</a>
            </div>
            <div class="main_button_panel">
                <button id="borrarMovil" class="boton">Iniciar Sesión</button>
            </div>
            
        </div>
        <div class="t_and_c_advise">
                <p>
                    Al registrarte aceptas los <a href="">Términos y Condiciones</a> y reconoces nuestras <a href="">Políticas de Privacidad</a>.
                </p>
                <p>
                    Esta página también aplica la <a href="https://policies.google.com/privacy?hl=es">Política de Privacidad</a> y los <a href="https://policies.google.com/terms?hl=es">Términos de Servicio</a> de Google.
                </p>
        </div>
    </div>
    <footer class="main_footer">
        <ul>
            <h3>Nuestros cursos</h3>
            <li>
                Sur KM 5.5, Universidad Autónoma de Baja California Sur, 23085 La Paz, B.C.S.
            </li>
        </ul>
        <ul>
            <h3>Términos y Conficiones</h3>
            <li>
                Términos
            </li>
            <li>
                Conficiones
            </li>

            <li>
                Privacidad
            </li>
        </ul>
        <ul>
            <h3>Contáctanos</h3>
            <li>
                Teléfono: +526121238800
            </li>
            <li>
                Email: palrom_580@uabcs.mx
            </li>
        </ul>
    </footer>
</body>
</html>