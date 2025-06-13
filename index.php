<?php
require 'config.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
$where = $filter === 'all' ? '' : "WHERE status = :status";
$query = "SELECT * FROM tasks $where ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);

if ($filter !== 'all') {
    $stmt->bindParam(':status', $filter);
}
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestionnaire de Tâches</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestionnaire de Tâches</h1>
        
        <!-- Formulaire d'ajout -->
        <form action="add_task.php" method="POST">
            <input type="text" name="title" placeholder="Titre de la tâche" required>
            <textarea name="description" placeholder="Description"></textarea>
            <button type="submit">Ajouter</button>
        </form>

        <!-- Filtre -->
        <div class="filter">
            <a href="?filter=all">Toutes</a> |
            <a href="?filter=pending">En cours</a> |
            <a href="?filter=completed">Terminées</a>
        </div>

        <!-- Liste des tâches -->
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Créée le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td><?php echo $task['status'] === 'pending' ? 'En cours' : 'Terminée'; ?></td>
                        <td><?php echo $task['created_at']; ?></td>
                        <td>
                            <a href="edit_task.php?id=<?php echo $task['id']; ?>">Modifier</a>
                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Supprimer cette tâche ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>