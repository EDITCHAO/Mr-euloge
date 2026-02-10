<?php
require_once 'auth_check.php';
require_once '../config.php';

// Statistiques
$totalMessages = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
$unreadMessages = $pdo->query("SELECT COUNT(*) FROM contacts WHERE is_read = 0")->fetchColumn();
$todayMessages = $pdo->query("SELECT COUNT(*) FROM contacts WHERE DATE(created_at) = CURDATE()")->fetchColumn();

// Derniers messages
$stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5");
$recentMessages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Portfolio</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        
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
        .user-info { display: flex; align-items: center; gap: 20px; }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .logout-btn:hover { background: rgba(255,255,255,0.3); }
        
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stat-card h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .stat-card .number {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
        }
        
        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section h2 {
            margin-bottom: 20px;
            color: #333;
        }
        
        .message-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .message-item:last-child { border-bottom: none; }
        .message-info h4 { color: #333; margin-bottom: 5px; }
        .message-info p { color: #666; font-size: 14px; }
        .message-date { color: #999; font-size: 12px; }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover { background: #5568d3; }
        
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <h1>📊 Dashboard Admin</h1>
            <div class="user-info">
                <span>👤 <?php echo htmlspecialchars(getAdminUsername()); ?></span>
                <a href="logout.php" class="logout-btn">Déconnexion</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>📧 Total Messages</h3>
                <div class="number"><?php echo $totalMessages; ?></div>
            </div>
            <div class="stat-card">
                <h3>🔔 Messages Non Lus</h3>
                <div class="number"><?php echo $unreadMessages; ?></div>
            </div>
            <div class="stat-card">
                <h3>📅 Aujourd'hui</h3>
                <div class="number"><?php echo $todayMessages; ?></div>
            </div>
        </div>
        
        <!-- Derniers messages -->
        <div class="section">
            <h2>📬 Derniers Messages</h2>
            <?php if (empty($recentMessages)): ?>
                <p style="color: #999;">Aucun message pour le moment.</p>
            <?php else: ?>
                <?php foreach ($recentMessages as $msg): ?>
                    <div class="message-item">
                        <div class="message-info">
                            <h4><?php echo htmlspecialchars($msg['name']); ?></h4>
                            <p><?php echo htmlspecialchars($msg['subject']); ?></p>
                        </div>
                        <div class="message-date">
                            <?php echo date('d/m/Y H:i', strtotime($msg['created_at'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <div class="actions">
                <a href="view_messages.php" class="btn">📋 Voir tous les messages</a>
                <a href="../../index.php" class="btn" style="background: #28a745;">🌐 Voir le site</a>
            </div>
        </div>
    </div>
</body>
</html>
