<?php
include_once 'conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConexion();

function mostrarHistorialNomina()
{
    global $conn;
    $query = "SELECT * FROM historial_nomina";

    $result = $conn->query($query);

    if ($result && $result->rowCount() > 0) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td><p>" . $row['ID_EMPLEADO'] . "</p></td>";
            echo "<td><p>" . $row['nombre_completo'] . "</p></td>";
            echo "<td><p>$ " . number_format($row['SUELDO_DEVENGADO'], 0, ',', '.') . "</p></td>";
            echo "<td><p>" . $row['fecha_nomina'] . "</p></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No se encontraron registros en el historial de nómina.</td></tr>";
    }
}

mostrarHistorialNomina();
$conn = null;
?>
