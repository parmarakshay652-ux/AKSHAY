<?php
require_once 'Database.php';

class Vendor {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllVendors($limit = null, $offset = 0) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM vendors ORDER BY created_at DESC";
        if ($limit) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVendorBySlug($slug) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE slug = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getVendorsByCategory($category) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE category = ? ORDER BY rating DESC");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVendorsByCity($city) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE city = ? ORDER BY rating DESC");
        $stmt->bind_param("s", $city);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchVendors($query) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE name LIKE ? OR description LIKE ?");
        $search = "%$query%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addVendor($data) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO vendors (name, slug, category, city, price, rating, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssddss", $data['name'], $data['slug'], $data['category'], $data['city'], $data['price'], $data['rating'], $data['description'], $data['image']);
        return $stmt->execute();
    }

    public function updateVendor($id, $data) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE vendors SET name=?, slug=?, category=?, city=?, price=?, rating=?, description=?, image=? WHERE id=?");
        $stmt->bind_param("ssssddssi", $data['name'], $data['slug'], $data['category'], $data['city'], $data['price'], $data['rating'], $data['description'], $data['image'], $id);
        return $stmt->execute();
    }

    public function getVendorById($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
?>