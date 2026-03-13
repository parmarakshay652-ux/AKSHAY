<?php
require_once 'Database.php';

class Blog {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllBlogs($limit = null, $offset = 0) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
        if ($limit) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBlogBySlug($slug) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addBlog($data) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO blogs (title, slug, content, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['title'], $data['slug'], $data['content'], $data['image']);
        return $stmt->execute();
    }

    public function updateBlog($id, $data) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE blogs SET title=?, slug=?, content=?, image=? WHERE id=?");
        $stmt->bind_param("ssssi", $data['title'], $data['slug'], $data['content'], $data['image'], $id);
        return $stmt->execute();
    }

    public function getBlogById($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
?>