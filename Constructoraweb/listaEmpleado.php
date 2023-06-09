<?php
include_once 'conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConexion();

function mostrarEmpleado(){

    global $conn;
    $query = "SELECT e.NOMBRE_COMPLETO, e.SALARIO_INTEGRAL, e.FECHA_INGRESO, e.FECHA_VIGENCIA, eps.DESCRIPCION_EPS, arl.DESCRIPCION_ARL, pension.DESCRIPCION_PENSION, cargo.DESCRIPCION_CARGO, tipoContrato.DESCRIPCION_TIPO_CONTRATO, cjCompensacion.DESCRIPCION_CJ_COMPENSACION
          FROM EMPLEADO e
          INNER JOIN EPS eps ON e.ID_EPS = eps.ID_EPS
          INNER JOIN ARL arl ON e.ID_ARL = arl.ID_ARL
          INNER JOIN PENSION pension ON e.ID_PENSION = pension.ID_PENSION
          INNER JOIN CARGO cargo ON e.ID_CARGO = cargo.ID_CARGO
          INNER JOIN TIPO_CONTRATO tipoContrato ON e.ID_TIPO_CONTRATO = tipoContrato.ID_TIPO_CONTRATO
          INNER JOIN CJ_COMPENSACION cjCompensacion ON e.ID_CJ_COMPENSACION = cjCompensacion.ID_CJ_COMPENSACION
          WHERE e.ESTADO = 'A'";

        $result = $conn->query($query);

        if ($result && $result->rowCount() > 0) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>";
                echo "<button id='modify-fila' style='border: none; background-color: transparent;' onclick='modificarFormularioEmpleado()'><i class='bx bxs-edit-alt'></i></button>";
                echo "<button id='modify-fila' style='border: none; background-color: transparent;' onclick='eliminarFormularioEmpleado()'><i class='bx bxs-trash'></i></button>";
                echo "</td>";
                echo "<td>" . '<p>' . $row['NOMBRE_COMPLETO'] .'</p>' . "</td>";
                echo "<td>" . '<p>' .($row['SALARIO_INTEGRAL'] == 'S' ? 'SI' : 'NO') .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['FECHA_INGRESO'] .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['FECHA_VIGENCIA'] .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_EPS'] .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_ARL'] .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_PENSION'].'</p>' . "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_CARGO'].'</p>' . "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_TPC'] .'</p>'. "</td>";
                echo "<td>" . '<p>' .$row['DESCRIPCION_CJ_COMPENSACION'].'</p>' . "</td>";
                echo "</tr>";
            }
        } else {
            echo '<tr>';
            echo '<td colspan="1">No se encontraron registros de cajas de compensación</td>';
            echo '</tr>';
        }
}

mostrarEmpleado();
$conn=null;
?>