<?php
// register.php - Lógica y Vista de Registro

// 1. Requerimos la conexión a la base de datos
require 'config/db.php';

$message = ''; // Variable para guardar mensajes de éxito o error

// 2. Procesar el formulario SOLO si se envió (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizamos y recuperamos los datos
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validaciones básicas (Backend es la última línea de defensa)
    if (empty($username) || empty($email) || empty($password)) {
        $message = '<div class="alert alert-error">Por favor completa todos los campos.</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Validar formato de email real
        $message = '<div class="alert alert-error">El correo electrónico no es válido.</div>';
    } elseif ($password !== $confirm_password) {
        $message = '<div class="alert alert-error">Las contraseñas no coinciden.</div>';
    } else {
        // Si todo está bien, intentamos insertar en la BD
        
        // Verificar si el usuario o email ya existen
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email OR username = :username");
        $stmt->execute(['email' => $email, 'username' => $username]);
        
        if ($stmt->rowCount() > 0) {
            $message = '<div class="alert alert-error">El usuario o correo ya están registrados.</div>';
        } else {
            // HASHING: La parte más importante de la seguridad
            // Usamos PASSWORD_DEFAULT que actualmente usa Bcrypt (muy seguro)
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            try {
                // Preparamos la consulta INSERT (Prevención de Inyección SQL)
                $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :pass)";
                $stmt = $pdo->prepare($sql);
                
                // Ejecutamos con los datos limpios
                if ($stmt->execute(['username' => $username, 'email' => $email, 'pass' => $password_hash])) {
                    $message = '<div class="alert alert-success">¡Registro exitoso! <a href="login.php" style="color: white; text-decoration: underline;">Inicia sesión aquí</a>.</div>';
                }
            } catch (PDOException $e) {
                $message = '<div class="alert alert-error">Error al registrar: ' . $e->getMessage() . '</div>';
            }
        }
    }
}
?>

<?php include 'templates/header.php'; ?>

<div class="auth-container" style="max-width: 400px; margin: 0 auto;">
    <h2>Crear Cuenta</h2>
    <p>Únete para guardar tus puntuaciones.</p>
    <br>

    <?php echo $message; ?>

    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>

        <button type="submit" class="btn-main" style="width: 100%;">Registrarse</button>
    </form>
    
    <p style="margin-top: 15px; text-align: center;">
        ¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a>
    </p>
</div>

<?php include 'templates/footer.php'; ?>
