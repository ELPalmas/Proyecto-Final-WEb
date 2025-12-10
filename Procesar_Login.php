<?php
session_start();
require_once("Database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $_SESSION['error'] = "Todos los campos son obligatorios!";
    header("Location: Login.php");
    exit;
  }
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Todos los campos son obligatorios.!";
    header("Location: Login.php");
    exit;
  }
  try {
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION["idusuario"] = $user['idusuarios'];
      $_SESSION["username"] = $user["username"];
      header("Location: Home.php");
      exit;
    } else {

      $_SESSION['error'] = "Todos los campos son obligatorios.!";
      header("Location: Login.php");
      exit;
    }
    die($user["password"]);
    exit;
  } catch (Exception $e) {

    die("Ocurrió un error " . $e->getMessage());
    exit;
  }
} else {
  header("Location: Login.php");
  exit;
}