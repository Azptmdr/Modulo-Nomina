<?php
include_once 'conexion.php';

// Obtén los valores del formulario
$primerNombre = $_POST['primerNombre'];
$segundoNombre = $_POST['segundoNombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$salarioIntegral = $_POST['salarioIntegral'];
$fechaIngreso = $_POST['fechaIngreso'];
$fechaVigencia = $_POST['fechaVigencia'];
$eps = $_POST['eps'];
$arl = $_POST['arl'];
$pension = $_POST['pension'];
$cargo = $_POST['cargo'];
$tipoContrato = $_POST['tipoContrato'];
$cajaCompensacion = $_POST['cajaCompensacion'];

// Establece la conexión a la base de datos
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Llama al procedimiento almacenado
$sql = "CALL RegistrarEmpleado('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$salarioIntegral', '$fechaIngreso', '$fechaVigencia', $eps, $arl, $pension, $cargo, $tipoContrato, $cajaCompensacion)";
$result = $conn->query($sql);

if ($result === TRUE) {
    // Obtén el ID del empleado registrado
    $row = $result->fetch_assoc();
    $idEmpleado = $row['ID_EMPLEADO'];
    header("Location: nomina.php");
    exit();
} else {
    echo "Error al registrar el empleado: ";
}

// Cierra la conexión
$conn = null;
?>
