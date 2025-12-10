<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Iceland&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" />
        <link rel="stylesheet" href="Main_Style.css">
        <title>Curso</title>
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

        <div class="course_content_dekstop">
            <div class="tareas_pendientes">
                <?php 
                $_GET['modo'] = 'lista';
                include 'Cargar_Curso.php';
                ?>
            </div>

            <div class="visualizar_tarea">
                <?php 
                $_GET['modo'] = 'detalle';
                include 'Cargar_Curso.php';
                ?>
            </div>
        </div>
        <div class="course_content">
            <div class="course_additions">
                <button class="back_button" onclick="location.href='Home.php'">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <h2>Mi progreso</h2>
            </div>
            <!--
            <div class="course_card">
                <p>Día 1</p>
                <h1>Palabras Básicas</h1>
                <h3>Actividades</h3>
                <div class="course_tasks">
                    <button class="completed_task"><i class="fa-solid fa-check"></i></button>
                    <button class="completed_task"><i class="fa-solid fa-check"></i></button>
                    <button class="completed_task"><i class="fa-solid fa-check"></i></button>             
                </div>
                <div class="day_progress_bar">
                    <progress class="task_progress" value="100" max="100"></progress>
                </div>
            </div>
            -->
            <?php
            $_GET['modo'] = 'movil';
            include 'Cargar_Curso.php';
            ?>
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
