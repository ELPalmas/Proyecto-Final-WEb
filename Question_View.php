<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Pregunta</title>
        <link rel="stylesheet" href="Main_Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" />
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
                    <button class="boton" onclick="location.href='Home.php'">
                        <img src="img/misCursos.png" alt="cursos"> Mis Cursos
                    </button>
                    <button class="boton" onclick="location.href='Index.php'">Cerrar sesión</button>
                </div> 
            </div> 
        </header>

        <div>
            <button class="back_button" onclick="location.href='Course_View.php'"><i class="fa-solid fa-arrow-left"></i></button>
        </div>

        <div class="alinear_preguntas">
            <div class="question_content">
                <?php 
                include 'Cargar_Question.php'; 
                ?>
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
