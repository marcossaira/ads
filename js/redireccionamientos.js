function irAInicio(login) {
        // Redirige a la URL de getUsuario.php con el parámetro login
        window.location.href = `../securityModule/getRedireccionar.php?login=${login}`;
    }

function goBackTecnicoModule() {
        window.location.href = '../tecnicoModule/indexEquipos.php';
    }

function irAFormFichaTecnica(idEq) {
        // Redirige a la URL de getRedireccionarTecnico.php con el parámetro idEq
        if (idEq) {
            window.location.href = `../tecnicoModule/getRedireccionarTecnico.php?idEq=${idEq}`;
        } else {
            console.error('El id del Equipo no es valido');
        }
    }

function cerrarSesionYRedirigir() {
        // Realiza una solicitud AJAX para cerrar la sesión
        var xhr = new XMLHttpRequest();
        xhr.open('GET', `../securityModule/logout.php`, true);
        xhr.onload = function () {
            // Después de cerrar sesión, redirige al usuario a la página de inicio
            window.location.href = `../index.php`;
        };
        xhr.send();
    }
  