<?php
// ranking.php - Salón de la Fama
session_start();
require 'config/db.php';

// CONSULTA SQL AVANZADA:
// 1. JOIN: Unimos usuarios y partidas.
// 2. GROUP BY: Agrupamos por usuario para no repetir nombres.
// 3. MAX(score): De todas las partidas de ese usuario, nos quedamos con la mejor.
// 4. ORDER BY: Primero por puntaje (desc), luego por fecha (el que lo logró antes gana).

$sql = "
    SELECT 
        u.username, 
        MAX(g.score) as best_score, 
        COUNT(g.id) as total_games,
        MAX(g.played_at) as last_played
    FROM games g
    JOIN users u ON g.user_id = u.id
    GROUP BY u.id
    ORDER BY best_score DESC, total_games DESC
    LIMIT 10
";

try {
    $stmt = $pdo->query($sql);
    $leaders = $stmt->fetchAll();
} catch (PDOException $e) {
    // En desarrollo mostramos error, en producción NUNCA.
    // Como aún no hacemos la FASE C (Seguridad), lo dejamos así por hoy.
    die("Error al cargar ranking: " . $e->getMessage());
}
?>

<?php include 'templates/header.php'; ?>

<div class="container" style="max-width: 800px; padding: 40px 20px;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h1>🏆 Salón de la Fama 🏆</h1>
        <p>Los 10 mejores cerebros de GuessIt</p>
    </div>

    <div class="ranking-wrapper">
        <table class="ranking-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jugador</th>
                    <th>Mejor Puntuación</th>
                    <th>Partidas Jugadas</th>
                    <th>Última Actividad</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($leaders) > 0): ?>
                    <?php foreach ($leaders as $index => $player): ?>
                        <tr class="<?php echo (isset($_SESSION['username']) && $_SESSION['username'] === $player['username']) ? 'is-me' : ''; ?>">
                            <td>
                                <?php 
                                    // Iconos para el top 3
                                    if ($index === 0) echo '🥇';
                                    elseif ($index === 1) echo '🥈';
                                    elseif ($index === 2) echo '🥉';
                                    else echo $index + 1;
                                ?>
                            </td>
                            <td class="username-cell">
                                <?php echo htmlspecialchars($player['username']); ?>
                                <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $player['username']): ?>
                                    <span class="badge-me">(Tú)</span>
                                <?php endif; ?>
                            </td>
                            <td style="font-weight: bold; color: var(--primary);">
                                <?php echo $player['best_score']; ?> / 10
                            </td>
                            <td><?php echo $player['total_games']; ?></td>
                            <td style="font-size: 0.85rem; color: #888;">
                                <?php echo date('d/m/Y', strtotime($player['last_played'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 20px;">
                            Aún no hay registros. ¡Sé el primero en jugar!
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="play.php" class="btn-main">¡Intenta superarlos!</a>
        <?php else: ?>
            <a href="register.php" class="btn-main">Regístrate para competir</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
