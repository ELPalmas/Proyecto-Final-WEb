<?php
require_once("Database.php");
session_start();

if (!isset($_SESSION['idusuario'])) {
    header("Location: Index.php");
    exit;
}

$idCurso = $_SESSION['curso_id'] ?? null;
if (isset($_GET['curso'])) {
    $_SESSION['curso_id'] = $_GET['curso'];
    header("Location: Course_View.php");
    exit;
}

if (!$idCurso) {
    echo "<p>No se seleccionó ningún curso.</p>";
    exit;
}

$modo = $_GET['modo'] ?? 'lista';

$stmtDias = $pdo->prepare("SELECT * FROM dias WHERE idcurso = ?");
$stmtDias->execute([$idCurso]);
$dias = $stmtDias->fetchAll(PDO::FETCH_ASSOC);

$iddia = $_GET['dia'] ?? null;


if ($modo === 'detalle') {
    if (!$iddia) {
        $stmtDiaDefault = $pdo->prepare("SELECT * FROM dias WHERE idcurso = ? ORDER BY numdia ASC LIMIT 1");
        $stmtDiaDefault->execute([$idCurso]);
        $diaDefault = $stmtDiaDefault->fetch(PDO::FETCH_ASSOC);
        if (!$diaDefault) {
            echo "<p>No hay días registrados para este curso.</p>";
            exit;
        }
        $iddia = $diaDefault['iddia'];
    }

    $stmtDia = $pdo->prepare("SELECT * FROM dias WHERE iddia = ?");
    $stmtDia->execute([$iddia]);
    $dia = $stmtDia->fetch(PDO::FETCH_ASSOC);

    $stmtPreguntas = $pdo->prepare("SELECT * FROM preguntas WHERE iddia = ?");
    $stmtPreguntas->execute([$iddia]);
    $preguntas = $stmtPreguntas->fetchAll(PDO::FETCH_ASSOC);

    $total = count($preguntas);
    $completadas = count(array_filter($preguntas, fn($p) => (bool)$p['completada']));
    $progresoDia = $total > 0 ? intval(($completadas / $total) * 100) : 0;

    echo '<div class="detalles_de_tarea">';
    echo '  <div class="tarea_dia">';
    echo '      <h1>Día '.htmlspecialchars($dia['numdia']).'</h1>';
    echo '      <div class="day_progress_bar">';
    echo '          <progress class="task_progress" value="'.$progresoDia.'" max="100"></progress>';
    echo '      </div>';
    echo '  </div>';
    echo '  <div class="tema_actividad">';
    echo '      <h2>'.htmlspecialchars($dia['titulo']).'</h2>';
    if($progresoDia === 100) {
        echo '      <h2>Completada</h2>';
    }
    echo '  </div>';
    echo '  <div class="actividades"><h2>Actividades</h2></div>';
    echo '  <div class="contenido_actividades">';

    $numPregunta = 1;
    foreach ($preguntas as $pregunta) {
        $isDone = (bool)$pregunta['completada'];
        $estado = $isDone ? "Completado!" : "Pendiente";
        $valor = $isDone ? 100 : 0;

        $_SESSION['idpreguntas'] = $pregunta['idpreguntas'];
        echo '<div class="tarjetas_actividades" onclick="location.href=\'Question_View.php\'">';
        //echo '<div class="tarjetas_actividades" onclick="location.href=\'Question_View.php?idpreguntas='.$pregunta['idpreguntas'].'\'">';
        echo '  <div class="tarjeta_actividades_superior">';
        echo '      <h3>Pregunta '.$numPregunta.'</h3>';
        echo $isDone 
            ? '      <button class="completed_task"><i class="fa-solid fa-check"></i></button>'
            : '      <button class="imcomplete_task"><i class="fa-solid fa-xmark"></i></button>';
        echo '  </div>';
        echo '  <div class="tarjeta_actividades_inferior">';
        echo '      <h3>'.$estado.'</h3>';
        echo '      <progress class="task_progress" value="'.$valor.'" max="100"></progress>';
        echo '  </div>';
        echo '</div>';

        $numPregunta++;
    }

    echo '  </div>';
    echo '</div>';
}


elseif ($modo === 'lista') {
    echo '<div class="tareas_pendientes">';
    foreach ($dias as $d) {
        $stmtP = $pdo->prepare("SELECT completada FROM preguntas WHERE iddia = ?");
        $stmtP->execute([$d['iddia']]);
        $ps = $stmtP->fetchAll(PDO::FETCH_ASSOC);
        $t = count($ps);
        $c = count(array_filter($ps, fn($p) => (bool)$p['completada']));
        $prog = $t > 0 ? intval(($c / $t) * 100) : 0;

        echo '<div class="tarea_individual" onclick="location.href=\'Course_View.php?dia='.$d['iddia'].'\'">';
        echo '<h1>Día '.htmlspecialchars($d['numdia']).' - '.htmlspecialchars($d['titulo']).'</h1>';
        echo '<div class="day_progress_bar">';
        echo '<progress class="task_progress" value="'.$prog.'" max="100"></progress>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}


elseif ($modo === 'movil') {
    foreach ($dias as $d) {
        $stmtPreguntasDia = $pdo->prepare("SELECT * FROM preguntas WHERE iddia = ?");
        $stmtPreguntasDia->execute([$d['iddia']]);
        $pregsDia = $stmtPreguntasDia->fetchAll(PDO::FETCH_ASSOC);

        $totalDia = count($pregsDia);
        $completadasDia = count(array_filter($pregsDia, fn($p) => (bool)$p['completada']));
        $progresoDia = $totalDia > 0 ? intval(($completadasDia / $totalDia) * 100) : 0;

        $firstPregunta = $pregsDia[0];
        echo '<div class="course_card" onclick="location.href=\'Question_View.php?idpreguntas='.$firstPregunta['idpreguntas'].'\'">';
        echo '    <p>Día '.htmlspecialchars($d['numdia']).'</p>';
        echo '    <h1>'.htmlspecialchars($d['titulo']).'</h1>';
        echo '    <h3>Actividades</h3>';
        echo '    <div class="course_tasks">';
        foreach ($pregsDia as $preg) {
            if ($preg['completada']) {
                echo '        <button class="completed_task"><i class="fa-solid fa-check"></i></button>';
            } else {
                echo '        <button class="imcomplete_task"><i class="fa-solid fa-xmark"></i></button>';
            }
        }
        echo '    </div>';
        echo '    <div class="day_progress_bar">';
        echo '        <progress class="task_progress" value="'.$progresoDia.'" max="100"></progress>';
        echo '    </div>';
        echo '</div>';
    }
}