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
    <link rel="stylesheet" href="Main_Style.css">
    <title>Palrom Learning</title>
</head>
<body>
    <header class="main_header">
        <svg width="250" height="60"> 
            <text x="50%" y="65%" text-anchor="middle" font-size="1cm" fill="white" stroke="#fd3737" stroke-width="0.8">
                Palrom Learning
            </text>
        </svg>
        <button class="boton" id="lenguage" >
            <img src="img/lenguage.png" alt="lenguage" id="lenguajeImg">
            Idioma
        </button>
    </header>
    <div class="main_content">
        <div class="announcement">
            <img src="img/inteligencia-artificial.png" alt="ai logo">
            <p>Aprende idiomas de la manera mas inteligente e innovadora utilizando IA</p>
        </div>
        <div class="main_button_panel" id="portada_inicio">
            <p class="ELiminacionMovil">Aprende idiomas de la manera mas inteligente e innovadora utilizando IA</p>
            <button class="boton" id="Login" onclick="location.href='Login.php'">Iniciar Sesión</button>
            <button class="boton" id="Registry" onclick="location.href='Register.php'">Crear una cuenta</button>
        </div>
        <h2 class="ELiminacionDekstop">Inteligencia que Se Adapta a Ti</h2>
        <p class="ELiminacionDekstop">La IA analiza tus errores y fortalezas para ofrecerte ejercicios hechos a tu medida, sin frustraciones.</p>
        <h2 class="ELiminacionDekstop">Aprende Donde Quieras, Cuando Quieras</h2>
        <p class="ELiminacionDekstop">Desde tu celular o computadora, accede a sesiones cortas y retos diarios que se ajustan a tu ritmo.</p>
        <h2 class="ELiminacionDekstop">Conviértete en Ciudadano Global</h2>
        <p class="ELiminacionDekstop">Dominar nuevos idiomas te abre puertas en el mundo laboral, social y cultural. ¡Empieza hoy!</p>
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