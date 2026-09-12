<?php
$servidor = "localhost";
$baseDatos = "restaurante(alltec)";
$usuario = "root";
$contraseña = "";


try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contraseña);
} catch (PDOException $error) {
    echo "Error de conexión: " . $error->getMessage();
}
?>