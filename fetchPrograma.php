<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = "http://localhost:11434/api/generate";

$input = json_decode(file_get_contents("php://input"), true);

$idioma = $input['idioma'] ?? 'Inglés';
$dificultad = $input['dificultad'] ?? 'Principiante';
$proposito = $input['proposito'] ?? 'Negocios';
$dia = $input['dia'] ?? 1;

$data = [
    "model" => "qwen-json:latest",
    "prompt" => "Responde SOLO con JSON válido. No cortes cadenas largas. Usa siempre 'clave', 'valor', 'correcta'.
                Genera SOLO UN JSON VALIDO con el contenido del dia $dia de un curso de $idioma con dificultad $dificultad
                y temática de $proposito.
                Incluye exactamente 1 pregunta de opción múltiple con 3 respuestas posibles (A, B, C), indicando la correcta.
                Devuelve el formato JSON con un objeto 'curso'.
                Genera un curso en formato JSON con la siguiente estructura fija:
                Un objeto con las claves 'dia', 'titulo', y 'preguntas'.
                'dia' debe ser un número entero.
                'titulo' debe ser un string con el tema del día.
                'preguntas' debe ser un array con exactamente 3 objetos.
                Cada objeto de 'preguntas' debe tener 'texto' y 'opciones'.
                'opciones' debe ser un array con exactamente 3 objetos.
                Cada opción debe tener 'clave' (A, B, C), 'valor' (texto de la respuesta), y 'correcta' (true/false).
                En cada pregunta, exactamente una opción debe tener 'correcta': true. Devuelve únicamente el JSON válido, sin explicaciones ni texto adicional.
                Devuelve únicamente JSON válido. 
                No uses comillas simples. 
                Cada pregunta debe tener exactamente 3 opciones con esta estructura:
                { 'clave': 'A', 'valor': 'texto', 'correcta': true/false }
                No uses claves sueltas como 'B' o 'C'. 
                No incluyas texto fuera del JSON.",

    "format" => "json",
    "stream" => false
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_TIMEOUT, 300);

$result = curl_exec($ch);

//$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

/*if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
} elseif ($httpCode >= 400) {
    http_response_code($httpCode);
    echo json_encode(["error" => "Ollama devolvió código $httpCode", "respuesta" => $result]);
} else {
    7header("Content-Type: application/json");
    echo $result;
    header("Content-Type: application/json");
    $decoded = json_decode($result, true);

    $response = $decoded['response'] ?? '';
    $response = trim($response);

    echo json_encode([
        "model" => $decoded['model'] ?? 'unknown',
        "response" => $response
    ]);
}
*/

if(!$result)
{
    http_response_code(500);
    echo json_encode(["error" => "No se recibio respuesta de Ollama"]);
    exit;
}

$decoded = json_decode($result, true);
if(!$decoded || !isset($decoded['response']))
{
    http_response_code(500);
    echo json_encode(["error" => "Respuesta invalida de Ollama", "raw" => $result]);
    exit;
}
$response = trim($decoded['response']);
echo json_encode([
    "model" => $decoded['model'] ?? 'unknown',
    "dia" => $dia,
    "response" => $response
]);

curl_close($ch);
?>
