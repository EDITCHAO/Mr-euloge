<?php
// Vérifier l'authentification
require_once 'auth_check.php';
require_once '../config.php';

// Récupérer tous les messages
$stmt = $pdo->query("
    SELECT id, name, email, subject, message, created_at, is_read 
    FROM contacts 
    ORDER BY created_at DESC
");
$messages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Portfolio Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 { font-size: 24px; }
        .nav-links { display: flex; gap: 15px; }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .nav-links a:hover { background: rgba(255,255,255,0.2); }
        
        .container { max-width: 1200px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #ec1839; color: white; }
        tr:hover { background: #f5f5f5; }
        .unread { font-weight: bold; background: #fff3cd; }
        .btn { padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; transition: all 0.3s; }
        .btn-read { background: #17a2b8; color: white; }
        .btn-read:hover { background: #138496; }
        .btn-delete { background: #dc3545; color: white; }
        .btn-delete:hover { background: #c82333; }
        .message-preview { max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .actions-cell { display: flex; gap: 5px; justify-content: center; }
        
        /* Modal pour confirmation */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }
        .modal-content {
            background: white;
            margin: 15% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .btn-confirm { background: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .btn-cancel { background: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        
        .success-message, .error-message {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
        }
        .success-message { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error-message { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <h1>📧 Messages Reçus</h1>
            <div class="nav-links">
                <a href="dashboard.php">📊 Dashboard</a>
                <a href="view_messages.php">📋 Messages</a>
                <a href="../../index.php">🌐 Site</a>
                <a href="logout.php">🚪 Déconnexion</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>📧 Messages reçus (<?php echo count($messages); ?>)</h1>
        
        <div id="successMessage" class="success-message"></div>
        <div id="errorMessage" class="error-message"></div>
        
        <?php if (empty($messages)): ?>
            <p>Aucun message pour le moment.</p>
        <?php else: ?>
            <table id="messagesTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $msg): ?>
                        <tr class="<?php echo !$msg['is_read'] ? 'unread' : ''; ?>" data-id="<?php echo $msg['id']; ?>">
                            <td><?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?></td>
                            <td><?php echo htmlspecialchars($msg['name']); ?></td>
                            <td><?php echo htmlspecialchars($msg['email']); ?></td>
                            <td><?php echo htmlspecialchars($msg['subject']); ?></td>
                            <td class="message-preview" title="<?php echo htmlspecialchars($msg['message']); ?>">
                                <?php echo htmlspecialchars($msg['message']); ?>
                            </td>
                            <td class="status-cell">
                                <?php echo $msg['is_read'] ? '✓ Lu' : '● Non lu'; ?>
                            </td>
                            <td class="actions-cell">
                                <?php if (!$msg['is_read']): ?>
                                    <button class="btn btn-read" onclick="markAsRead(<?php echo $msg['id']; ?>)" title="Marquer comme lu">
                                        ✓
                                    </button>
                                <?php endif; ?>
                                <button class="btn btn-delete" onclick="confirmDelete(<?php echo $msg['id']; ?>)" title="Supprimer">
                                    🗑️
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    
    <!-- Modal de confirmation -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>⚠️ Confirmer la suppression</h3>
            <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
            <p style="color: #999; font-size: 14px;">Cette action est irréversible.</p>
            <div class="modal-buttons">
                <button class="btn-confirm" onclick="deleteMessage()">Supprimer</button>
                <button class="btn-cancel" onclick="closeModal()">Annuler</button>
            </div>
        </div>
    </div>
    
    <script>
        let messageToDelete = null;
        
        function confirmDelete(id) {
            messageToDelete = id;
            document.getElementById('deleteModal').style.display = 'block';
        }
        
        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
            messageToDelete = null;
        }
        
        function deleteMessage() {
            if (!messageToDelete) return;
            
            fetch('delete_message.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + messageToDelete
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Supprimer la ligne du tableau
                    const row = document.querySelector(`tr[data-id="${messageToDelete}"]`);
                    if (row) {
                        row.remove();
                    }
                    
                    // Afficher le message de succès
                    showSuccess(data.message);
                    
                    // Mettre à jour le compteur
                    updateMessageCount();
                } else {
                    showError(data.message);
                }
                closeModal();
            })
            .catch(error => {
                showError('Erreur lors de la suppression');
                closeModal();
            });
        }
        
        function markAsRead(id) {
            fetch('mark_as_read.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        row.classList.remove('unread');
                        const statusCell = row.querySelector('.status-cell');
                        statusCell.textContent = '✓ Lu';
                        
                        // Supprimer le bouton "Marquer comme lu"
                        const readBtn = row.querySelector('.btn-read');
                        if (readBtn) {
                            readBtn.remove();
                        }
                    }
                    showSuccess(data.message);
                } else {
                    showError(data.message);
                }
            })
            .catch(error => {
                showError('Erreur lors de la mise à jour');
            });
        }
        
        function showSuccess(message) {
            const successDiv = document.getElementById('successMessage');
            successDiv.textContent = '✅ ' + message;
            successDiv.style.display = 'block';
            setTimeout(() => {
                successDiv.style.display = 'none';
            }, 3000);
        }
        
        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = '❌ ' + message;
            errorDiv.style.display = 'block';
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 3000);
        }
        
        function updateMessageCount() {
            const table = document.getElementById('messagesTable');
            const rowCount = table.querySelector('tbody').rows.length;
            const heading = document.querySelector('h1');
            heading.textContent = `📧 Messages reçus (${rowCount})`;
        }
        
        // Fermer le modal en cliquant en dehors
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
