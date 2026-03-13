<?php
require_once 'Database.php';

class Gallery {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllImages($limit = null, $offset = 0) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM gallery ORDER BY created_at DESC";
        if ($limit) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getImagesByCategory($category) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM gallery WHERE category = ? ORDER BY created_at DESC");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addImage($data) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO gallery (title, image, category) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $data['title'], $data['image'], $data['category']);
        return $stmt->execute();
    }

    public function deleteImage($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM gallery WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>