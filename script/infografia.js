function abre_modal_ayuda() {
  $("#ventana_de_ayuda").modal('show');

  pasoActual = 1;
  document.getElementById("paso1").style.display = "block";
  document.getElementById("paso2").style.display = "none";
  document.getElementById("paso3").style.display = "none";

  document.getElementById("btnSiguiente").style.display = "inline-block";
  document.getElementById("btnAnterior").style.display = "none";
}

let pasoActual = 1;
const totalPasos = 3;

function cambiarPaso(direccion) {
  document.getElementById(`paso${pasoActual}`).style.display = "none";

  // Cambia el paso
  pasoActual += direccion;

  // Asegura que esté dentro del rango válido
  if (pasoActual < 1) pasoActual = 1;
  if (pasoActual > totalPasos) pasoActual = totalPasos;

  document.getElementById(`paso${pasoActual}`).style.display = "block";

  // Actualiza botones
  const btnAnterior = document.getElementById("btnAnterior");
  const btnSiguiente = document.getElementById("btnSiguiente");

  // Mostrar u ocultar botón "Atrás"
  if (pasoActual === 1) {
    btnAnterior.style.display = "none";
  } else {
    btnAnterior.style.display = "inline-block";
  }

  // Mostrar u ocultar botón "Siguiente"
  if (pasoActual === totalPasos) {
    btnSiguiente.style.display = "none";
  } else {
    btnSiguiente.style.display = "inline-block";
    btnSiguiente.textContent = "Siguiente";
  }
}
