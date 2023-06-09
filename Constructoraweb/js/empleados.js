//Empleado
function mostrarFormularioEmpleado() {
    const formularioEmpleado = document.getElementById("formularioEmpleado");
    formularioEmpleado.style.display = "block";
  }
  function modificarFormularioEmpleado() {
    const modificarEmpleado = document.getElementById("modificarEmpleado");
    modificarEmpleado.style.display = "block";
  }
  function eliminarFormularioEmpleado() {
    const eliminarEmpleado = document.getElementById("eliminarEmpleado");
    eliminarEmpleado.style.display = "block";
  }

function cerrarFormularioEmpleado() {
    formularioBackgroundEmpleado.style.display = "none";
  }
  function cerrarModificarEmpleado() {
    modificarEmpleadoBackground.style.display = "none";
  }
  function cerrarEliminarEmpleado() {
    eliminarEmpleadoBackground.style.display = "none";
  }

const formularioBackgroundEmpleado = document.getElementById("formularioEmpleado"),
	formularioContainerEmpleado = document.getElementById("formularioEmpleadoContainer"),
	modificarEmpleadoBackground = document.getElementById("modificarEmpleado"),
	modificarEmpleadoContainer = document.getElementById("modificarEmpleadoContainer"),
	eliminarEmpleadoBackground = document.getElementById("eliminarEmpleado"),
	eliminarEmpleadoContainer = document.getElementById("eliminarEmpleadoContainer"),
	closeButtonEliminarEmpleado = document.getElementById("close-button-eliminar-empleado"),
	closeButtonModificarEmpleado = document.getElementById("close-button-modificar-empleado"),
	closeButtonEmpleado = document.getElementById("close-button-empleado");

  // Event listener para cerrar el formulario del empleado al hacer clic en el botón de cierre
  closeButtonEmpleado.addEventListener("click", function () {
    cerrarFormularioEmpleado();
	document.getElementById("formularioRegistroEmpleado").reset();
  });
  closeButtonModificarEmpleado.addEventListener("click", function () {
    cerrarModificarEmpleado();
	document.getElementById("formularioModificarEmpleado").reset();
  });
  closeButtonEliminarEmpleado.addEventListener("click", function(){
	cerrarEliminarEmpleado();
	document.getElementById("formularioEliminarEmpleado").reset();
  })

  // Event listener para cerrar el formulario al hacer clic fuera del formulario-container
  modificarEmpleadoBackground.addEventListener("click", function (event) {
    if (event.target === modificarEmpleadoBackground) {
		cerrarModificarEmpleado();
    }
  });
  eliminarEmpleadoBackground.addEventListener("click", function (event) {
    if (event.target === eliminarEmpleadoBackground) {
		cerrarEliminarEmpleado();
    }
  });
  formularioBackgroundEmpleado.addEventListener("click", function (event) {
    if (event.target === formularioBackgroundEmpleado) {
      cerrarFormularioEmpleado();
    }
  });