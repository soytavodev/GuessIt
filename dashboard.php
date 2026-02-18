<?php
// dashboard.php - Área privada del usuario
// VERIFICACIÓN DE SEGURIDAD:
// Si no hay sesión, lo pateamos al login. NADIE entra aquí sin permiso.

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config/db.php';

// CONSULTA DE ESTADÍSTICAS REALES
$user_id = $_SESSION['user_id'];

// 1. Total de partidas
$stmt = $pdo->prepare("SELECT COUNT(*) FROM games WHERE user_id = :uid");
$stmt->execute(['uid' => $user_id]);
$total_games = $stmt->fetchColumn();

// 2. Mejor Puntuación
$stmt = $pdo->prepare("SELECT MAX(score) FROM games WHERE user_id = :uid");
$stmt->execute(['uid' => $user_id]);
$best_score = $stmt->fetchColumn();
// Si es null (no ha jugado), ponemos 0
$best_score = $best_score !== null ? $best_score : '-';

// 3. Puntuación media (opcional, para lucirte)
$stmt = $pdo->prepare("SELECT AVG(score) FROM games WHERE user_id = :uid");
$stmt->execute(['uid' => $user_id]);
$avg_score = number_format((float)$stmt->fetchColumn(), 1);

// Aquí cargaremos las estadísticas más tarde.
?>

<?php include 'templates/header.php'; ?>

<div class="dashboard-container">
    <h1>Hola, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>
    <p>Bienvenido a tu panel de control.</p>
    
    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px;">
        <div class="stat-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Partidas Jugadas</h3>
            <p style="font-size: 2rem; font-weight: bold; color: var(--primary);">
                <?php echo $total_games; ?>
            </p>
        </div>
        
        <div class="stat-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Mejor Puntuación</h3>
            <p style="font-size: 2rem; font-weight: bold; color: var(--success);">
                <?php echo $best_score; ?>
            </p>
        </div>

        <div class="stat-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <h3>Promedio</h3>
            <p style="font-size: 2rem; font-weight: bold; color: #e17055;">
                <?php echo isset($avg_score) ? $avg_score : '0.0'; ?>
            </p>
        </div>
    </div>

    <div style="margin-top: 40px; text-align: center;">
        <a href="play.php" class="btn-main" style="padding: 15px 30px; font-size: 1.2rem;">🎮 ¡JUGAR AHORA!</a>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
