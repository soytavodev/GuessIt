<?php
// Iniciamos la sesión en el header para no olvidarnos nunca.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🧠</text></svg>">
    
    <title>GuessIt - Trivia Challenge</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="index.php" class="logo">GuessIt 🧠</a>
        <nav>
            <ul>
                <li><a href="ranking.php">🏆 Ranking</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li>Hola, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></li>
                    <li><a href="dashboard.php">Mi Perfil</a></li>
                    <li><a href="logout.php" class="btn-logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Ingresar</a></li>
                    <li><a href="register.php" class="btn-main">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
