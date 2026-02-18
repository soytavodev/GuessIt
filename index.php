<?php
// index.php - Landing Page
require 'config/db.php';
// Nota: session_start() se llama dentro de header.php, así que no es necesario aquí arriba si solo vamos a mostrar vistas.
?>

<?php include 'templates/header.php'; ?>

<section class="hero" style="text-align: center; padding: 60px 20px;">
    <h1 style="font-size: 3rem; margin-bottom: 20px;">Pon a prueba tu cerebro 🧠</h1>
    <p style="font-size: 1.2rem; margin-bottom: 40px; color: #666;">
        Demuestra cuánto sabes de cultura general. Compite contigo mismo y mejora tus estadísticas.
    </p>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="play.php" class="btn-main" style="font-size: 1.2rem; padding: 12px 24px;">Jugar Partida Rápida</a>
    <?php else: ?>
        <div class="cta-buttons">
            <a href="register.php" class="btn-main" style="margin-right: 10px;">Crear Cuenta</a>
            <a href="login.php" style="color: var(--primary); font-weight: bold;">Ya tengo cuenta</a>
        </div>
    <?php endif; ?>
</section>

<?php include 'templates/footer.php'; ?>
