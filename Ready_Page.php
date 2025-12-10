<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header("Location: Index.php");
    exit;
}
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
    <title>Crea tu curso</title>
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
        <button class="back_button" onclick="location.href='Creation_Page.php'" id="btnVolver"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="alinear_creacion">
        <div class="creation_form">
            <progress class="creation_progress" value="100" max="100"></progress>
            <div class="finish_content">
                <h2>
                    Todo esta preparado para tu plan personal de aprendizaje, ¿Listo para verlo?
                </h2>
                <img src="img/Ready.png" alt="Rdy_img">
                <button class="boton" id="btnGenerar">Generar Plan de Estudios</button>
            </div>
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
    <script src="Creation_Script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const idioma = localStorage.getItem("idioma");
            const dificultad = localStorage.getItem("dificultad");
            const proposito = localStorage.getItem("proposito");

            console.log("Valores recibidos en Ready_Page:", idioma, dificultad, proposito);
        });
    </script>
</body>
</html>