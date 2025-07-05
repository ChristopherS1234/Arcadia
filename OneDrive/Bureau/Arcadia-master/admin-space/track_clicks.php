<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['page_name']) && isset($_POST['element_name'])) {
        $page_name = $_POST['page_name'];
        $element_name = $_POST['element_name'];

        try {
            // Vérifier si l'entrée existe déjà
            $stmt = $pdo->prepare("SELECT id, click_count FROM click_stats WHERE page_name = ? AND element_name = ?");
            $stmt->execute([$page_name, $element_name]);
            $result = $stmt->fetch();

            if ($result) {
                // Mettre à jour le compteur existant + le champ last_clicked
                $stmt = $pdo->prepare("UPDATE click_stats SET click_count = click_count + 1, last_clicked = NOW() WHERE id = ?");
                $stmt->execute([$result['id']]);
            } else {
                // Créer une nouvelle entrée avec le champ last_clicked
                $stmt = $pdo->prepare("INSERT INTO click_stats (page_name, element_name, click_count, last_clicked) VALUES (?, ?, 1, NOW())");
                $stmt->execute([$page_name, $element_name]);
            }

            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
