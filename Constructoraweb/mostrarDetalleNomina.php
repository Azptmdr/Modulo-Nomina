<?php
include_once 'conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConexion();

function mostrarDetalleNomina()
{
    global $conn;
    $query = "SELECT * FROM historial_nomina";

    $result = $conn->query($query);

    if ($result && $result->rowCount() > 0) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td><p>" . $row['ID_EMPLEADO'] . "</p></td>";
            echo "<td><p>" . $row['NOMBRE_COMPLETO'] . "</p></td>";
            echo "<td><p>" . $row['TRANSPORTE'] . "</p></td>";
            echo "<td><p>$ " . number_format($row['NOVEDADES_REMUNERADAS'], 0, ',', '.') . "</p></td>";
            echo "<td><p>$ " . number_format($row['SALDO_TOTAL'], 0, ',', '.') . "</p></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No se encontraron registros en el detalle de nómina.</td></tr>";
    }
}
mostrarDetalleNomina();
$conn = null;
?>