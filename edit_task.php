<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        die("Tâche non trouvée.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'id' => $id]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Tâche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier la Tâche</h1>
        <form action="edit_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
            <textarea name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>
            <select name="status">
                <option value="pending" <?php echo $task['status'] === 'pending' ? 'selected' : ''; ?>>En cours</option>
                <option value="completed" <?php echo $task['status'] === 'completed' ? 'selected' : ''; ?>>Terminée</option>
            </select>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
</html>