<?php
require_once("Database.php");
session_start();

if (!isset($_SESSION['idusuario'])) {
    header("Location: Index.php");
    exit;
}

$idUsuario = $_SESSION['idusuario'];

$stmtCursos = $pdo->prepare("SELECT * FROM cursos WHERE idusuarios = ?");
$stmtCursos->execute([$idUsuario]);
$cursos = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);

foreach ($cursos as $curso) {
    echo '<div class="card" onclick="location.href=\'Cargar_Curso.php?curso='.$curso['idcursos'].'\'">';
    
    if ($curso['idioma'] === "Español") {
        echo '<img src="img/SP_LAN.png" alt="Lan_img">';
    } elseif ($curso['idioma'] === "Inglés") {
        echo '<img src="img/EN_LAN.png" alt="Lan_img">';
    } elseif ($curso['idioma'] === "Frances") {
        echo '<img src="img/FR_LAN.png" alt="Lan_img">';
    } else {
        echo '<img src="img/default.png" alt="Lan_img">';
    }

    echo '<h1>'.$curso['idioma'].'</h1>';
    echo '<p>Nivel '.$curso['dificultad'].'</p>';
    echo '</div>';
}
?>
