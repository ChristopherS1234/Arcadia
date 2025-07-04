<?php
class Commentaire {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCommentairesApprouves() {
        $stmt = $this->pdo->prepare("SELECT * FROM commentaire WHERE approuve = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterCommentaire($nom, $commentaire) {
        $stmt = $this->pdo->prepare("INSERT INTO commentaire (nom, commentaire, approuve, date_creation) VALUES (?, ?, 0, NOW())");
        return $stmt->execute([$nom, $commentaire]);
    }
}
