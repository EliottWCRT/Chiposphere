<?php
require_once './ChirpRepository.php';

class ChirpRepositoryPDO implements ChirpRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllChirps() {
        $stmt = $this->pdo->query("SELECT * FROM chirps");
        $chirps = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $chirps[] = new Chirp($row['id'], $row['message'], $row['author'], $row['date']);
        }
        return $chirps;
    }

    public function getChirpById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM chirps WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Chirp($row['id'], $row['message'], $row['author'], $row['date']);
        }
        return null;
    }

    public function createChirp(Chirp $chirp) {
        $stmt = $this->pdo->prepare("INSERT INTO chirps (message, author, date) VALUES (?, ?, ?)");
        return $stmt->execute([$chirp->getMessage(), $chirp->getAuthor(), $chirp->getDate()]);
    }
}
?>