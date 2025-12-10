<?php
require_once("Database.php");
session_start();

$idpreguntas = $_GET['idpreguntas'] ?? null;
if ($idpreguntas) {
    $stmt = $pdo->prepare("UPDATE preguntas SET completada = 1 WHERE idpreguntas = ?");
    $stmt->execute([$idpreguntas]);
    echo "Pregunta marcada como completada. Filas afectadas: ".$stmt->rowCount();
} else {
    echo "No se recibió idpreguntas";
}

