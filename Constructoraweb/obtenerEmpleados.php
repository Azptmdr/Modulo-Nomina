<?php
include_once 'conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConexion();

function obtenerEmpleados()
{
    global $conn;
    $sql = "SELECT NOMBRE_COMPLETO FROM EMPLEADO";

    $result = $conn->query($sql);

    if ($result && $result->rowCount() > 0) {
        foreach ($result as $row) {
            echo '<option value="' . $row['NOMBRE_COMPLETO'] . '">' . $row['NOMBRE_COMPLETO'] . '</option>';
        }
    } else {
        echo '<option value="">No se encontraron registros de dependencias</option>';
    }
}

obtenerEmpleados();

$conn = null;
?>