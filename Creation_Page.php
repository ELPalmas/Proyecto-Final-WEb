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
        <button class="back_button" id="btnVolver"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    <div class="alinear_creacion">
        <div class="creation_form">
            <progress class="creation_progress" value="0" max="100" id="programCBar"></progress>
            <h2>
                ¿Qué idioma quieres aprender?
            </h2>
            <div class="card">
                <img src="img/SP_LAN.png" alt="Lan_img">
                <div>
                    <h1>Español</h1>
                </div>
            </div>
            <div class="card">
                <img src="img/EN_LAN.png" alt="Lan_img">
                <div>
                    <h1>Inglés</h1>
                </div>
            </div>
            <div class="card">
                <img src="img/FR_LAN.png" alt="Lan_img">
                <div>
                    <h1>Frances</h1>
                </div>
            </div>
            <button class="desactivado" id="btnContinuar" disabled>Continuar</button>
        </div>
    </div>
    <script src="Creation_Script.js"></script>
</body>
</html>