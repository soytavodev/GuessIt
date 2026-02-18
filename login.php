<?php
// login.php - Autenticación de usuarios

// Iniciamos sesión AL PRINCIPIO para poder redirigir sin errores
session_start();

// Si ya está logueado, lo mandamos al dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

require 'config/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = '<div class="alert alert-error">Por favor ingresa tus datos.</div>';
    } else {
        // Buscamos al usuario por su email
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        // Verificamos si existe el usuario Y si la contraseña coincide con el hash
        if ($user && password_verify($password, $user['password'])) {
            // ¡ÉXITO! Creamos la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirigimos al área privada (Dashboard)
            header("Location: dashboard.php");
            exit;
        } else {
            // ERROR GENÉRICO (Seguridad)
            $message = '<div class="alert alert-error">Credenciales incorrectas. Intenta de nuevo.</div>';
        }
    }
}
?>

<?php include 'templates/header.php'; ?>

<div class="auth-container" style="max-width: 400px; margin: 0 auto;">
    <h2>Iniciar Sesión</h2>
    <p>¡Bienvenido de vuelta, retador!</p>
    <br>

    <?php echo $message; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn-main" style="width: 100%;">Entrar</button>
    </form>
    
    <p style="margin-top: 15px; text-align: center;">
        ¿No tienes cuenta? <a href="register.php">Regístrate gratis</a>
    </p>
</div>

<?php include 'templates/footer.php'; ?>
