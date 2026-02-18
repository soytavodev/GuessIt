<?php
// play.php - El motor del juego
session_start();
require 'config/db.php';

// 1. SEGURIDAD: Solo usuarios logueados juegan
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 2. INICIALIZACIÓN DEL JUEGO
// Si no existe la variable de sesión 'game', es que estamos empezando una partida nueva.
if (!isset($_SESSION['game'])) {
    // Seleccionamos 10 IDs de preguntas aleatorias
    // OJO: Solo traemos los IDs para no llenar la memoria de la sesión con textos
    $stmt = $pdo->query("SELECT id FROM questions ORDER BY RAND() LIMIT 10");
    $questions = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (count($questions) < 1) {
        die("Error: No hay suficientes preguntas en la base de datos. Ejecuta seeds.sql");
    }

    // Guardamos el estado inicial en la sesión
    $_SESSION['game'] = [
        'question_ids' => $questions, // Array de IDs [1, 5, 3...]
        'current_index' => 0,         // En qué número de pregunta vamos (0 a 9)
        'score' => 0,                 // Puntaje actual
        'total' => count($questions)
    ];
}

// Atajos para escribir menos
$game = &$_SESSION['game']; // Usamos referencia (&) para modificar directamente la sesión
$current_index = $game['current_index'];

// 3. PROCESAR RESPUESTA (SI EL USUARIO HIZO CLIC)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option_id'])) {
    $selected_option_id = $_POST['option_id'];
    
    // Verificamos en la BD si esa opción es la correcta (is_correct = 1)
    $stmt = $pdo->prepare("SELECT is_correct FROM options WHERE id = :id");
    $stmt->execute(['id' => $selected_option_id]);
    $option = $stmt->fetch();

    if ($option && $option['is_correct'] == 1) {
        $game['score']++; // ¡Punto!
    }

    // Avanzamos a la siguiente pregunta
    $game['current_index']++;

    // ¿Se acabó el juego?
    if ($game['current_index'] >= $game['total']) {
        header("Location: result.php"); // Vamos a la pantalla de resultados
        exit;
    }

    // Si no se acabó, recargamos la página para mostrar la siguiente (Patrón PRG)
    header("Location: play.php");
    exit;
}

// 4. RENDERIZAR LA PREGUNTA ACTUAL
// Obtenemos el ID de la pregunta que toca ahora
$current_question_id = $game['question_ids'][$current_index];

// Buscamos el texto de la pregunta
$stmt = $pdo->prepare("SELECT * FROM questions WHERE id = :id");
$stmt->execute(['id' => $current_question_id]);
$question_data = $stmt->fetch();

// Buscamos las opciones para esa pregunta
$stmt = $pdo->prepare("SELECT id, option_text FROM options WHERE question_id = :id ORDER BY RAND()");
$stmt->execute(['id' => $current_question_id]);
$options_data = $stmt->fetchAll();

?>

<?php include 'templates/header.php'; ?>

<div class="game-container container">
    <div class="game-header">
        <span class="badge">Pregunta <?php echo $current_index + 1; ?> / <?php echo $game['total']; ?></span>
        <span class="badge score-badge">Puntos: <?php echo $game['score']; ?></span>
    </div>

    <div class="progress-bar">
        <div class="progress-fill" style="width: <?php echo (($current_index) / $game['total']) * 100; ?>%;"></div>
    </div>

    <div class="question-card">
        <h2><?php echo htmlspecialchars($question_data['question_text']); ?></h2>
        
        <form action="play.php" method="POST" class="options-grid">
            <?php foreach ($options_data as $option): ?>
                <button type="submit" name="option_id" value="<?php echo $option['id']; ?>" class="option-btn">
                    <?php echo htmlspecialchars($option['option_text']); ?>
                </button>
            <?php endforeach; ?>
        </form>
    </div>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" style="color: #999; font-size: 0.9rem;">Abandonar partida</a>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
