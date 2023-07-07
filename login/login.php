<?php

// Verificar las credenciales de inicio de sesión
if ($_POST['nombre'] === 'usuario' && $_POST['contrasena'] === 'contraseña') {
    // Credenciales válidas, establecer el valor en el almacenamiento local
    echo '<script>window.localStorage.setItem("usuario", "' . $_POST['nombre'] . '"); window.location.href = "./index.html";</script>';
} else {
    // Credenciales inválidas, redirigir de nuevo al formulario de inicio de sesión
    echo '<script>alert("Nombre de usuario o contraseña incorrectos."); window.location.href = "login.html";</script>';
}

// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "Osc@r801223";
$dbname = "restaurante_coroso";
                                                   
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los valores enviados por el formulario
$user = $_POST['nombre'];
$pass = $_POST['contrasena'];

//contraseñas de prueba
$user = "Oscar8012";
$pass = "8956";

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE nombre = '$user' AND contrasena = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    echo "¡Restaurante COROSO le da la Bienvenida. Administrad@r , $user!";
} else {
    // Credenciales inválidas
    echo "Nombre de usuario o contraseña incorrectos.";
}

$conn->close();
?>
*/