<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("Database.php");

if (!isset($_SESSION['idusuario'])) {
    http_response_code(401);
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

$userId = $_SESSION['idusuario'];

$input = json_decode(file_get_contents("php://input"), true);
file_put_contents("debug.log", "INPUT:\n" . print_r($input, true), FILE_APPEND);

if (!$input) {
    http_response_code(400);
    echo json_encode(["error" => "No se recibió JSON válido"]);
    exit;
}

$curso = $input['curso'] ?? null;
$idioma = $input['idioma'] ?? 'Inglés';
$dificultad = $input['dificultad'] ?? 'Principiante';
$proposito = $input['proposito'] ?? 'Negocios';

if (!$curso || !is_array($curso)) {
    http_response_code(400);
    echo json_encode(["error" => "Estructura de curso inválida", "curso recibido:" => $curso]);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO cursos (idusuarios, idioma, dificultad, proposito) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userId, $idioma, $dificultad, $proposito]);
    $idCurso = $pdo->lastInsertId();
} catch (PDOException $e) {
    file_put_contents("debug.log", "Error insertando curso: " . $e->getMessage() . "\n", FILE_APPEND);
    http_response_code(500);
    echo json_encode(["error" => "Error insertando curso"]);
    exit;
}

foreach ($curso as $diaWrapper) {

    if (!isset($diaWrapper['curso'])) {
        file_put_contents("debug.log", "DiaWrapper inválido: " . print_r($diaWrapper, true), FILE_APPEND);
        continue;
    }

    $diaData = $diaWrapper['curso'];

    if (!isset($diaData['dia']) || !isset($diaData['titulo'])) {
        file_put_contents("debug.log", "Dia incompleto: " . print_r($diaData, true), FILE_APPEND);
        continue;
    }

    try {
        $titulo = $diaData['titulo'] ?? $diaData['título'] ?? 'Sin título';
        $stmtDia = $pdo->prepare("INSERT INTO dias (idcurso, numdia, titulo) VALUES (?, ?, ?)");
        $stmtDia->execute([$idCurso, $diaData['dia'], $titulo]);
        $idDia = $pdo->lastInsertId();
    } catch (PDOException $e) {
        file_put_contents("debug.log", "Error insertando día: " . $e->getMessage() . "\n", FILE_APPEND);
        continue;
    }

    if (!isset($diaData['preguntas']) || !is_array($diaData['preguntas'])) {
        file_put_contents("debug.log", "Preguntas inválidas: " . print_r($diaData, true), FILE_APPEND);
        continue;
    }

    $stmtPregunta = $pdo->prepare("INSERT INTO preguntas (iddia, texto, completada) VALUES (?, ?, ?)");
    $stmtRespuesta = $pdo->prepare("INSERT INTO respuestas (idpregunta, inciso, valor, correcta) VALUES (?, ?, ?, ?)");

    foreach ($diaData['preguntas'] as $preguntaObj) {
        if (!isset($preguntaObj['texto']) || !isset($preguntaObj['opciones']) || !is_array($preguntaObj['opciones'])) {
            file_put_contents("debug.log", "Pregunta inválida: " . print_r($preguntaObj, true), FILE_APPEND);
            continue;
        }

        try {
            $stmtPregunta->execute([$idDia, $preguntaObj['texto'], 0]);
            $idPregunta = $pdo->lastInsertId();
        } catch (PDOException $e) {
            file_put_contents("debug.log", "Error insertando pregunta: " . $e->getMessage() . "\n", FILE_APPEND);
            continue;
        }

        foreach ($preguntaObj['opciones'] as $opcion) {
            $clave = $opcion['clave'] ?? '';
            $valor = $opcion['valor'] ?? '';
            $correcta = !empty($opcion['correcta']) ? 1 : 0;

            if (!$clave || !$valor) {
                file_put_contents("debug.log", "Opción inválida: " . print_r($opcion, true), FILE_APPEND);
                continue;
            }

            try {
                $stmtRespuesta->execute([$idPregunta, $clave, $valor, $correcta]);
            } catch (PDOException $e) {
                file_put_contents("debug.log", "Error insertando respuesta: " . $e->getMessage() . "\n", FILE_APPEND);
                continue;
            }
        }
    }
}

echo json_encode(["success" => true, "curso_id" => $idCurso]);

file_put_contents("debug.log", "Insertando pregunta: $idDia, {$preguntaObj['texto']}\n", FILE_APPEND);

?>
