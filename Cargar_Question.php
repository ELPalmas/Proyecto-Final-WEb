<?php
require_once("Database.php");
session_start();
if (!isset($_SESSION['idusuario'])) {
    header("Location: Index.php");
    exit;
}

$idpreguntas = $_SESSION['idpreguntas'] ?? null;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!$idpreguntas) {
    echo "<p>No se seleccionó ninguna pregunta.</p>";
    exit;
}

$stmtPregunta = $pdo->prepare("SELECT * FROM preguntas WHERE idpreguntas = ?");
$stmtPregunta->execute([$idpreguntas]);
$pregunta = $stmtPregunta->fetch(PDO::FETCH_ASSOC);

if (!$pregunta) {
    echo "<p>La pregunta no existe.</p>";
    exit;
}

$iddia = $pregunta['iddia'];

$stmtPreguntasDia = $pdo->prepare("SELECT * FROM preguntas WHERE iddia = ? ORDER BY idpreguntas ASC");
$stmtPreguntasDia->execute([$iddia]);
$preguntasDia = $stmtPreguntasDia->fetchAll(PDO::FETCH_ASSOC);

$nextPreguntaId = null;
foreach ($preguntasDia as $p) {
    if ($p['idpreguntas'] > $pregunta['idpreguntas']) {
        $nextPreguntaId = $p['idpreguntas'];
        break;
    }
}

$stmtRespuestas = $pdo->prepare("SELECT * FROM respuestas WHERE idpregunta = ?");
$stmtRespuestas->execute([$idpreguntas]);
$respuestas = $stmtRespuestas->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="exercise_info">';
echo '</div>';

echo '<div class="exercise">';
echo '<h2 id="question">'.htmlspecialchars($pregunta['texto']).'</h2>';

$letra = 'a';
foreach ($respuestas as $respuesta) {
    $correcta = (bool)$respuesta['correcta'];
    echo '<div class="answer_card" onclick="checkAnswer('.($correcta ? 'true' : 'false').','.(int)$idpreguntas.')">';
    echo '<h2>'.$letra.') '.htmlspecialchars($respuesta['valor']).'</h2>';
    echo '</div>';
    $letra++;
}

echo '<h2 id="answer_state" class="answer_state"></h2>';
echo '</div>';

echo '<div class="main_button_panel">';
if ($nextPreguntaId) {
    echo '<button id="continueBtn" class="boton" style="display:none;" onclick="location.href=\'Question_View.php?idpreguntas='.$nextPreguntaId.'\'">Continuar</button>';
} else {
    echo '<button id="continueBtn" class="boton" style="display:none;" onclick="location.href=\'Course_View.php?dia='.$iddia.'\'">Volver al curso</button>';
}
echo '</div>';
?>
<script>
function checkAnswer(correct, idpreguntas) {
    const state = document.getElementById("answer_state");
    const continueBtn = document.getElementById("continueBtn");
    if (correct) {
        state.textContent = "¡Correcto!";
        state.style.color = "green";
        continueBtn.style.display = "inline-block";

        console.log("Enviando a Marcar_Completada:", idpreguntas);

        console.log(idpreguntas);
        fetch("Marcar_Completada.php?idpreguntas=" + idpreguntas)
            .then(r => r.text())
            .then(data => console.log("Respuesta de Marcar_Completada:", data))
            .catch(err => console.error("Error en fetch:", err));
    } else {
        state.textContent = "Incorrecto, intenta de nuevo.";
        state.style.color = "red";
    }
}
</script>
