<?php
session_start();
require_once("database.php");
if($_SERVER["REQUEST_METHOD"] === 'POST')
{
    if(!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['passwordR']))
    {
        $_SESSION['error'] = "Todos los campos son obligatorios";
        header("Location: Register.php");
        exit;
    }

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordR = trim($_POST['passwordR']);

    if(empty($username) || empty($email) || empty($password) || empty($passwordR))
    {
        $_SESSION['error'] = "Todos los campos son obligatorios";
        header("Location: Register.php");
        exit;
    }
    else if($password !== $passwordR)
    {
        $_SESSION['error'] = "Las contraseñas no coinciden";
        header("Location: Register.php");
        exit;
    }
    try
    {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios(username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $hashed]);

        header('Location: Index.php');
        exit;
    }
    catch (Exception $e)
    {
        die("Ocurrio un error al registrar los datos" . $e->getMessage());
    }
}
else
{
    header("Location: Register.php");
    exit;
}