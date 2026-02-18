<?php
// result.php - Guardar y mostrar resultados
session_start();
require 'config/db.php';

// Si no hay datos de juego, no deberías estar aquí.
if (!isset($_SESSION['game']) || !isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$game = $_SESSION['game'];
$final_score = $game['score'];
$total = $game['total'];
$user_id = $_SESSION['user_id'];

// 1. GUARDAR EN BASE DE DATOS
// Solo guardamos si llegamos al final (index == total)
if ($game['current_index'] >= $total) {
    try {
        $stmt = $pdo->prepare("INSERT INTO games (user_id, score, total_questions) VALUES (:uid, :score, :total)");
        $stmt->execute([
            'uid' => $user_id,
            'score' => $final_score,
            'total' => $total
        ]);
        // Si llega aquí, se guardó.
    } catch (PDOException $e) {
        // ERROR SILENCIOSO EN PRODUCCIÓN
        // 1. Guardamos el error real en el log del servidor (invisible al usuario)
        error_log("Error guardando partida: " . $e->getMessage());
        
        // 2. Opcional: Podríamos mostrar un mensaje amigable, pero como el juego ya acabó,
        // a veces es mejor dejarlo pasar o mostrar una alerta suave.
        // Por ahora, matamos el script con elegancia:
        die("Hubo un error al guardar tu puntuación. Por favor, contacta al administrador."); 
    }
} else {
    // Si entra aquí, es que la lógica de play.php no sumó bien el índice
    die("❌ ERROR LÓGICO: El juego no ha terminado oficialmente. Índice: " . $game['current_index']);
}

// 2. LIMPIAR SESIÓN DEL JUEGO (Para poder jugar de nuevo)
unset($_SESSION['game']);

?>

<?php include 'templates/header.php'; ?>

<div class="result-container container" style="text-align: center; padding: 50px 0;">
    <h1>¡Juego Terminado!</h1>
    
    <div class="score-card" style="margin: 30px auto; padding: 40px; background: white; border-radius: 10px; max-width: 400px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <p style="font-size: 1.2rem; color: #666;">Tu puntuación final:</p>
        <div style="font-size: 4rem; font-weight: bold; color: var(--primary); margin: 10px 0;">
            <?php echo $final_score; ?> / <?php echo $total; ?>
        </div>
        
        <?php if ($final_score == $total): ?>
            <p style="color: var(--success); font-weight: bold;">¡PERFECTO! Eres un genio. 🏆</p>
        <?php elseif ($final_score > ($total / 2)): ?>
            <p style="color: var(--primary);">¡Bien hecho! 👍</p>
        <?php else: ?>
            <p style="color: var(--danger);">Necesitas practicar más. 📚</p>
        <?php endif; ?>
    </div>

    <div class="actions" style="margin-top: 30px;">
        <a href="play.php" class="btn-main">Jugar de Nuevo</a>
        <br><br>
        <a href="dashboard.php" style="color: var(--dark);">Volver al Perfil</a>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
