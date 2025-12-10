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
    <title>Inicio</title>
</head>
<body>
    <header class="main_header">
        <svg width="250" height="60"> 
            <text x="50%" y="65%" text-anchor="middle" font-size="1cm" fill="white" stroke="#fd3737" stroke-width="0.8">
                Palrom Learning
            </text>
        </svg>
        <button class="ham_menu" onclick="location.href='Procesar_Logout.php'">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </button>

        <div class="magic_thing">
            <div class="menu_super_dekstop">
                <button class="boton" id="lenguage" >
                    <img src="img/lenguage.png" alt="lenguage" id="lenguajeImg">
                    Idioma
                </button>
                <button class="boton" onclick="location.href='Procesar_Logout.php'">Cerrar sesión</button>
            </div> 
        </div> 
    </header>
    <div>
        <!--
        <button class="back_button" onclick="location.href='Palrom.html'"><i class="fa-solid fa-arrow-left"></i></button>
        -->
    </div>
    <div class="alinear_home">
        <div class="home_content">
            <h2>Mis cursos</h2>
            <div class="card" id="courseCard" hidden>
                <img src="img/EN_LAN.png" alt="Lan_img">
                <h1>Inglés</h1>
                <p>Nivel Principiante</p>
            </div>
            <?php include("Cargar_Home.php"); ?>
            <div class="create_card" onclick="location.href='Creation_Page.php'">
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>

    </div>
    
    <footer class="main_footer">
        <ul >
            <h3>Visitanos</h3>
            <li>Sur KM 5.5 Universidad Autónoma de Baja California Sur 23085 La Paz, B.C.S.</li>
        </ul>
        <ul class="ELiminacionMovil">
            <h3>Nuestros cursos</h3>
            <li>Español</li>
            <li>Ingles</li>
            <li>Frances</li>
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